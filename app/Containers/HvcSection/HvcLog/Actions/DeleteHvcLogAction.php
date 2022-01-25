<?php

namespace App\Containers\HvcSection\HvcLog\Actions;

use App\Containers\HvcSection\HvcLog\Tasks\DeleteHvcLogTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class DeleteHvcLogAction extends Action
{
    public function run(Request $request)
    {
        return app(DeleteHvcLogTask::class)->run($request->id);
    }
}
