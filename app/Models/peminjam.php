<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class peminjam extends Model
{
    protected $table = 'peminjams';
    protected $hidden = [];
    protected $guarded = [];

    public function buku(){
        return $this->belongsTo(buku::class, 'id_buku');
    }
}
