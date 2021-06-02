<?php

namespace Database\Seeders;

use App\Models\Backend\Admin;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([

            'name'=>'Shahadat Hridoy',
            'email'=>'shhridoy25@gmail.com',
            'role'=>'admin',
            'image'=>'image.jpg',


            'password'=>bcrypt('123456'),

        ]);
    }
}
