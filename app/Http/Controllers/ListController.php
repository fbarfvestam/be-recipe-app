<?php

namespace App\Http\Controllers;

use App\Models\User_List;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListController extends Controller
{
    public function store(Request $request, $id)

    {
       $returnData = array(
            'status' => 'error',
            'message' => ''
        ); 
        $attributes = Validator::make($request->all(), [
            'title' => 'required|string|max:50',
        ]);
        if ($attributes->fails()) {
            $returnData['message'] = 'Title cannot be longer than 50 characters';
            return response()->json($returnData, 500);
        }
        $list = User_List::create([
            'title' => $request['title'],
            'user_id' => $id
        ]);
        return response()->json($list, 200);
    }

    public function showList($id) {
        $list = User_List::where('user_id', $id)->get();
        $response = array(
            'status' => 'success',
            'message' => $list
        );
        return response()->json($list, 200);
    }

    public function destroy($list_id)
    {
        $returnData = array(
            'status' => 'success',
            'message' => 'List deleted successfully'
        ); 
        $list = User_List::find($list_id);
        if(is_null($list)){
            $returnData['message'] = 'List does not exist';
            return response()->json($returnData);
        };
        $list->delete();
        return response()->json($returnData);
    }
}
