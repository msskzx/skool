<?php

use Illuminate\Database\Seeder;

class ParentStudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('parentt_student')->insert([
          'student_id' => '1',
          'parentt_id' => '1'
      ]);
    }
}
