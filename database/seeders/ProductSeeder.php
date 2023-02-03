<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\support\facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
        [
            'product_name' => 'product1',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'image' => 'ASUS ROG.jpg',
 
        ],
        [
        	'product_name' => 'product2',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'image' => 'bg-title-01.jpg',
        ],
        [
        	'product_name' => 'product3',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'image' => 'LG-Pad.jpg',
        ],
        [
        	'product_name' => 'product4',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'image' => 'Oppo-PHONE.jpg',
        ],
        [
        	'product_name' => 'product5',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'image' => 'Panasonic-TV.jpg',
        ],
        [
        	'product_name' => 'product6',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'image' => 'PlayStation Portable.jpg',
        ],
        [
        	'product_name' => 'product7',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'image' => 'Playstation-VR.jpg',
        ],
        [
        	'product_name' => 'product8',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'image' => 'Tab-A7-LIte.jpg',
        ],
        [
        	'product_name' => 'product9',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'image' => 'TS-Night-Photography.jpg',
        ],
        [
        	'product_name' => 'product10',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'image' => 'wireless-headset.jpg',
        ]
    ]);
    }
    
}
