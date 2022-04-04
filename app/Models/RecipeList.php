<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeList extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipe',
        'recipe_id',
        'user_list_id',
    ];

    public function user_lists() 
    {
        return $this->belongsTo(User_List::class, 'id');
    }
}
