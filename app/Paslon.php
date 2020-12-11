<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paslon extends Model
{
    protected $table = 'tbl_paslon';
    protected $fillable = ['no_urut_paslon', 'ketua_paslon', 'wakil_paslon', 'visi_paslon', 'misi_paslon', 'img_ketua', 'img_wakil'];

}
