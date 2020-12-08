<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ejemplar extends Model
{
    use HasFactory;

    protected $primaryKey = ['isbn', 'numero'];
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'ejemplares';
    public $timestamps = false;

    protected $fillable = [
    	'isbn', 'en_prestamo',
    ];

    public function libro()
    {
        return $this->belongsTo('App\Models\Libro', 'isbn', 'isbn');
    }
}
