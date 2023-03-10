<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MOH extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'm_o_h_s';

    protected $fillable = [
        'division_no',
        'division_address',
        'sub_division_no',
        'sub_division_address',
    ];
}
