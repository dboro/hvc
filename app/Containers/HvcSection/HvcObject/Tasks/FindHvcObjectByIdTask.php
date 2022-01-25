<?php

namespace App\Containers\HvcSection\HvcObject\Tasks;

use App\Containers\HvcSection\HvcObject\Data\Repositories\HvcObjectRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindHvcObjectByIdTask extends Task
{
    protected HvcObjectRepository $repository;

    public function __construct(HvcObjectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
