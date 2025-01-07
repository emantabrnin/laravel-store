<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeerder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    User::create([
        "name" =>'eman',
        "email" =>"eman@gmail.com",
        "password"=> Hash::make('password'),
    ]);

    DB::table('users')->insert([
        "name" =>'eman',
        "email" =>"eman99@gmail.com",
        "password"=> Hash::make('password'),
    ]);
    }
}
