<?php

use Illuminate\Database\Seeder;

class ParenttsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('parentts')->insert([
          'first_name' => 'Bear',
          'email' => 'msskzx@msskzx.com',
          'username' => 'msskzx'
      ]);

      DB::table('parentt_school')->insert([
          'school_id' => '2',
          'parentt_id' => '1',
          'review' => 'nice'
      ]);
    }
}
