<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('courses')->insert([
          'name' => 'DPS101',
          'teacher_id' => '1',
          'school_id' => '1'
      ]);

      DB::table('courses')->insert([
          'name' => 'DPS301',
          'teacher_id' => '2',
          'school_id' => '1'
      ]);

      DB::table('course_course')->insert([
         'course_id' => '2',
         'req_course_id' => '1'
      ]);

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
