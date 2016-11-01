<?php

use Illuminate\Database\Seeder;

class SuppliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('supplies')->insert([
          'supply' => 'sup',
          'elementary_level_id' => '1'
      ]);
      DB::table('supplies')->insert([
          'supply' => 'sup',
          'elementary_level_id' => '2'
      ]);
      DB::table('supplies')->insert([
          'supply' => 'thup',
          'elementary_level_id' => '1'
      ]);
    }
}
