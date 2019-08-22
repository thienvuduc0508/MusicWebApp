<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = new \App\User();
        $users->name = 'admin';
        $users->email = 'admin@gmail.com';
        $users->password = \Illuminate\Support\Facades\Hash::make("123456");
        $users->save();
    }
}
