<?php

namespace App\Containers\HvcSection\HvcObject\UI\API\Tests\Functional;

use App\Containers\HvcSection\HvcObject\Tests\ApiTestCase;

/**
 * Class CreateHvcObjectTest.
 *
 * @group hvcobject
 * @group api
 */
class CreateHvcObjectTest extends ApiTestCase
{
    // the endpoint to be called within this test (e.g., get@v1/users)
    protected string $endpoint = 'post@v1/hvc/objects';

    // fake some access rights
    protected array $access = [
        'permissions' => '',
        'roles'       => '',
    ];

    public function test_invalid_data(): void
    {
        $data = [
            'title' => 'Test title',
            'content' => 'invalid value'
        ];

        // send the HTTP request
        $response = $this->makeCall($data);

        // assert the response status
        $response->assertStatus(422);

        // make other asserts here
    }

    public function test_success_data(): void
    {
        $data = [
            'title' => 'Test title',
            'content' => json_encode(['foo' => 'bar'])
        ];

        // send the HTTP request
        $response = $this->makeCall($data);

        // assert the response status
        $response->assertStatus(201);

        // make other asserts here
        $this->assertResponseContainKeyValue([
            'title' => $data['title'],
        ]);

        $this->assertResponseContainKeys(['id']);

        $this->assertDatabaseHas('hvc_objects', [
            'title' => $data['title'],
            'user_id' => $this->getTestingUser()->id
        ]);

        $this->assertDatabaseHas('hvc_versions', [
            'title' => $data['title'],
            'tag' => 'V.1',
            'is_published' => false,
        ]);

//        $this->assertDatabaseHas('hvc_logs', [
//            'user_id' => $this->getTestingUser()->id
//        ]);
    }
}
