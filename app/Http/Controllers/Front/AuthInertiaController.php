<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Front;
use App\Http\Requests\Front\LoginFormRequest;
use Illuminate\Http\RedirectResponse;

class AuthInertiaController extends Front
{
    public function login(LoginFormRequest $request)
    {
        if(!auth()->attempt($request->validated())) {
            return redirect()
                ->route('login')
                ->withErrors(['email' => 'Пользователь не найден, либо данные введены не верно']);
        }

        return redirect()->route('Home');
    }

    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->route('Home');
    }
}
