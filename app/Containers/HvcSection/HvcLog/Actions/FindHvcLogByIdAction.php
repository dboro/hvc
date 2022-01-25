<?php

namespace App\Containers\HvcSection\HvcLog\Actions;

use App\Containers\HvcSection\HvcLog\Models\HvcLog;
use App\Containers\HvcSection\HvcLog\Tasks\FindHvcLogByIdTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class FindHvcLogByIdAction extends Action
{
    public function run(Request $request): HvcLog
    {
        return app(FindHvcLogByIdTask::class)->run($request->id);
    }
}
