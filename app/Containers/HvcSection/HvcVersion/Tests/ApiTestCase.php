<?php

namespace App\Containers\HvcSection\HvcVersion\Tests;

use App\Containers\HvcSection\HvcObject\Actions\CreateHvcObjectAction;
use App\Containers\HvcSection\HvcObject\Models\HvcObject;
use App\Containers\HvcSection\HvcVersion\Tests\TestCase as BaseTestCase;

/**
 * Class ApiTestCase.
 *
 * This is the container API TestCase class. Use this class to add your container specific API related helper functions.
 */
class ApiTestCase extends BaseTestCase
{
    public function createHvcObject() : HvcObject
    {
        $data = [
            'title' => 'Test title',
            'user_id' => $this->getTestingUser()->id
        ];

        return app(CreateHvcObjectAction::class)->run($data);
    }
}
