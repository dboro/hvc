<?php

namespace App\Containers\HvcSection\HvcLog\Models;

use App\Ship\Parents\Models\Model;

/**
 * @property string $title
 * @property integer $user_id
 * @property integer $hvc_object_id
 */
class HvcLog extends Model
{
    protected $fillable = [
        'title',
        'user_id',
        'hvc_object_id'
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
    protected string $resourceKey = 'HvcLog';
}
