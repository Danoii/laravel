<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = "kategori";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = [
        'id', 
        'kategori'
    ];

    public function Wisata()
    {
        return $this->belongsToMany(Wisata::class, 'id_kategori', 'id_pengelola', 'id_htm');
    }

    public function Kategori()
    {
        return $this->belongsToMany(Kategori::class, 'kategori', 'id_pengelola', 'id_htm');
    }

    public function Pengelola()
    {
        return $this->belongsTo(Pengelola::class, 'id_pengelola', 'id');
    }

    public function htm()
    {
        return $this->belongsTo(Htm::class, 'id_htm', 'id');
    }
}
