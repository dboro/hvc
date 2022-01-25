<?php

namespace App\Containers\HvcSection\HvcVersion\Models;

use App\Ship\Parents\Models\Model;

/**
 * @property integer $id
 * @property string $title
 * @property mixed $content
 * @property integer $hvc_object_id
 * @property string $tag
 * @property boolean $is_published
 */
class HvcVersion extends Model
{
    protected $fillable = [
        'title',
        'content',
        'hvc_object_id',
        'tag',
        'is_published'
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [
        'is_published' => 'boolean'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'HvcVersion';
}
