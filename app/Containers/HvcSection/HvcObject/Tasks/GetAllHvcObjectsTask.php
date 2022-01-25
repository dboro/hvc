<?php

namespace App\Containers\HvcSection\HvcObject\Tasks;

use App\Containers\HvcSection\HvcObject\Data\Repositories\HvcObjectRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllHvcObjectsTask extends Task
{
    protected HvcObjectRepository $repository;

    public function __construct(HvcObjectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
