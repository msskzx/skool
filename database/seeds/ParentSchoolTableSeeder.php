<?php

use Illuminate\Database\Seeder;

class ParentSchoolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('parentt_school')->insert([
          'school_id' => '2',
          'parentt_id' => '1',
          'review' => 'nice'
      ]);
    }
}
