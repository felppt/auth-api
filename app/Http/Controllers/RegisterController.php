<?php

namespace App\Http\Controllers;

use App\Http\Requests\Registration\StoreRequest;
use App\Models\User;

class RegisterController extends Controller
{

    public function store(StoreRequest $request)
    {
        $data = $request->vonly([
            'first_name',
            'email',
            'password',
        ]);

        User::query()->create($data);

        return redirect()->intended('/registration');
    }

}
