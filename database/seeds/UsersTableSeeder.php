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
          'username' => 'mssk',
          'password' => bcrypt('secret'),
          'role' => 'Student'
      ]);

      DB::table('users')->insert([
          'username' => 'msskz',
          'password' => bcrypt('secret'),
          'role' => 'Employee'
      ]);

      DB::table('users')->insert([
          'username' => 'msskzx',
          'password' => bcrypt('secret'),
          'role' => 'Parent'
      ]);
    }
}
