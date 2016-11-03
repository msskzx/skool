<?php

use Illuminate\Database\Seeder;

class ElementaryLevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('elementary_levels')->truncate();

      DB::table('elementary_levels')->insert([
          'school_id' => '1',
          'supplies' => 'this is so kool'
      ]);

      DB::table('elementary_levels')->insert([
          'school_id' => '3',
          'supplies' => 'this is even kooler'
      ]);
    }
}
