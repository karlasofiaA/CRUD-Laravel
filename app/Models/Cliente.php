<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    // Definimos los campos que se deben rellenar 
    protected $fillable = ['name' , 'due' , 'comments'];
    
}
