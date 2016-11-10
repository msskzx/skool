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
      DB::table('parents')->insert([
          'first_name' => 'Bear',
          'email' => 'msskzx@msskzx.com',
          'username' => 'msskzx'
      ]);

      DB::table('parent_reviews_school')->insert([
          'school_id' => '2',
          'parent_id' => '1',
          'review' => 'nice'
      ]);
    }
}
