<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ["nombre"];


    public static $rules = [
        "name" => "required"
    ];

    public static $messages = [
        "name.required" => "El nombre es obligatorio"
    ];
}
