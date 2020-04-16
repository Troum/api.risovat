<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class UserStatusController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function isOnline()
    {
        $users = User::where('id', '!=', auth()->user()->id)->get();
        $online = [];
        $offline = [];
        $secured = new \stdClass();
        foreach ($users as $user) {
            if ($user->status) {
                $secured->id = $user->id;
                $secured->name = $user->name;
                $secured->email = $user->email;
                array_push($online, $secured);
            } else {
                $secured->id = $user->id;
                $secured->name = $user->name;
                $secured->email = $user->email;
                array_push($offline, $secured);
            }
        }

        return response()->json(['online' => $online, 'offline' => $offline], Response::HTTP_OK);
    }
}
