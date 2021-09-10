<?php

namespace App\Models;

use App\Tweets\Entities\EntityDatabaseCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{

    protected $guarded = [];

    use HasFactory;

    public function newCollection(array $models = [])
    {
        return new EntityDatabaseCollection($models);
    }

}
