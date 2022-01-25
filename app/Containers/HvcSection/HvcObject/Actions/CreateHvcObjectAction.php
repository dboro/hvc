<?php

namespace App\Containers\HvcSection\HvcObject\Actions;

use App\Containers\HvcSection\HvcLog\Tasks\CreateHvcLogTask;
use App\Containers\HvcSection\HvcObject\Models\HvcObject;
use App\Containers\HvcSection\HvcObject\Tasks\CreateHvcObjectTask;
use App\Containers\HvcSection\HvcVersion\Tasks\CreateHvcVersionTask;
use App\Containers\HvcSection\HvcVersion\Tasks\SetTagHvcVersionTask;
use App\Ship\Parents\Actions\Action;
use Illuminate\Support\Facades\DB;

class CreateHvcObjectAction extends Action
{
    /**
     * @param array $data
     * @return HvcObject
     * @throws \Throwable
     */
    public function run(array $data): HvcObject
    {
        $hvcObject = null;

        DB::transaction(function () use (&$hvcObject, $data) {
            /* @var HvcObject $hvcObject */
            $hvcObject = app(CreateHvcObjectTask::class)->run($data);

            app(CreateHvcVersionTask::class)->run([
                'title' => $hvcObject->title,
                'hvc_object_id' => $hvcObject->id,
                'tag' => app(SetTagHvcVersionTask::class)->run($hvcObject->id)
            ]);
        });

        return $hvcObject;
    }
}
