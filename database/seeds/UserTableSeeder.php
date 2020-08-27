<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\User::class, 10)->create();
        $user = [
            'name' => "nico",
            'email' => "ndurocher@mail.com",
            'password' => "admin",
            'role' => 'admin'
        ];
        User::Insert($user);
    }
}
