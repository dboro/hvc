<?php

namespace App\Containers\HvcSection\HvcVersion\UI\API\Tests\Functional;

use App\Containers\HvcSection\HvcVersion\Actions\GetAllHvcVersionsAction;
use App\Containers\HvcSection\HvcVersion\Actions\GetDraftHvcVersionAction;
use App\Containers\HvcSection\HvcVersion\Actions\PublishHvcVersionAction;
use App\Containers\HvcSection\HvcVersion\Actions\UpdateHvcVersionAction;
use App\Containers\HvcSection\HvcVersion\Tests\ApiTestCase;

/**
 * Class RestoreHvcVersionTest.
 *
 * @group hvcversion
 * @group api
 */
class RestoreHvcVersionTest extends ApiTestCase
{
    // the endpoint to be called within this test (e.g., get@v1/users)
    protected string $endpoint = 'patch@v1/hvc/versions/{id}/restore';

    // fake some access rights
    protected array $access = [
        'permissions' => '',
        'roles'       => '',
    ];

    public function test(): void
    {
        $hvcObject = $this->createHvcObject();
        $data = [
            'id' => $hvcObject->id,
            'title' => 'Updated title'
        ];

        app(UpdateHvcVersionAction::class)->run($data);
        app(PublishHvcVersionAction::class)->run($data);
        app(UpdateHvcVersionAction::class)->run([
            'id' => $hvcObject->id,
            'title' => 'Update title #2'
        ]);
        app(PublishHvcVersionAction::class)->run($data);

        $hvcVersions = app(GetAllHvcVersionsAction::class)->run($data);

        $response = $this->injectId($hvcVersions[0]->id)->makeCall();

        // assert the response status
        $response->assertStatus(204);

        // make other asserts here
        $this->assertDatabaseHas('hvc_objects', $data);

        $this->assertDatabaseHas('hvc_versions', [
            'hvc_object_id' => $hvcObject->id,
            'title' => $data['title'],
            'tag' => 'V.4',
            'is_published' => false
        ]);
    }
}
