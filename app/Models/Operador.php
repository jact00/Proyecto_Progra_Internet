<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Operador extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'operadores';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
    ];

    protected $casts = [
        'es_admin' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}