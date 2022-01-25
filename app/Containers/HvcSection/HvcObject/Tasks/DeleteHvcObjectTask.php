<?php

namespace App\Containers\HvcSection\HvcObject\Tasks;

use App\Containers\HvcSection\HvcObject\Data\Repositories\HvcObjectRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteHvcObjectTask extends Task
{
    protected HvcObjectRepository $repository;

    public function __construct(HvcObjectRepository $repository)
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
