<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\User as UserResource;
use App\Models\User;
use Validator;


class UserController extends BaseController
{

    public function index()
    {
        $users = User::all();
        return $this->handleResponse(UserResource::collection($users), 'Users have been retrieved!');
    }

    
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
    }

   
    public function show($id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            return $this->handleError('User not found!');
        }
        return $this->handleResponse(new UserResource($user), 'User retrieved.');
    }
    

    public function update(Request $request, User $user)
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

        $user->name = $input['username'];
        $user->password = $input['password'];
        $user->email = $input['email'];
        $user->save();
        
        return $this->handleResponse(new UserResource($user), 'User successfully updated!');
    }
   
    public function destroy(User $user)
    {
        $user->delete();
        return $this->handleResponse([], 'User deleted!');
    }
}