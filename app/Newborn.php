<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newborn extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'newborns';

    protected $fillable = [
        'child_id',
        'apgar_score',
        'birth_height',
        'birth_hcm',
        'skin',
        'eyes',
        'temperature',
        'notes',
    ];
}
