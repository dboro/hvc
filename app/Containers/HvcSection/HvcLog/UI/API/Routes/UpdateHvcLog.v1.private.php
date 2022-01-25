<?php

/**
 * @apiGroup           HvcLog
 * @apiName            updateHvcLog
 *
 * @api                {PATCH} /v1/hvclogs/:id Endpoint title here..
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

Route::patch('hvclogs/{id}', [Controller::class, 'updateHvcLog'])
    ->name('api_hvclog_update_hvc_log')
    ->middleware(['auth:api']);

