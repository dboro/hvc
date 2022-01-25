<?php

namespace App\Containers\HvcSection\HvcVersion\Tasks;

use App\Containers\HvcSection\HvcVersion\Data\Criterias\OrderCriteria;
use App\Containers\HvcSection\HvcVersion\Data\Repositories\HvcVersionRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllHvcVersionsTask extends Task
{
    protected HvcVersionRepository $repository;

    public function __construct(HvcVersionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        return $this->repository->pushCriteria(new OrderCriteria($id))->paginate();
    }
}
