<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Response;

class DashboardController extends Controller
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
        return view('dashbaord.index');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $this->validateInput($request);
        // Upload image
        $keys = ['lastname', 'name', 'address', 'birthdate'];
        $input = $this->createQueryInput($keys, $request);
        if ($request->file('picture')) {
            $path = $request->file('picture')->store('avatars');
            $input['picture'] = $path;
        }

        User::where('id', $id)
            ->update($input);

        return redirect()->intended('/dashboard');
    }

    private function validateInput($request) {
        $this->validate($request, [
            'lastname' => 'required|max:60',
            'name' => 'required|max:60',
            'address' => 'required|max:120',
            'birthdate' => 'required',
            'sex' => 'required'
        ]);
    }

    private function createQueryInput($keys, $request) {
        $queryInput = [];
        for($i = 0; $i < sizeof($keys); $i++) {
            $key = $keys[$i];
            $queryInput[$key] = $request[$key];
        }
        return $queryInput;
    }

    public function load($name) {
         $path = storage_path().'/app/avatars/'.$name;
        if (file_exists($path)) {
            return Response::download($path);
        }
    }
}
