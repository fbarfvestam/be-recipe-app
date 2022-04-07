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
}
