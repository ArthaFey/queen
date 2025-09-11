<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    protected $table = 'fasilitas';

    // Kolom yang bisa diisi
    protected $fillable = [
        'title',
        'deskripsi',
        'image',
    ];
}
