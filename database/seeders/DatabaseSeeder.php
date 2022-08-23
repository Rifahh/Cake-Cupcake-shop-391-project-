<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;



class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::unguard();
        $this -> call(UsersTablesSeeder::class);
    }
}
