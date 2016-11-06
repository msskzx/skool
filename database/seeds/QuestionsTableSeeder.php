<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('questions')->insert([
          'question' => 'What is wrong with you?',
          'student_id' => '1',
          'course_id' => '1'
      ]);
    }
}
