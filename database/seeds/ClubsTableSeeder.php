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
      DB::table('clubs')->truncate();

      DB::table('clubs')->insert([
          'name' => 'first club',
          'high_level_id' => '1'
      ]);

      DB::table('clubs')->insert([
          'name' => 'second club',
          'high_level_id' => '1'
      ]);
      
      DB::table('clubs')->insert([
          'name' => 'third club',
          'high_level_id' => '1'
      ]);
    }
}
