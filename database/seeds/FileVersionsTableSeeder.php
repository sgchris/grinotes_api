<?php

use Illuminate\Database\Seeder;

use App\FileVersion;
use App\File;
use App\User;

class FileVersionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// Let's truncate our existing records to start from scratch.
        FileVersion::truncate();

        $faker = \Faker\Factory::create();

		$fileIds = array_map(function($el) {
			return $el['id'];
		}, File::all()->toArray());

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 500; $i++) {
            FileVersion::create([
                'content' => $faker->paragraph,
				'file_id' => $fileIds[mt_rand(0, count($fileIds)-1)],
            ]);
        }
    }
}
