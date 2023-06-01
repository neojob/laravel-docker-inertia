<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    protected $table = 'entities';
    public  $incrementing = 'id';
    public $timestamps = false;
}
