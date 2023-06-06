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
        //下記コードを記述しましょう。
        DB::table('users')->insert([
                'username' => 'user',
                'mail' => 'mail',
                'password' => bcrypt('password'),
            ]);
    }
}
