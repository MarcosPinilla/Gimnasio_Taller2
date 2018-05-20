<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rutina extends Model
{
    protected $table = 'tgm_rutina';

    protected $primarykey = 'id';

    protected $fillable = ['nombre','descripcion'];

    public $timestamps = false;

    public function historiales() {
    	return $this->hasMany('App\Historial', 'tgm_rutina_id');
    }
}
