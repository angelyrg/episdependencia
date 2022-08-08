<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    
    public function usuario(){
        return $this->hasOne(User::class);
    }

    public function asesores(){
        return $this->belongsToMany(Asesor::class);
    }

    public function ejecutores(){
        return $this->hasMany(Ejecutor::class);
    }

    public function informes(){
        return $this->hasMany(Informe::class);
    }

}
