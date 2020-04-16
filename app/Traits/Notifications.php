<?php


namespace App\Traits;


use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

trait Notifications
{
    /**
     * @param $message
     * @return JsonResponse
     */
    public function success($message)
    {
        return response()->json(['success' => $message], Response::HTTP_OK);
    }

    /**
     * @param $message
     * @return JsonResponse
     */
    public function error($message)
    {
        return response()->json(['error' => $message], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * @param $credentials
     * @return JsonResponse
     */
    public function attemptCredentials($credentials)
    {

        try {

            $token = $this->guard()->attempt($credentials);

            if($this->user($credentials['email'])->email_verified_at) {
                auth()->user()->update(['status' => true]);
                $success = 'Пять секунд - полет нормальный. Сенкс за вход';
                return response()
                    ->json(['success' => $success, 'token' => $token, 'user' => ['id' => auth()->user()->id, 'name' => auth()->user()->name], 'level' => auth()->user()->level->level], Response::HTTP_OK);
            } else {
                $error = 'Ты еще не верифицировался! Чекни почту, там будет письмецо с подтверждением регистрации';
                return response()
                    ->json(['error' => $error], Response::HTTP_FORBIDDEN);
            }
        } catch (\Exception $exception) {
            return response()
                ->json(['error' => 'Чет мы тебя не можем найти. Ты точно регался?'], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * @return mixed
     */
    private function guard()
    {
        return Auth::guard();
    }

    /**
     * @param $email
     * @return mixed
     */
    private function user($email)
    {
        return $user = User::whereEmail($email)->firstOrFail();
    }
}
