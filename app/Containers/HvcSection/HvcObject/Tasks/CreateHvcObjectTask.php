<?php

namespace App\Containers\HvcSection\HvcObject\Tasks;

use App\Containers\HvcSection\HvcObject\Data\Repositories\HvcObjectRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateHvcObjectTask extends Task
{
    protected HvcObjectRepository $repository;

    public function __construct(HvcObjectRepository $repository)
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
