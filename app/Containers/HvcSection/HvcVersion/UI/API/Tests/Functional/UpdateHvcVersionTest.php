<?php

namespace App\Containers\HvcSection\HvcVersion\UI\API\Tests\Functional;

use App\Containers\HvcSection\HvcVersion\Tests\ApiTestCase;

/**
 * Class SaveContentHvcVersionTest.
 *
 * @group hvcversion
 * @group api
 */
class UpdateHvcVersionTest extends ApiTestCase
{
    // the endpoint to be called within this test (e.g., get@v1/users)
    protected string $endpoint = 'patch@v1/hvc/objects/{id}';

    // fake some access rights
    protected array $access = [
        'permissions' => '',
        'roles'       => '',
    ];

    public function test(): void
    {
        $data = [
             'title' => 'Updated title',
        ];

        $hvcObject = $this->createHvcObject();

        // send the HTTP request
        $response = $this->injectId($hvcObject->id)->makeCall($data);

        // assert the response status
        $response->assertStatus(200);

        // make other asserts here
        $this->assertDatabaseHas('hvc_versions', [
           'title' => $data['title'],
           'hvc_object_id' => $hvcObject->id,
            'tag' => 'V.1'
        ]);
    }
}
