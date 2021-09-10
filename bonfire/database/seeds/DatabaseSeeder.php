<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(userSeeder::class);
    }
}

class userSeeder extends Seeder
{
    
    public function run(){
        DB::table('users')->insert([
            ['full_name'=>'Trần Vũ Khánh Linh',
            'name'=>'LinhTVK',
            'address'=>'Nam Định',
            'phone_number'=>'0868948925',
            'birth'=>'1999/10/21',
            'gender'=>'1',
            'idGroup'=>'1',
            'email'=>'linhlinh101999@gmail.com',
            'password'=>bcrypt('152115')],

            ['full_name'=>'Trần Trọng Nghĩa',
            'name'=>'NghiaTT',
            'address'=>'Nam Định',
            'phone_number'=>'0868948924',
            'birth'=>'2000/12/15',
            'gender'=>'0',
            'idGroup'=>'0',
            'email'=>'linh124262@nuce.edu.vn',
            'password'=>bcrypt('152115')]

        ]);
    }
}
