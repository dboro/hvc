<?php

namespace App\Containers\HvcSection\HvcVersion\Actions;

use App\Containers\HvcSection\HvcVersion\Models\HvcVersion;
use App\Containers\HvcSection\HvcVersion\Tasks\GetDraftHvcVersionTask;
use App\Ship\Parents\Actions\Action;

class GetDraftHvcVersionAction extends Action
{
    public function run(array $data): HvcVersion
    {
        return app(GetDraftHvcVersionTask::class)->run($data['id']);
    }
}
