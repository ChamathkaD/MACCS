<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'weights';

    protected $fillable = [
        'child_id', 'weight',
    ];
}
