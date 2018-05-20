<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'tgm_rol';

    protected $primarykey = 'id';

    protected $fillable = ['desc_rol'];

    public $timestamps = false;

    public function usuarios() {
    	return $this->hasMany('App\User', 'tgm_rol_id');
    }
}
