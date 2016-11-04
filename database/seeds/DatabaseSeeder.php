<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //   $this->call(SchoolsTableSeeder::class);
      //   $this->call(ElementaryLevelsTableSeeder::class);
      //   $this->call(MiddleLevelsTableSeeder::class);
      //   $this->call(HighLevelsTableSeeder::class);
      //   $this->call(ClubsTableSeeder::class);
      //   $this->call(UsersTableSeeder::class);
      //   $this->call(ParenttsTableSeeder::class);
      //   $this->call(StudentsTableSeeder::class);
      //   $this->call(EmployeesTableSeeder::class);
      //   $this->call(TeachersTableSeeder::class);
      //   $this->call(ParentStudentTableSeeder::class);
      //   $this->call(AdminsTableSeeder::class);
      //   $this->call(CoursesTableSeeder::class);
      //   $this->call(CourseStudentTableSeeder::class);
        $this->call(ParentSchoolTableSeeder::class);

    }
}
