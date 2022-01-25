<?php

namespace App\Containers\HvcSection\HvcLog\Actions;

use App\Containers\HvcSection\HvcLog\Models\HvcLog;
use App\Containers\HvcSection\HvcLog\Tasks\UpdateHvcLogTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class UpdateHvcLogAction extends Action
{
    public function run(Request $request): HvcLog
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(UpdateHvcLogTask::class)->run($request->id, $data);
    }
}
