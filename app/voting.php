<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class voting extends Model
{
    protected $table = 'tbl_voting';
    protected $fillable = ['id_user', 'no_urut_paslon'];
}
