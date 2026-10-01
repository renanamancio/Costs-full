<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

#[Fillable(['name', 'cor'])]
class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoriesFactory> */
    use HasFactory, HasUuids;

    public function project(){
        //Esta classe (category) tem muitos projects
        return $this->hasMany(Project::class);
    }
}
