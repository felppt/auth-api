<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateUserCommand extends Command
{
    protected $signature = 'user:create';

    public function handle()
    {
        $user = new User();

        $user->first_name = $this->ask('Name?');
        $user->email = $this->ask('Email?');
        $user->password = $this->ask('Password?');
        $user->save();

        $this->info('Пользователь создан');
    }
}
