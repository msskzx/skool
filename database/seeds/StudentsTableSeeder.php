<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('students')->insert([
         'first_name' => 'Muhammad',
          'username' => 'mssk'
      ]);

      DB::table('parentt_student')->insert([
          'student_id' => '1',
          'parentt_id' => '1'
      ]);
    }
}
