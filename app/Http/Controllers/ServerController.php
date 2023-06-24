<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ServerController extends Controller
{
    public function index(){
        return view('auth.servers', [
            'servers' => Server::get()
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:255',
            'server_id' => 'required'
        ]);

        Server::create([
            'name' => $request->name,
            'server_id' => $request->server_id
        ]);

        return back()->with('message', 'Server has been added!');
    }

    public function show(){
        $servers = Server::get();
        $server_data = $servers->map(function($data){
            $data->server_info = Http::get("https://api.battlemetrics.com/servers/{$data->server_id}")['data'];
            return $data;
        });

        // dd($server_data[0]);

        return view('servers', [
            'servers' => $server_data
        ]);
    }
}
