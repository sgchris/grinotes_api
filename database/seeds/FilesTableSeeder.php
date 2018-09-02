<?php

use Illuminate\Database\Seeder;

use App\File;
use App\User;

class FilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// Let's truncate our existing records to start from scratch.
        File::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 50; $i++) {
            File::create([
                'name' => $faker->name,
				'user_id' => User::first()->id,
            ]);
        }
    }
}
