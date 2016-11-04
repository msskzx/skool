<?php

use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // DB::table('employees')->insert([
      //     'username' => 'msskz',
      //     'first_name' => 'Dragonk',
      //     'email' => 'msskz@msskz.com'
      // ]);

      DB::table('employees')->insert([
          'username' => 'empl',
          'first_name' => 'Dgak',
          'email' => 'empl@empl.com'
      ]);

      DB::table('employees')->insert([
          'username' => 'boss',
          'first_name' => 'Bossisio',
          'email' => 'boss@boss.com'
      ]);
    }
}
