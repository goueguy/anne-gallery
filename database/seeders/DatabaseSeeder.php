<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "moderator",
            'lastname'=>"moderator",
            'email' => "moderator@gmail.com",
            'username'=>"moderator",
            'password' => Hash::make('moderator01'),
            'acces'=>1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('users')->insert([
            'name' => "anne",
            'lastname'=>"anne",
            'email' => "anne@gmail.com",
            'username'=>"anne",
            'password' => Hash::make('anne01'),
            'acces'=>2,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
