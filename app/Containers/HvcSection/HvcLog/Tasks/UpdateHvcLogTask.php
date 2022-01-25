<?php

namespace App\Containers\HvcSection\HvcLog\Tasks;

use App\Containers\HvcSection\HvcLog\Data\Repositories\HvcLogRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateHvcLogTask extends Task
{
    protected HvcLogRepository $repository;

    public function __construct(HvcLogRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        try {
            return $this->repository->update($data, $id);
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
