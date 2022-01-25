<?php

namespace App\Containers\HvcSection\HvcObject\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

class HvcObjectRepository extends Repository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
