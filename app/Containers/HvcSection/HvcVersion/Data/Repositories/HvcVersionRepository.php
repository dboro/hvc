<?php

namespace App\Containers\HvcSection\HvcVersion\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

class HvcVersionRepository extends Repository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
