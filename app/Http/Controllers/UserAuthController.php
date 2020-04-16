<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\Notifications;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class UserAuthController extends Controller
{
    use Notifications;

    use VerifiesEmails;

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function register(Request $request)
    {
        $user = new User();
        $user->store($request);
        $user->sendAPIEmailVerificationURL();
        return $this->success('Отлично! Ты зарегился! Чекни почту: там тебя письмецо ждет');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        return $this->attemptCredentials($credentials);

    }

    /**
     * @return JsonResponse
     */
    public function refresh()
    {
        if ($token = auth()->refresh()) {
            return response()
                ->json(['success' => 'Молодчик, рефрешнулся', 'token' => $token], Response::HTTP_OK);
        }
        return response()
            ->json(['error' => 'Не получилось, не фортануло'], Response::HTTP_UNAUTHORIZED);
    }

    /**
     * @return JsonResponse
     */
    public function logout()
    {
        if (auth()->user()) {
            auth()->user()->update(['status' => false]);
            auth()->logout();
            return response()
                ->json(['success' => 'Гуд бай! Всех благ!'], Response::HTTP_OK);
        }

        return response()
            ->json(['error' => 'В любом случае истек токен'], Response::HTTP_UNAUTHORIZED);
    }

    /**
     * @param Request $request
     * @return JsonResponse|RedirectResponse|Redirector
     */
    public function verifyEmail(Request $request)
    {
        try {
            $user = User::findOrFail($request->id);
            $user->email_verified_at = Carbon::now()->format('Y-m-d H:i:s');
            $user->save();
            return redirect(env('APP_CLIENT_URL') . '/verified');
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage());
        }
    }
}
