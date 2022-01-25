<?php

namespace App\Containers\HvcSection\HvcObject\Actions;

use App\Containers\HvcSection\HvcObject\Models\HvcObject;
use App\Containers\HvcSection\HvcObject\Tasks\FindHvcObjectByIdTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class FindHvcObjectByIdAction extends Action
{
    public function run(array $data): HvcObject
    {
        return app(FindHvcObjectByIdTask::class)->run($data['id']);
    }
}
