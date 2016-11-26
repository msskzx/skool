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
      DB::update('update users set password = ? where id <> 0', [bcrypt('secret')]);
      //
      // DB::table('users')->insert([
      //     'username' => 'msskz',
      //     'password' => bcrypt('secret'),
      //     'role' => 'Employee'
      // ]);
      //
      // DB::table('users')->insert([
      //     'username' => 'msskzx',
      //     'password' => bcrypt('secret'),
      //     'role' => 'Parent'
      // ]);
      //
      // DB::table('users')->insert([
      //     'username' => 'empl',
      //     'password' => bcrypt('secret'),
      //     'role' => 'Employee'
      // ]);
      //
      // DB::table('users')->insert([
      //     'username' => 'boss',
      //     'password' => bcrypt('secret'),
      //     'role' => 'Employee'
      // ]);
      DB::table('users')->where('id',1)
                        ->update(['password' => bcrypt('secret')]);

      DB::table('users')->where('id',2)
                        ->update(['password' => bcrypt('secret')]);

      DB::table('users')->where('id',3)
                        ->update(['password' => bcrypt('secret')]);

    }
}
