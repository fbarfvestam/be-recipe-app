<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_List extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'user_id',
    ];

    public function recipeList() 
    {
        return $this->hasMany(RecipeList::class, 'user_list_id');
    }

    public function user() 
    {
        return $this->belongTo(User::class);
    }
}
