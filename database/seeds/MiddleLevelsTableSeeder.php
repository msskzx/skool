<?php

use Illuminate\Database\Seeder;

class MiddleLevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('middle_levels')->insert([
          'school_id' => '2'
      ]);
      DB::table('middle_levels')->insert([
          'school_id' => '3'
      ]);

    }
}
