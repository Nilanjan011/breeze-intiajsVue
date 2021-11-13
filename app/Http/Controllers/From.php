<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Inertia\Inertia;
class From extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'password' => ['required', 'max:50'],
            'email' => ['required', 'max:50', 'email'],
        ]);
        // return Inertia::render('from'); // it's work properly
        return redirect()->route('from'); // it's work properly
        return Inertia::render('from',["d"=>"d"]);
    }

    public function file(Request $request)
    {
        // dd($request->file('avatar'));
        $request->validate([

            'avatar' => ['required',"file","image"],
        ]);
        $image=$request->file('avatar');

        $ext=$image->extension();
		$file=time().'.'.$ext;
		
        $image->storeAs('avatar',$file,'public'); // laravel storage use 
        
        $f=new File([
            "file"=>$file,
        ]);
        
        if($f->save()){

            return redirect()->route('file'); // it's work properly
        }
    }

    public function index()
    {
        $file=File::select('file')->orderBy('id','DESC')->get();

        return Inertia::render('file', [
            'file' => $file
        ]);
    }

}
