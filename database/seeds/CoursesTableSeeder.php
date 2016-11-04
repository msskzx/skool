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
          'teacher_id' => '1'
      ]);

      DB::table('courses')->insert([
          'name' => 'DPS301',
          'teacher_id' => '2'
      ]);

    }
}
