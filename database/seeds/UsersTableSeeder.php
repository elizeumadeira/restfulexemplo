<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Elizeu Madeira',
            'email' => 'elizeu.madeira@gmail.com',
            'password' => 'whatever',
            'phone' => '1111111',
            'cel' => '22222222',
            'gender' => 'masculino',
            'dob' => '1830-01-01'
        ]);

        DB::table('users')->insert([
            'name' => 'Adriane Madeira',
            'email' => 'adriane3@outlook.com',
            'password' => 'whatever',
            'phone' => '3333333',
            'cel' => '4444444',
            'gender' => 'feminino',
            'dob' => '1835-01-01'
        ]);
    }
}
