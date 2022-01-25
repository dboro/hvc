<?php

namespace App\Containers\HvcSection\HvcObject\UI\API\Transformers;

use App\Containers\HvcSection\HvcObject\Models\HvcObject;
use App\Ship\Parents\Transformers\Transformer;

class HvcObjectTransformer extends Transformer
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

    public function transform(HvcObject $hvcObject): array
    {
        $response = [
            'object' => $hvcObject->getResourceKey(),
            'id' => $hvcObject->getHashedKey(),
            'title' => $hvcObject->title,
            'content' => $hvcObject->content,
            'user_id' => $hvcObject->user_id,
            'created_at' => $hvcObject->created_at,
            'updated_at' => $hvcObject->updated_at,
            'readable_created_at' => $hvcObject->created_at->diffForHumans(),
            'readable_updated_at' => $hvcObject->updated_at->diffForHumans(),
        ];

        return $response = $this->ifAdmin([
            'real_id'    => $hvcObject->id,
            // 'deleted_at' => $hvcObject->deleted_at,
        ], $response);
    }
}
