<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

class NetworkController extends Controller
{
    public function redirect(string $network)
    {
        return Socialite::driver($network)->redirect();
    }

    public function callback(string $network)
    {
        $data = Socialite::driver($network)->user();

        if ($user = User::byNetwork($network, $data->getId())->first()) {
            Auth::login($user);
            return redirect()->route('workers.index');
        }

        if ($data->getEmail() && $user = User::where('email', $data->getEmail())->exists()) {
            return redirect()->route('workers.index')->with('error', 'User with this email is already registered.');
        }

        $user = DB::transaction(function () use ($network, $data) {
            return User::registerByNetwork($network, $data->getId());
        });

        Auth::login($user);
        return redirect()->route('workers.index');
    }
}
