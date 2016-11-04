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
      DB::table('employees')->insert([
          'username' => 'msskz',
          'first_name' => 'Dgak',
          'email' => 'msskz@msskz.com'
      ]);
    }
}
