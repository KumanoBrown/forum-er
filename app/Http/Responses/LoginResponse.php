<?php


namespace App\Http\Responses;

use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Fortify\Contracts\LoginResponse as ContractsLoginResponse;

class LoginResponse implements ContractsLoginResponse
{
    public function toResponse($request)
    {
        if (Auth::user()->isAdmin()) {
            return redirect()->route('admin.index');
        }
        return redirect()->intended(config('fortify.home'));
    }
}