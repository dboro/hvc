<?php

namespace App\Containers\HvcSection\HvcVersion\Actions;

use App\Containers\HvcSection\HvcVersion\Models\HvcVersion;
use App\Containers\HvcSection\HvcVersion\Tasks\GetAllHvcVersionsTask;
use App\Ship\Parents\Actions\Action;

class GetAllHvcVersionsAction extends Action
{
    public function run(array $data)
    {
        return app(GetAllHvcVersionsTask::class)->run($data['id']);
    }
}
