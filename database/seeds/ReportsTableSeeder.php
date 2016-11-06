<?php

use Illuminate\Database\Seeder;

class ReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('reports')->insert([
          'report' => 'not very bad',
          'student_id' => '1',
          'teacher_id' => '1'
      ]);
    }
}
