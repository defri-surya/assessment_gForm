<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biaya extends Model
{
    protected $table = 'biayas';
    protected $guarded = ['id'];

    public function kampus()
    {
        return $this->belongsTo(Kampus::class);
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
