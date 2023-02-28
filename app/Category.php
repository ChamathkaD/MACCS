<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'group_id',
        'category_name',
    ];

    public static function categories(): array
    {
        return array(
            'Social/Emotional',
            'Language/Communication',
            'Cognitive (learning, thinking, problem-solving)',
            'Movement/Physical Development',
            'Other'
        );
    }

    /**
     * Get the checklists for the category.
     */
    public function checklists()
    {
        return $this->hasMany(Checklist::class, 'category_id');
    }
}
