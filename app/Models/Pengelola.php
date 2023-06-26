<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengelola extends Model
{
    use HasFactory;
    
    protected $table = "pengelola";
    public $timestamps = false;
    protected $fillable = [
        'id', 
        'pengelola'
    ];

    public function Wisata()
    {
        return $this->hasMany(Wisata::class. 'id_pengelola', 'id');
    }

    public function htm() 
    {
        return $this->belongsTo(htm::class, 'id_htm', 'id');
    }
}
