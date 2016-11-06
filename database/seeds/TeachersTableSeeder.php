<?php

use Illuminate\Database\Seeder;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('teachers')->insert([
         'years_of_exp' => '16',
         'username' => 'boss'
      ]);

      DB::table('teachers')->insert([
          'years_of_exp' => '1',
          'username' => 'msskz',
          'supervisor_id' => '2'
      ]);
    }
}
