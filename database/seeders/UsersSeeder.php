<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user = User::create([
            'name' => 'enoguerg',
            'email' => 'enoguerg@mail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('pepe1234'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
        ]);

       $user->createToken('api-access')->plainTextToken;
    }
}
