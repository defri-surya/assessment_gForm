<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class setsoal extends Model
{
    protected $guarded = ['id'];

    public function sekolah()
    {
        return $this->hasOne(sekolah::class, 'id', 'sekolahid');
    }

    public function kategori()
    {
        return $this->hasOne(kategori::class, 'id', 'kategorisoalid');
    }
}
