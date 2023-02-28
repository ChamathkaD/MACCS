<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Height extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'heights';

    protected $fillable = [
        'child_id', 'height',
    ];
}
