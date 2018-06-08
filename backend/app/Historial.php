<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    protected $table = 'tgm_historial';

    protected $primarykey = 'id';

    protected $fillable = ['peso', 'imc', 'estado_rutina_id', 'created_at', 'updated_at'];

    public $timestamps = false;

    public function estado() {
    	return $this->belongsTo('App\EstadoRutina', 'estado_rutina_id');
    }

}
