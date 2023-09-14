<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Npm extends Model
{
    use HasFactory;
    protected $table = 'npm';

    protected $fillable = ['npm', 'nama', 'alamat'];
}
