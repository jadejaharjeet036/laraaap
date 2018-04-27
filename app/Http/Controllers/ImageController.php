<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Image;
use Auth;
use View;


class ImageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('image.index');
    }

    public function update(Request $request, $id)
    {

        // Upload image
        $path = $request->file('upimage')->store('avatars/image');
        $input['image'] = $path;
        Image::create($input);
        return redirect()->intended('/image');
    }

    public function show(){
        $posts = Image::select('*')
                 ->Get();

        return response()->json($posts);
    }


    /**
     * Load image resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function load($name) {
         $path = storage_path().'/app/avatars/image/'.$name;
        if (file_exists($path)) {
            return Response::download($path);
        }
    }
}
