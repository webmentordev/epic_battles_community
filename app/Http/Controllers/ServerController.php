<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    public function index(){
        return view('auth.servers', [
            'servers' => Server::get()
        ]);
    }
}
