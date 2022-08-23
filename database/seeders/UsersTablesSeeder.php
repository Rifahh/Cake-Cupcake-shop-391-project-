<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UsersTablesSeeder extends Seeder
{
   
    public function run()
    {
        //
        User::create([

            'name' => 'John Smith',
            'email' => 'johnsmith@gmail.com',
            'password' => Hash::make('password'),
            'remember_token'=> str_random(10),


        ]);


    }
}
