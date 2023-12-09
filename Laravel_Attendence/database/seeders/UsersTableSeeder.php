<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            //student 
            
            
            [
                'fullname'=>'Umer',
                'email'=>'Umer@gmail.com',
                'class'=>'Web Engineering',
                'password' =>Hash::make('umer@123'),
                'role' => 'teacher',

            ]
        
        );

    }
}
