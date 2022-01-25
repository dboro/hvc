<?php

namespace App\Containers\HvcSection\HvcLog\UI\API\Transformers;

use App\Containers\HvcSection\HvcLog\Models\HvcLog;
use App\Ship\Parents\Transformers\Transformer;

class HvcLogTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [

    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [

    ];

    public function transform(HvcLog $hvclog): array
    {
        $response = [
            'object' => $hvclog->getResourceKey(),
            'id' => $hvclog->getHashedKey(),
            'created_at' => $hvclog->created_at,
            'updated_at' => $hvclog->updated_at,
            'readable_created_at' => $hvclog->created_at->diffForHumans(),
            'readable_updated_at' => $hvclog->updated_at->diffForHumans(),

        ];

        return $response = $this->ifAdmin([
            'real_id'    => $hvclog->id,
            // 'deleted_at' => $hvclog->deleted_at,
        ], $response);
    }
}
