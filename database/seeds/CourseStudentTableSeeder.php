<?php

use Illuminate\Database\Seeder;

class CourseStudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('course_student')->insert([
          'course_id' => '1',
          'student_id' => '1'
      ]);

      DB::table('course_student')->insert([
          'course_id' => '2',
          'student_id' => '1'
      ]);
    }
}
