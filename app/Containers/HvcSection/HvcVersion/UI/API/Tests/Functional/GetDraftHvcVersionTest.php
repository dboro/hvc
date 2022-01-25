<?php

namespace App\Containers\HvcSection\HvcVersion\UI\API\Tests\Functional;

use App\Containers\HvcSection\HvcVersion\Tests\ApiTestCase;

/**
 * Class GetDraftHvcVersionTest.
 *
 * @group hvcversion
 * @group api
 */
class GetDraftHvcVersionTest extends ApiTestCase
{
    // the endpoint to be called within this test (e.g., get@v1/users)
    protected string $endpoint = 'get@v1/hvc/objects/{id}/draft';

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
        $response->assertStatus(200);

        // make other asserts here
        $this->assertResponseContainKeyValue([
            'hvc_object_id' => $hvcObject->id,
            'is_published' => false
        ]);
    }


}
