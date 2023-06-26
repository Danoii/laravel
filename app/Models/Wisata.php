<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;
    protected $table = 'wisata';
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = [
        'id', 'foto', 'status', 'nama', 'alamat', 'id_kategori','id_pengelola', 'htm',];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }

    public function pengelola()
    {
        return $this->belongsTo(Pengelola::class, 'id_pengelola', 'id');
    }

    public function htm()
    {
        return $this->belongsTo(Htm::class, 'id_htm', 'id');
    }
}
