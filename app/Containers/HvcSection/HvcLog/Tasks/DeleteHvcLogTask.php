<?php

namespace App\Containers\HvcSection\HvcLog\Tasks;

use App\Containers\HvcSection\HvcLog\Data\Repositories\HvcLogRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteHvcLogTask extends Task
{
    protected HvcLogRepository $repository;

    public function __construct(HvcLogRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id): ?int
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
