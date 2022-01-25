<?php

namespace App\Containers\HvcSection\HvcVersion\Tasks;

use App\Containers\HvcSection\HvcVersion\Data\Criterias\DraftCriteria;
use App\Containers\HvcSection\HvcVersion\Data\Repositories\HvcVersionRepository;
use App\Ship\Parents\Tasks\Task;

class GetDraftHvcVersionTask extends Task
{
    protected HvcVersionRepository $repository;

    public function __construct(HvcVersionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(int $id)
    {
        return $this->repository->pushCriteria(new DraftCriteria($id))->first();
    }
}
