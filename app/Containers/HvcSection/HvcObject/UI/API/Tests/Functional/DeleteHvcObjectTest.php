<?php

namespace App\Containers\HvcSection\HvcObject\UI\API\Tests\Functional;

use App\Containers\HvcSection\HvcObject\Tests\ApiTestCase;

/**
 * Class DeleteHvcObjectTest.
 *
 * @group hvcobject
 * @group api
 */
class DeleteHvcObjectTest extends ApiTestCase
{
    // the endpoint to be called within this test (e.g., get@v1/users)
    protected string $endpoint = 'delete@v1/hvc/objects/{id}';

    // fake some access rights
    protected array $access = [
        'permissions' => '',
        'roles'       => '',
    ];

    public function test_not_existing(): void
    {
        // send the HTTP request
        $response = $this->injectId(417)->makeCall();

        // assert the response status
        $response->assertStatus(417);
    }

    public function test_delete_existing(): void
    {
        $hvcObject = $this->createHvcObject();

        // send the HTTP request
        $response = $this->injectId($hvcObject->id)->makeCall();

        // assert the response status
        $response->assertStatus(204);

        // make other asserts here
        $this->assertDatabaseMissing('hvc_objects', [
            'title' => $hvcObject->title
        ]);
    }
}
