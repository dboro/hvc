<?php

namespace App\Containers\HvcSection\HvcLog\UI\API\Controllers;

use App\Containers\HvcSection\HvcLog\UI\API\Requests\CreateHvcLogRequest;
use App\Containers\HvcSection\HvcLog\UI\API\Requests\DeleteHvcLogRequest;
use App\Containers\HvcSection\HvcLog\UI\API\Requests\GetAllHvcLogsRequest;
use App\Containers\HvcSection\HvcLog\UI\API\Requests\FindHvcLogByIdRequest;
use App\Containers\HvcSection\HvcLog\UI\API\Requests\UpdateHvcLogRequest;
use App\Containers\HvcSection\HvcLog\UI\API\Transformers\HvcLogTransformer;
use App\Containers\HvcSection\HvcLog\Actions\CreateHvcLogAction;
use App\Containers\HvcSection\HvcLog\Actions\FindHvcLogByIdAction;
use App\Containers\HvcSection\HvcLog\Actions\GetAllHvcLogsAction;
use App\Containers\HvcSection\HvcLog\Actions\UpdateHvcLogAction;
use App\Containers\HvcSection\HvcLog\Actions\DeleteHvcLogAction;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class Controller extends ApiController
{
    public function createHvcLog(CreateHvcLogRequest $request): JsonResponse
    {
        $hvclog = app(CreateHvcLogAction::class)->run($request);
        return $this->created($this->transform($hvclog, HvcLogTransformer::class));
    }

    public function findHvcLogById(FindHvcLogByIdRequest $request): array
    {
        $hvclog = app(FindHvcLogByIdAction::class)->run($request);
        return $this->transform($hvclog, HvcLogTransformer::class);
    }

    public function getAllHvcLogs(GetAllHvcLogsRequest $request): array
    {
        $hvclogs = app(GetAllHvcLogsAction::class)->run($request);
        return $this->transform($hvclogs, HvcLogTransformer::class);
    }

    public function updateHvcLog(UpdateHvcLogRequest $request): array
    {
        $hvclog = app(UpdateHvcLogAction::class)->run($request);
        return $this->transform($hvclog, HvcLogTransformer::class);
    }

    public function deleteHvcLog(DeleteHvcLogRequest $request): JsonResponse
    {
        app(DeleteHvcLogAction::class)->run($request);
        return $this->noContent();
    }
}
