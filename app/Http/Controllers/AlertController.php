<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alert;
class AlertController extends Controller
{
    
	public function __construct(){
		$this->middleware('auth');
	}//

    public function index(){ 

    	$notifications = Alert::where('owner_id', auth()->id())->get();
    	
    	return view('notification.notifications_all')->withNotifications($notifications);
	}//class

	public function remove($alert_id){

		$alert = Alert::where('id', $alert_id)->first();

		if(is_null($alert) == false) {
			$alert->delete();
		}

		return redirect('/view-all-notifications');
	}	//
}//class
