<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Htm extends Model
{
    use HasFactory;

    protected $table = "htm";
    public $timestamps = false;
    protected $fillable = [
        'id', 
        'harga'
    ];

    public function Wisata()
    {
        return $this->hasMany(Wisata::class. 'id_htm', 'id');
    }

    public function pengelola() 
    {
        return $this->hasMany(Pengelola::class, 'id_pengelola', 'id');
    }
}
