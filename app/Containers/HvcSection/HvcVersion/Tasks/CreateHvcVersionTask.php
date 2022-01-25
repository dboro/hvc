<?php

namespace App\Containers\HvcSection\HvcVersion\Tasks;

use App\Containers\HvcSection\HvcVersion\Data\Repositories\HvcVersionRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateHvcVersionTask extends Task
{
    protected HvcVersionRepository $repository;

    public function __construct(HvcVersionRepository $repository)
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
