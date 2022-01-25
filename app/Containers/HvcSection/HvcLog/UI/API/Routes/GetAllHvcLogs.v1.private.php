<?php

/**
 * @apiGroup           HvcLog
 * @apiName            getAllHvcLogs
 *
 * @api                {GET} /v1/hvclogs Endpoint title here..
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

Route::get('hvclogs', [Controller::class, 'getAllHvcLogs'])
    ->name('api_hvclog_get_all_hvc_logs')
    ->middleware(['auth:api']);

