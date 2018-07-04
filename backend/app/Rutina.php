<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rutina extends Model
{
    protected $table = 'tgm_rutina';

    protected $primarykey = 'id';

    protected $fillable = ['nombre', 'descripcion', 'created_at', 'updated_at'];

    public $timestamps = false;

    public function estados() {
    	return $this->hasMany('App\EstadoRutina', 'tgm_rutina_id');
    }
}
