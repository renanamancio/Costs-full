<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Laravel\Sanctum\HasApiTokens;

#[Fillable(['name', 'description', 'cost', 'project_id'])]
class Service extends Model
{
    /** @use HasFactory<\Database\Factories\ServicesFactory> */
    use HasFactory, HasUuids, HasApiTokens;

    public function project(){
        //Esta classe (servide) pertence a project
        return $this->belongsTo(Project::class);
    }
}
