<?php

namespace App\Containers\HvcSection\HvcVersion\Actions;

use App\Containers\HvcSection\HvcObject\Tasks\UpdateHvcObjectTask;
use App\Containers\HvcSection\HvcVersion\Models\HvcVersion;
use App\Containers\HvcSection\HvcVersion\Tasks\CreateHvcVersionTask;
use App\Containers\HvcSection\HvcVersion\Tasks\GetDraftHvcVersionTask;
use App\Containers\HvcSection\HvcVersion\Tasks\SetTagHvcVersionTask;
use App\Containers\HvcSection\HvcVersion\Tasks\UpdateHvcVersionTask;
use App\Ship\Parents\Actions\Action;
use Illuminate\Support\Facades\DB;

class PublishHvcVersionAction extends Action
{
    public function run(array $data)
    {
        DB::transaction(function () use ($data) {
            /* @var HvcVersion $draft */
            $draft = app(GetDraftHvcVersionTask::class)->run($data['id']);

            app(UpdateHvcObjectTask::class)->run($data['id'], [
                'title' => $draft->title,
                'content' => $draft->content,
            ]);

            app(UpdateHvcVersionTask::class)->run($draft->id, [
                'is_published' => true
            ]);

            app(CreateHvcVersionTask::class)->run([
                'title' => $draft->title,
                'hvc_object_id' => $draft->hvc_object_id,
                'content' => $draft->content,
                'tag' => app(SetTagHvcVersionTask::class)->run($data['id'])
            ]);
        });
    }
}
