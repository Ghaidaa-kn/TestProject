<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\support\facades\Hash;
use Illuminate\support\facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        [
        	'first_name' => 'user1',
            'last_name' => 'last1',
            'email' => 'user1@gmail.com',
            'phone' => null,
            'password' => Hash::make(12345),
            'is_admin' => null,
 
        ],
        [
        	'first_name' => 'user2',
            'last_name' => 'last2',
            'email' => 'user2@gmail.com',
            'phone' => '0932444444',
            'password' => Hash::make(12345),
            'is_admin' => null,
        ],
        [
        	'first_name' => 'user3',
            'last_name' => 'last3',
            'email' => null,
            'phone' => '0932555555',
            'password' => Hash::make(12345),
            'is_admin' => null,
        ],
        [
        	'first_name' => 'user4',
            'last_name' => 'last4',
            'email' => 'user4@gmail.com',
            'phone' => '0932666666',
            'password' => Hash::make(12345),
            'is_admin' => null,
        ],
        [
        	'first_name' => 'user5',
            'last_name' => 'last5',
            'email' => 'user5@gmail.com',
            'phone' => null,
            'password' => Hash::make(12345),
            'is_admin' => null,
        ],
        [
        	'first_name' => 'user6',
            'last_name' => 'last6',
            'email' => 'user6@gmail.com',
            'phone' => '0932777777',
            'password' => Hash::make(12345),
            'is_admin' => null,
        ],
        [
        	'first_name' => 'user7',
            'last_name' => 'last7',
            'email' => null,
            'phone' => '0932888888',
            'password' => Hash::make(12345),
            'is_admin' => null,
        ],
        [
        	'first_name' => 'user8',
            'last_name' => 'last8',
            'email' => 'user8@gmail.com',
            'phone' => null,
            'password' => Hash::make(12345),
            'is_admin' => null,
        ],
        [
        	'first_name' => 'user9',
            'last_name' => 'last9',
            'email' => 'user9@gmail.com',
            'phone' => '0932999999',
            'password' => Hash::make(12345),
            'is_admin' => null,
        ],
        [
        	'first_name' => 'user10',
            'last_name' => 'last10',
            'email' => 'user10@gmail.com',
            'phone' => '0932333333',
            'password' => Hash::make(12345),
            'is_admin' => null,
        ]
        ]);
    }
}
