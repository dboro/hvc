<?php

/**
 * @apiGroup           HvcLog
 * @apiName            createHvcLog
 *
 * @api                {POST} /v1/hvclogs Endpoint title here..
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

use App\Containers\HvcSection\HvcLog\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::post('hvclogs', [Controller::class, 'createHvcLog'])
    ->name('api_hvclog_create_hvc_log')
    ->middleware(['auth:api']);

