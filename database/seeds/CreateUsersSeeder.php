<?php

use Illuminate\Database\Seeder;
use App\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name'=>'Admin',
                'email'=>'admin@gmail.com',
                'is_admin'=>'1',
                'is_company'=>'0',
                'is_customer'=>'0',
                'phone' => '12345678',
                'user_number' => '12345678',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Company',
                'email'=>'company@gmail.com',
                'is_admin'=>'0',
                'is_company'=>'1',
                'is_customer'=>'0',
                'phone' => '12345678',
                'user_number' => '12345678',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'User',
                'email'=>'user@gmail.com',
                'is_admin'=>'0',
                'is_company'=>'0',
                'is_customer'=>'1',
                'phone' => '12345678',
                'user_number' => '12345678',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'User1',
                'email'=>'user1@gmail.com',
                'is_admin'=>'0',
                'is_company'=>'0',
                'is_customer'=>'1',
                'phone' => '12345678',
                'user_number' => '12345678',
                'password'=> bcrypt('123456'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
