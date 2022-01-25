<?php

namespace App\Containers\HvcSection\HvcVersion\Tasks;

use App\Containers\HvcSection\HvcVersion\Data\Repositories\HvcVersionRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateHvcVersionTask extends Task
{
    protected HvcVersionRepository $repository;

    public function __construct(HvcVersionRepository $repository)
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
