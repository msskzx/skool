<?php

use Illuminate\Database\Seeder;

class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('schools')->truncate();

      DB::table('schools')->insert([
          'name' => 'First School',
          'email' => 'first@shool.com'
      ]);

      DB::table('schools')->insert([
          'name' => 'second School',
          'email' => 'second@shool.com'
      ]);

      DB::table('schools')->insert([
          'name' => 'third School',
          'email' => 'third@shool.com'
      ]);
    }
}
