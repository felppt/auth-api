<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Settings\Password\UpdateRequest;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function edit(Request $request)
    {
        return view('user.settings.password.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(UpdateRequest $request)
    {
        $user = $request->user();

        $user->updatePassword($request->input('password'));

        return to_route('user.settings');
    }
}
