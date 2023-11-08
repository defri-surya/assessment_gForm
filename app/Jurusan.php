<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'jurusans';
    protected $guarded = ['id'];

    public function kampus()
    {
        return $this->belongsTo(Kampus::class);
    }

    public function biaya()
    {
        return $this->hasMany(Biaya::class);
    }
}
