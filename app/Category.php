<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /* 
        RELACION CON LOS MODELOS
    */

    public function projects(){
        return $this->hasMany(Project::class);
    }
}
