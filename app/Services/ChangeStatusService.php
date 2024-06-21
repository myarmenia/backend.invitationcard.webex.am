<?php

namespace App\Services;

use App\Models\Event;
use App\Services\Log\LogService;
use App\Traits\Event\EventNotificationTrait;
use Illuminate\Support\Facades\DB;
use Auth;

class ChangeStatusService
{

  public static function change_status($request)
  {

      $status = filter_var($request->status, FILTER_VALIDATE_BOOLEAN);

      $data = ['status' => $status];

      $update = DB::table($request->tb_name)
        ->where('id', $request->id)
        ->update(['status' => $status]);


      return $update ? $update : false;

  }

}
