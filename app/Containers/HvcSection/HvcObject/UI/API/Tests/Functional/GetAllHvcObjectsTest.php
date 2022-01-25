<?php

namespace App\Containers\HvcSection\HvcObject\UI\API\Tests\Functional;

use App\Containers\HvcSection\HvcObject\Actions\CreateHvcObjectAction;
use App\Containers\HvcSection\HvcObject\Tests\ApiTestCase;

/**
 * Class GetAllHvcObjectsTest.
 *
 * @group hvcobject
 * @group api
 */
class GetAllHvcObjectsTest extends ApiTestCase
{
    // the endpoint to be called within this test (e.g., get@v1/users)
    protected string $endpoint = 'get@v1/hvc/objects';

    // fake some access rights
    protected array $access = [
        'permissions' => '',
        'roles'       => '',
    ];

    public function test(): void
    {
        $data = [
            'title' => 'Test title',
            'user_id' => $this->getTestingUser()->id
        ];

        $hvsObject = app(CreateHvcObjectAction::class)->run($data);

        // send the HTTP request
        $response = $this->makeCall();

        // assert the response status
        $response->assertStatus(200);

        // make other asserts here
    }
}
