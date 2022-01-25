<?php

namespace App\Containers\HvcSection\HvcObject\Models;

use App\Ship\Parents\Models\Model;

/**
 * @property integer $id
 * @property string $title
 * @property mixed $content
 * @property integer $user_id
 */
class HvcObject extends Model
{
    protected $fillable = [
        'title',
        'content',
        'user_id'
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'HvcObject';
}
