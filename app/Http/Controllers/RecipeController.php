<?php

namespace App\Http\Controllers;

use App\Models\RecipeList;
use Illuminate\Http\Request;

class RecipeController extends Controller
{

    public function getRecipe($id)
    {
        $recipe = RecipeList::where('user__list_id', $id)->get();
        $response = [
            'status' => true,
            'message' => $recipe
        ];

        return response($response, 201);
    }

    public function addRecipe($id, Request $request)
    {
        $exist = RecipeList::where('recipe_id', $request['recipe_id'])->where('user__list_id', $id);

        if (!$exist->count()) {
            $recipe = RecipeList::create([
                'recipe' => $request['recipe'],
                'recipe_id' => $request['recipe_id'],
                'user__list_id' => $id
            ]);
            $response = [
                'status' => true,
                'message' => 'Recipe successfully added to list'
            ];
            return response($response, 201);
        } else $response = [
            'status' => false,
            'message' => 'Recipe already in list'
        ];
        return response($response, 404);
    }
}
