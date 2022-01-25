<?php

namespace App\Containers\HvcSection\HvcObject\Tasks;

use App\Containers\HvcSection\HvcObject\Data\Repositories\HvcObjectRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateHvcObjectTask extends Task
{
    protected HvcObjectRepository $repository;

    public function __construct(HvcObjectRepository $repository)
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
