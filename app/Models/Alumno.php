<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alumno extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public $timestamps = false;
    protected $fillable = [
        'user_id',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function movimientos()
    {
        return $this->hasMany('App\Models\Movimiento', 'alumno_id', 'user_id');
    }
}
