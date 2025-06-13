<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Settings\Profile\UpdateRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Request $request)
    {
        /**@var User */
        $user = $request->user();

        return view('user.settings.profile.edit', compact('user'));
    }

    public function update(UpdateRequest $request)
    {
        /**@var User */
        $user = $request->user();

        $data = $request->only([
            'first_name',
            'second_name',
            'last_name',
            'gender',
        ]);
        $user->update($data);

        return to_route('user.settings');
    }

    public function destroy(string $id)
    {
        //
    }
}
