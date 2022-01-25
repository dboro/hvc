<?php

namespace App\Containers\HvcSection\HvcVersion\Actions;

use App\Containers\HvcSection\HvcVersion\Events\TestJob;
use App\Containers\HvcSection\HvcVersion\Events\UpdateDraft;
use App\Containers\HvcSection\HvcVersion\Models\HvcVersion;
use App\Containers\HvcSection\HvcVersion\Tasks\GetDraftHvcVersionTask;
use App\Containers\HvcSection\HvcVersion\Tasks\UpdateHvcVersionTask;
use App\Ship\Parents\Actions\Action;
use Illuminate\Support\Arr;

class UpdateHvcVersionAction extends Action
{
    public function run(array $data): HvcVersion
    {
        $draft = app(GetDraftHvcVersionTask::class)->run($data['id']);
        $data = Arr::except($data, 'id');

        return app(UpdateHvcVersionTask::class)->run($draft->id, $data);;
    }
}
