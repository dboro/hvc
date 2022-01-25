<?php

/**
 * @apiGroup           HvcLog
 * @apiName            findHvcLogById
 *
 * @api                {GET} /v1/hvclogs/:id Endpoint title here..
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

Route::get('hvclogs/{id}', [Controller::class, 'findHvcLogById'])
    ->name('api_hvclog_find_hvc_log_by_id')
    ->middleware(['auth:api']);

