<?php

namespace App\Containers\HvcSection\HvcLog\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

class HvcLogRepository extends Repository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
