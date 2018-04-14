<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class itemsdetall extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'itemsdetalls';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ["producto", "codbarra", "precio", "cant", "total", "descuento", "id_producto","id_proforma"];

    public function proforma()
    {
        return $this->belongsTo('App\Proforma');
    }

    
}
