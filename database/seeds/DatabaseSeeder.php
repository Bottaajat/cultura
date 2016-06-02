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
        // $this->call(UsersTableSeeder::class);
        $this->call(TopicsTableSeeder::class);
		    $this->call(ExercisesTableSeeder::class);
        $this->call(TasksTableSeeder::class);
        $this->call(MaterialsTableSeeder::class);
        $this->call(DescriptionTableSeeder::class);
		$this->call(OrderingTask1Seeder::class);
		$this->call(OrderingTask2Seeder::class);
    }
}
