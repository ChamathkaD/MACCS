<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'child_id',
        'group_name',
    ];

    public static function groups(): array
    {
        return array(
            2,
            4,
            6,
            9,
            12,
            18,
            24,
            36,
            48,
            60
        );
    }

    /**
     * Get the categories for the group.
     */
    public function categories()
    {
        return $this->hasMany(Category::class, 'group_id');
    }
}
