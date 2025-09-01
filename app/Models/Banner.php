<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model //Mendefinisikan class model bernama Banner .
{
      protected $table = 'banners'; 
    // Field yang boleh diisi
    protected $fillable = [
        'src',
        'alt',
    ];
}
