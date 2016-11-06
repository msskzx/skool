<?php

use Illuminate\Database\Seeder;

class AssignmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('assignments')->insert([
          'content' => 'a very hard problem',
          'teacher_id' => '1',
          'course_id' => '1'
      ]);
    }
}
