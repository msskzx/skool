<?php

use Illuminate\Database\Seeder;

class ClubsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('clubs')->insert([
          'name' => 'First club',
          'high_level_id' => '1',
          'purpose' => 'IDK yet'
      ]);

      DB::table('clubs')->insert([
          'name' => 'Second club',
          'high_level_id' => '1',
          'purpose' => 'IDK yet'
      ]);

      DB::table('clubs')->insert([
          'name' => 'Third club',
          'high_level_id' => '1',
          'purpose' => 'IDK yet'
      ]);
    }
}
