<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class actie extends Model
{
    use HasFactory;
    protected $fillable = ['actie'];
    public $timestamps = false;
}
