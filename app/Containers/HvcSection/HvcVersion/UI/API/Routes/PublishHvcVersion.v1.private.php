<?php

/**
 * @apiGroup           HvcVersion
 * @apiName            createHvcVersion
 *
 * @api                {POST} /v1/hvcversions Endpoint title here..
 * @apiDescription     Endpoint description here..
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  parameters here..
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
  // Insert the response of the request here...
}
 */

use App\Containers\HvcSection\HvcVersion\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::patch('hvc/objects/{id}/publish', [Controller::class, 'publishHvcVersion'])
    ->name('api_publish_hvc_version')
    ->middleware(['auth:api']);

