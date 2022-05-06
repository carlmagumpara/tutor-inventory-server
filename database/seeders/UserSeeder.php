<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role_id' => 1,
            'name' => 'Carl Anthony Magumpara',
            'email' => 'magumparacarlanthony@gmail.com',
            'password' => Hash::make('123456789'),
        ]);
        User::create([
            'role_id' => 2,
            'name' => 'John Doe',
            'email' => 'johndoe@gmail.com',
            'password' => Hash::make('123456789'),
        ]);
    }
}
