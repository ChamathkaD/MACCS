<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeadMeasurement extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'head_measurements';

    protected $fillable = [
        'child_id', 'head_circumference_measurements',
    ];
}
