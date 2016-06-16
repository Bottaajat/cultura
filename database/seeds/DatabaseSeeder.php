
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
        $this->call(TopicsTableSeeder::class);
        $this->call(SchoolsTableSeeder::class);
        $this->call(ExercisesTableSeeder::class);
        $this->call(VideosTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(MaterialsTableSeeder::class);
        $this->call(TasksTableSeeder::class);
        $this->call(GlossariesTableSeeder::class);
        $this->call(TaskGlossariesTableSeeder::class);
        $this->call(MultipleChoicesSeeder::class);
        $this->call(OrderingTask1Seeder::class);
        $this->call(OrderingTask2Seeder::class);
        $this->call(OrderingTask4Seeder::class);
        $this->call(AssignmentsTableSeeder::class);
        $this->call(FillingTask6Seeder::class);
        $this->call(CrosswordTask5Seeder::class);
    }
}
