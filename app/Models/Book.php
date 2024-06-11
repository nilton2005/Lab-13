<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'autor', 'año', 'editorial'];
    public function prestamos(){
        return $this->hasMany(Prestamo::class);
    }
}
