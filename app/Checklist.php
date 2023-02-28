<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    protected $fillable = [
        'category_id',
        'checklist',
    ];

    /**
     * The children that belong to the checklist.
     */
    public function children()
    {
        return $this->belongsToMany(Child::class);
    }
}
