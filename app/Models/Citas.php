<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    use HasFactory;

    protected $table = "citas";

    protected $fillable = [
        'id_doctor',
        'id_paciente',
        'FyHinicio',
        'FyHfinal',
    ];

    public $timestamps = false;
}
