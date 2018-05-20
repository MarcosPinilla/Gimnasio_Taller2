<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    protected $table = 'tgm_historial_rutina';

    protected $primarykey = 'id';

    protected $fillable = ['tgm_cliente_id','tgm_rutina_id','estado'];

    public $timestamps = false;

    public function cliente() {
    	return $this->belongsTo('App\Cliente', 'tgm_cliente_id');
    }

    public function rutina() {
    	return $this->belongsTo('App\Rutina', 'tgm_rutina_id');
    }
}
