<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

#[Fillable(['name', 'budget', 'cost', 'user_id', 'category_id'])]
class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory, HasUuids;

    public function category(){
        //Esta classe (project) pertence a category
        return $this->belongsTo(Category::class);
    }

    public function user(){
        //Esta classe (project) pertence a user
        return $this->belongsTo(User::class);
    }

    public function service(){
        //Esta classe (project) tem muitos services
        return $this->hasMany(Service::class);
    }
}
