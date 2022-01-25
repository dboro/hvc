<?php

namespace App\Containers\HvcSection\HvcVersion\UI\API\Controllers;

use App\Containers\HvcSection\HvcVersion\Actions\GetDraftHvcVersionAction;
use App\Containers\HvcSection\HvcVersion\Actions\PublishHvcVersionAction;
use App\Containers\HvcSection\HvcVersion\Actions\RestoreHvcVersionAction;
use App\Containers\HvcSection\HvcVersion\Actions\UpdateHvcVersionAction;
use App\Containers\HvcSection\HvcVersion\UI\API\Requests\GetAllHvcVersionsRequest;
use App\Containers\HvcSection\HvcVersion\UI\API\Requests\GetDraftHvcVersionRequest;
use App\Containers\HvcSection\HvcVersion\UI\API\Requests\PublishHvcVersionRequest;
use App\Containers\HvcSection\HvcVersion\UI\API\Requests\RestoreHvcVersionRequest;
use App\Containers\HvcSection\HvcVersion\UI\API\Requests\UpdateHvcVersionRequest;
use App\Containers\HvcSection\HvcVersion\UI\API\Transformers\HvcVersionTransformer;
use App\Containers\HvcSection\HvcVersion\Actions\GetAllHvcVersionsAction;

use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class Controller extends ApiController
{
    public function getDraftHvcVersion(GetDraftHvcVersionRequest $request): array
    {
        $hvcVersion = app(GetDraftHvcVersionAction::class)->run($request->getData());
        return $this->transform($hvcVersion, HvcVersionTransformer::class);
    }

    public function publishHvcVersion(PublishHvcVersionRequest $request): JsonResponse
    {
        app(PublishHvcVersionAction::class)->run($request->getData());
        return $this->noContent();
    }

    public function restoreHvcVersion(RestoreHvcVersionRequest $request): JsonResponse
    {
        app(RestoreHvcVersionAction::class)->run($request->getData());
        return $this->noContent();
    }

    public function updateHvcVersion(UpdateHvcVersionRequest $request): array
    {
        $hvcVersion = app(UpdateHvcVersionAction::class)->run($request->getData());
        return $this->transform($hvcVersion, HvcVersionTransformer::class);
    }

    public function getAllHvcVersions(GetAllHvcVersionsRequest $request): array
    {
        $hvcVersions = app(GetAllHvcVersionsAction::class)->run($request->getData());
        return $this->transform($hvcVersions, HvcVersionTransformer::class);
    }
}
