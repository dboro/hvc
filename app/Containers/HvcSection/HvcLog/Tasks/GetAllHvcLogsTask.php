<?php

namespace App\Containers\HvcSection\HvcLog\Tasks;

use App\Containers\HvcSection\HvcLog\Data\Repositories\HvcLogRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllHvcLogsTask extends Task
{
    protected HvcLogRepository $repository;

    public function __construct(HvcLogRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
