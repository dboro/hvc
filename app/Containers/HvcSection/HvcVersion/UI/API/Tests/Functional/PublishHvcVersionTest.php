<?php

namespace App\Containers\HvcSection\HvcVersion\UI\API\Tests\Functional;

use App\Containers\HvcSection\HvcVersion\Tests\ApiTestCase;

/**
 * Class PublishHvcVersionTest.
 *
 * @group hvcversion
 * @group api
 */
class PublishHvcVersionTest extends ApiTestCase
{
    // the endpoint to be called within this test (e.g., get@v1/users)
    protected string $endpoint = 'patch@v1/hvc/objects/{id}/publish';

    // fake some access rights
    protected array $access = [
        'permissions' => '',
        'roles'       => '',
    ];

    public function test(): void
    {
        $hvcObject = $this->createHvcObject();

        // send the HTTP request
        $response = $this->injectId($hvcObject->id)->makeCall();

        // assert the response status
        $response->assertStatus(204);

        // make other asserts here
        $this->assertDatabaseHas('hvc_versions', [
            'tag' => 'V.1',
            'hvc_object_id' => $hvcObject->id,
            'is_published' => true,
        ]);

        $this->assertDatabaseHas('hvc_versions', [
            'tag' => 'V.2',
            'hvc_object_id' => $hvcObject->id,
            'is_published'  => false
        ]);
    }
}
