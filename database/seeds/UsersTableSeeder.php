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
      DB::table('users')->insert([
          'email' => 'mssk@mssk.com',
          'password' => bcrypt('secret'),
          'type' => 'Student'
      ]);

      DB::table('users')->insert([
          'email' => 'msskzx@msskzx.com',
          'password' => bcrypt('secret'),
          'type' => 'Parent'
      ]);
    }
}
