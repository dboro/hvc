<?php

namespace App\Containers\HvcSection\HvcVersion\Actions;

use App\Containers\HvcSection\HvcObject\Tasks\UpdateHvcObjectTask;
use App\Containers\HvcSection\HvcVersion\Models\HvcVersion;
use App\Containers\HvcSection\HvcVersion\Tasks\CreateHvcVersionTask;
use App\Containers\HvcSection\HvcVersion\Tasks\FindHvcVersionByIdTask;
use App\Containers\HvcSection\HvcVersion\Tasks\GetDraftHvcVersionTask;
use App\Containers\HvcSection\HvcVersion\Tasks\SetTagHvcVersionTask;
use App\Containers\HvcSection\HvcVersion\Tasks\UpdateHvcVersionTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Illuminate\Support\Facades\DB;

class RestoreHvcVersionAction extends Action
{
    public function run(array $data)
    {
        DB::transaction(function () use($data) {
            /* @var HvcVersion $hvcVersion */
            $hvcVersion = app(FindHvcVersionByIdTask::class)->run($data['id']);
            $draft = app(GetDraftHvcVersionTask::class)->run($hvcVersion->hvc_object_id);

            app(UpdateHvcObjectTask::class)->run($hvcVersion->hvc_object_id, [
                'title' => $hvcVersion->title,
                'content' => $hvcVersion->content,
            ]);

            app(UpdateHvcVersionTask::class)->run($draft->id, [
               'is_published' => true,
            ]);

            app(CreateHvcVersionTask::class)->run([
                'title' => $hvcVersion->title,
                'hvc_object_id' => $hvcVersion->hvc_object_id,
                'content' => $hvcVersion->content,
                'tag' => app(SetTagHvcVersionTask::class)->run($hvcVersion->hvc_object_id)
            ]);

        });
    }
}
