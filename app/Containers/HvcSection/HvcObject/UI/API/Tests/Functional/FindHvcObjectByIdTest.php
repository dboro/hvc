<?php

namespace App\Containers\HvcSection\HvcObject\UI\API\Tests\Functional;

use App\Containers\HvcSection\HvcObject\Actions\CreateHvcObjectAction;
use App\Containers\HvcSection\HvcObject\Tests\ApiTestCase;

/**
 * Class FindHvcObjectByIdTest.
 *
 * @group hvcobject
 * @group api
 */
class FindHvcObjectByIdTest extends ApiTestCase
{
    // the endpoint to be called within this test (e.g., get@v1/users)
    protected string $endpoint = 'get@v1/hvc/objects/{id}';

    // fake some access rights
    protected array $access = [
        'permissions' => '',
        'roles'       => '',
    ];

    public function test_not_found(): void
    {
        // send the HTTP request
        $response = $this->injectId(404)->makeCall();

        // assert the response status
        $response->assertStatus(404);
    }

    public function test_find_existing(): void
    {
        $hvcObject = $this->createHvcObject();

        // send the HTTP request
        $response = $this->injectId($hvcObject->id)->makeCall();

        // assert the response status
        $response->assertStatus(200);

        // make other asserts here
        $this->assertResponseContainKeyValue([
            'title' => $hvcObject->title,
        ]);
    }
}
