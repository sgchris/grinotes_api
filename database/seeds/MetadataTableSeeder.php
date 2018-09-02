<?php

use Illuminate\Database\Seeder;

use App\Metadata;
use App\User;

class MetadataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// Let's truncate our existing records to start from scratch.
        Metadata::truncate();

        $faker = \Faker\Factory::create();

		$userIds = array_map(function($el) {
			return $el['id'];
		}, User::all()->toArray());

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 500; $i++) {
            Metadata::create([
                'key' => $faker->word,
                'value' => $faker->name,
				'user_id' => $userIds[mt_rand(0, count($userIds)-1)],
            ]);
        }
    }
}
