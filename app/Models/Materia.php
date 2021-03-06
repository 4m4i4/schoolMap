<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;
    protected $fillable = [
        'materia_name', 
        'grupo',
        'check',
        'aula_id',
        'user_id',
        'boton_izq',
        'boton_dch',
        'boton_abajo'
    ];

    /**
     * Relaciones entre modelos
     */

    // One to many (inverse)
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    // One to many (inverse)
    public function aula(){
        return $this->belongsTo('App\Models\Aula');
    }
    // // One to one
    // public function aula(){
    //     return $this->hasOne('App\Models\Aula');
    // }
    // One to many
    public function clases(){
        return $this->hasMany('App\Models\Clase');
    }
    // Many to many
    public function estudiantes(){
        return $this->belongsToMany('App\Models\Estudiante')->withTimestamps();
    }
    // hasOneThrough
    public function mesa(){
        return $this->hasOneThrough('App\Models\Mesa','App\Models\Estudiante');
    }
}
