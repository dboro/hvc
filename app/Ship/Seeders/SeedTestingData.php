<?php

namespace App\Ship\Seeders;

use App\Containers\HvcSection\HvcObject\Actions\CreateHvcObjectAction;
use App\Ship\Parents\Seeders\Seeder;

class SeedTestingData extends Seeder
{
    /**
     * Note: This seeder is not loaded automatically by Apiato
     * This is a special seeder which can be called by "apiato:seed-test" command
     * It is useful for seeding testing data.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            app(CreateHvcObjectAction::class)->run([
                'title' => 'Title' . ' #' . $i,
                'user_id' => 1
            ]);
        }
    }
}
