<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasilVoting extends Model
{
    protected $table = 'tbl_hasil_voting';
    protected $fillable = ['no_urut_paslon', 'jumlah_vote'];
}
