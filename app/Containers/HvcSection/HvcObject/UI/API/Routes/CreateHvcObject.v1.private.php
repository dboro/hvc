<?php

/**
 * @apiGroup           HvcObject
 * @apiName            createHvcObject
 *
 * @api                {POST} /v1/hvc/objects Endpoint title here..
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

use App\Containers\HvcSection\HvcObject\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::post('hvc/objects', [Controller::class, 'createHvcObject'])
    ->name('api_create_hvc_object')
    ->middleware(['auth:api']);

