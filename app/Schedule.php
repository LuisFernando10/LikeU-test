<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['asunto', 'fecha', 'estado', 'id_client'];
}