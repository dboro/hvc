<?php

namespace App\Containers\HvcSection\HvcVersion\UI\API\Transformers;

use App\Containers\HvcSection\HvcVersion\Models\HvcVersion;
use App\Ship\Parents\Transformers\Transformer;

class HvcVersionTransformer extends Transformer
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

    public function transform(HvcVersion $hvcVersion): array
    {
        $response = [
            'object' => $hvcVersion->getResourceKey(),
            'id' => $hvcVersion->getHashedKey(),
            'title' => $hvcVersion->title,
            'content' => $hvcVersion->content,
            'tag' => $hvcVersion->tag,
            'hvc_object_id' => $hvcVersion->hvc_object_id,
            'is_published' => $hvcVersion->is_published,
            'created_at' => $hvcVersion->created_at,
            'updated_at' => $hvcVersion->updated_at,
            'readable_created_at' => $hvcVersion->created_at->diffForHumans(),
            'readable_updated_at' => $hvcVersion->updated_at->diffForHumans(),
        ];

        return $response = $this->ifAdmin([
            'real_id'    => $hvcVersion->id,
            // 'deleted_at' => $hvcVersion->deleted_at,
        ], $response);
    }
}
