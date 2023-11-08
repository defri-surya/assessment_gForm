<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kampus extends Model
{
    protected $table = 'kampuses';
    protected $guarded = ['id'];

    public function jurusan()
    {
        return $this->hasMany(Jurusan::class);
    }
}
