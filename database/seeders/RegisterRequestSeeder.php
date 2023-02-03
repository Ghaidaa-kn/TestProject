<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RequestRegister;
use Illuminate\support\facades\Hash;
use Illuminate\support\facades\DB;

class RegisterRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('request_register')->insert([
        [
            'first_name' => 'user11',
            'last_name' => 'last11',
            'email' => 'user11@gmail.com',
            'phone' => null,
            'password' => Hash::make(12345),
 
        ],
        [
        	'first_name' => 'user12',
            'last_name' => 'last12',
            'email' => 'user12@gmail.com',
            'phone' => '0932234567',
            'password' => Hash::make(12345),
        ],
        [
        	'first_name' => 'user13',
            'last_name' => 'last13',
            'email' => null,
            'phone' => '0932098098',
            'password' => Hash::make(12345),
        ],
        [
        	'first_name' => 'user14',
            'last_name' => 'last14',
            'email' => 'user14@gmail.com',
            'phone' => '0932098765',
            'password' => Hash::make(12345),
        ]
    ]);
    }
}
