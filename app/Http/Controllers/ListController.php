<?php

namespace App\Http\Controllers;

use App\Models\User_List;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListController extends Controller
{
/*     public function index()
    {
        $id = Auth::user()->id;
        return view('lists', [
            'lists' => User_List::where('user_id', $id)
        ]);
    }

    public function show()
    {
        $id = Auth::user()->id;
        $lists = User_List::where('user_id', $id);
        
    } */

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'title' => ['required', 'min:3', 'max:40']
        ]);

        $attributes['user_id'] = $request->user()->id;

        User_List::create($attributes);
        
    }



/* 
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'password' => 'required',
            'email' => 'required'
        ]);
        if($validator->fails()){
            return $this->handleError($validator->errors());       
        }
        $user = User::create($input);
        return $this->handleResponse(new UserResource($user), 'User created!');
    } */

}
