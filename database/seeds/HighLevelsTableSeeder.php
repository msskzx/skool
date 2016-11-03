<?php

use Illuminate\Database\Seeder;

class HighLevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('high_levels')->truncate();

      DB::table('high_levels')->insert([
          'school_id' => '2'
      ]);
      
      DB::table('high_levels')->insert([
          'school_id' => '3'
      ]);

    }
}
