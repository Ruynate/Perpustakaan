<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $fillable =[
        'judul',
        'genre_id',
        'sinopsis',
        'pengarang',
        'expired_at',
        'foto',
        'created_user',
        'updated_user'
    ];
    public function data_genre()
    {
        return $this->hasOne(Genre::class,'id','genre_id');
    }
}
