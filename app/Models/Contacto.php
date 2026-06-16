<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;

    // Le damos permiso para rellenar estos campos
    protected $fillable = ['nombre', 'email', 'mensaje'];
}
