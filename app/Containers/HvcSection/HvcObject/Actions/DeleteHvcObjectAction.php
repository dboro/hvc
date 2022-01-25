<?php

namespace App\Containers\HvcSection\HvcObject\Actions;

use App\Containers\HvcSection\HvcObject\Tasks\DeleteHvcObjectTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class DeleteHvcObjectAction extends Action
{
    public function run(Request $request)
    {
        return app(DeleteHvcObjectTask::class)->run($request->id);
    }
}
