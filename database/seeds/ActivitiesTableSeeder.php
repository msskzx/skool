<?php

use Illuminate\Database\Seeder;

class ActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('activities')->insert([
          'teacher_id' => '1',
          'admin_id' => '1',
          'description' => 'a very fabulous day at the lab - ft. lab coat'
      ]);

      DB::table('activitie_student')->insert([
          'activitie_id' =>'1',
          'student_id' => '1',
          'accepted' => 'true'
      ]);
    }
}
