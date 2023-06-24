<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    public function index(){
        $logos = Logo::get();
        return view('auth.logos', [
            'logos' => $logos
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'image' => 'required|image|mimes:png,jpg,jpeg,webp|max:250'
        ]);
        Logo::create([
            'image' => $request->image->store('logos', 'public_disk'),
            'user_id' => auth()->user()->id
        ]);
        return back()->with('message', 'Logo has been added! Activate it now');
    }

    public function update(Logo $logo){
        Logo::where('is_active', true)->update(['is_active' => false]);
        $logo->is_active = true;
        $logo->save();
        return back()->with('message', 'Logo has been updated!');
    }
}