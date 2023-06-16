<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    use HasFactory;

    public function type() {
        return $this->belongsTo(\App\Models\DocType::class, 'typeid', 'id');
    }

    protected $fillable = ['date', 'name', 'typeid', 'pathname'];
}
