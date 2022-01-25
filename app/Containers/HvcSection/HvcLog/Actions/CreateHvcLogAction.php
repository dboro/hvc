<?php

namespace App\Containers\HvcSection\HvcLog\Actions;

use App\Containers\HvcSection\HvcLog\Models\HvcLog;
use App\Containers\HvcSection\HvcLog\Tasks\CreateHvcLogTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class CreateHvcLogAction extends Action
{
    public function run(Request $request): HvcLog
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(CreateHvcLogTask::class)->run($data);
    }
}
