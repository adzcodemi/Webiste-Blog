<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Newsletter;

class SubscribeController extends Controller
{

    public function subscribe(Request $request){

        $email = $request->email;
        Newsletter::subscribe($email);
        Session::flash('success','Successfully subscribe.');
        return redirect()->back();
    }
}
