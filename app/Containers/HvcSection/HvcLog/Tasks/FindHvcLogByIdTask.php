<?php

namespace App\Containers\HvcSection\HvcLog\Tasks;

use App\Containers\HvcSection\HvcLog\Data\Repositories\HvcLogRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindHvcLogByIdTask extends Task
{
    protected HvcLogRepository $repository;

    public function __construct(HvcLogRepository $repository)
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
