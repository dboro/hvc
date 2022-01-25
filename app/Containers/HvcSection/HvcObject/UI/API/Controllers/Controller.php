<?php

namespace App\Containers\HvcSection\HvcObject\UI\API\Controllers;

use App\Containers\HvcSection\HvcObject\UI\API\Requests\CreateHvcObjectRequest;
use App\Containers\HvcSection\HvcObject\UI\API\Requests\DeleteHvcObjectRequest;
use App\Containers\HvcSection\HvcObject\UI\API\Requests\GetAllHvcObjectsRequest;
use App\Containers\HvcSection\HvcObject\UI\API\Requests\FindHvcObjectByIdRequest;
use App\Containers\HvcSection\HvcObject\UI\API\Requests\UpdateHvcObjectRequest;
use App\Containers\HvcSection\HvcObject\UI\API\Transformers\HvcObjectTransformer;
use App\Containers\HvcSection\HvcObject\Actions\CreateHvcObjectAction;
use App\Containers\HvcSection\HvcObject\Actions\FindHvcObjectByIdAction;
use App\Containers\HvcSection\HvcObject\Actions\GetAllHvcObjectsAction;
use App\Containers\HvcSection\HvcObject\Actions\UpdateHvcObjectAction;
use App\Containers\HvcSection\HvcObject\Actions\DeleteHvcObjectAction;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class Controller extends ApiController
{
    public function createHvcObject(CreateHvcObjectRequest $request): JsonResponse
    {
        $hvcObject = app(CreateHvcObjectAction::class)->run($request->getData());
        return $this->created($this->transform($hvcObject, HvcObjectTransformer::class));
    }

    public function findHvcObjectById(FindHvcObjectByIdRequest $request): array
    {
        $hvcObject = app(FindHvcObjectByIdAction::class)->run($request->getData());
        return $this->transform($hvcObject, HvcObjectTransformer::class);
    }

    public function getAllHvcObjects(GetAllHvcObjectsRequest $request): array
    {
        $hvcObjects = app(GetAllHvcObjectsAction::class)->run();
        return $this->transform($hvcObjects, HvcObjectTransformer::class);
    }

    public function deleteHvcObject(DeleteHvcObjectRequest $request): JsonResponse
    {
        app(DeleteHvcObjectAction::class)->run($request);
        return $this->noContent();
    }
}
