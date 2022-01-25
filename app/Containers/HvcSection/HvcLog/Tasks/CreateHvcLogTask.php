<?php

namespace App\Containers\HvcSection\HvcLog\Tasks;

use App\Containers\HvcSection\HvcLog\Data\Repositories\HvcLogRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateHvcLogTask extends Task
{
    protected HvcLogRepository $repository;

    public function __construct(HvcLogRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            return $this->repository->create($data);
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
