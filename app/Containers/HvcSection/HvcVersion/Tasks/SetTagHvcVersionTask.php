<?php

namespace App\Containers\HvcSection\HvcVersion\Tasks;

use App\Containers\HvcSection\HvcVersion\Data\Criterias\OrderCriteria;
use App\Containers\HvcSection\HvcVersion\Data\Repositories\HvcVersionRepository;
use App\Ship\Parents\Tasks\Task;

class SetTagHvcVersionTask extends Task
{
    protected HvcVersionRepository $repository;

    public function __construct(HvcVersionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($hvcObjectId) : string
    {
        $count = $this->repository->pushCriteria(new OrderCriteria($hvcObjectId))->count();
        return 'V.' . ($count + 1);
    }
}
