<?php

namespace App\Containers\HvcSection\HvcLog\Actions;

use App\Containers\HvcSection\HvcLog\Tasks\GetAllHvcLogsTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class GetAllHvcLogsAction extends Action
{
    public function run(Request $request)
    {
        return app(GetAllHvcLogsTask::class)->addRequestCriteria()->run();
    }
}
