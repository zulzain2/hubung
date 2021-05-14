<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDevice;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    
    public function setFcmToken(Request $request)
	{

		$user = User::find($request->user_id);
		
		if(!$user) {
			return '{"status":"FAILED"}';
		}

		$user_devices = UserDevice::where('fcm_token' , $request->input('fcm_token'))->get();

		if(count($user_devices) > 0)
		{
			foreach ($user_devices as $key => $device) {
				$device->id_user = $user->id;
				$device->fcm_token = $request->input('fcm_token');
				$device->device_id = $request->input('device_id') ? $request->input('device_id') : '';
				$device->device_brand = $request->input('device_brand') ? $request->input('device_brand') : '';
				$device->device_model =  $request->input('device_model') ? $request->input('device_model') : '';
				$device->updated_by = null;
				$device->last_log = date('Y-m-d H:i:s');
				$device->save();
			}
		}
		else
		{
			$user_device = New UserDevice;
			$user_device->id_user = $user->id;
			$user_device->fcm_token = $request->input('fcm_token');
			$user_device->device_id = $request->input('device_id') ? $request->input('device_id') : '';
			$user_device->device_brand = $request->input('device_brand') ? $request->input('device_brand') : '';
			$user_device->device_model =  $request->input('device_model') ? $request->input('device_model') : '';
			$user_device->created_by = null;
			$user_device->last_log = date('Y-m-d H:i:s');
			$user_device->save();
		}

		return '{"status":"OK"}';

	}
    
}
