<?php

namespace App\Containers\HvcSection\HvcVersion\Data\Criterias;

use App\Containers\HvcSection\HvcVersion\Models\HvcVersion;
use App\Ship\Parents\Criterias\Criteria;
use Illuminate\Database\Eloquent\Builder;
use Prettus\Repository\Contracts\RepositoryInterface;

class DraftCriteria extends Criteria
{
    private int $hvcObjectId;

    public function __construct(int $hvcObjectId)
    {
        $this->hvcObjectId = $hvcObjectId;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        /* @var Builder $model */
        return $model
            ->where('hvc_object_id', $this->hvcObjectId)
            ->where('is_published', false);
    }
}
