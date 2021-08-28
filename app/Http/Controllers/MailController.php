<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mail;
use App\Models\User;
use App\Models\Department;
use App\Mail\SendMail;

class MailController extends Controller
{
    public function create() {
        return view ('admin.mail.create');

    }

    public function store (Request $request) {

        $image = $request -> file('file');
        $details = [
            'body' =>$request->body,
            'file' => $image,
            
            
        ];

        if($request->department) {
            return "ok";
        }
    }


}
