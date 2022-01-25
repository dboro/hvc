<?php

namespace App\Containers\HvcSection\HvcObject\Actions;

use App\Containers\HvcSection\HvcObject\Tasks\GetAllHvcObjectsTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class GetAllHvcObjectsAction extends Action
{
    public function run()
    {
        return app(GetAllHvcObjectsTask::class)->addRequestCriteria()->run();
    }
}
