<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'children';

    protected $fillable = [
        'first_name', 'last_name', 'birthday', 'date_of_registration', 'birth_weight', 'health_status'
    ];

    /**
     * Get the child's full name.
     *
     * @return string
     */
    public function getFullNameAttribute() {

        if (isset($this->first_name) || isset($this->last_name)) {
            return "{$this->first_name} {$this->last_name}";
        }

    }

    /**
     * Get the newborn record associated with the child.
     */
    public function newborn()
    {
        return $this->hasOne(Newborn::class, 'child_id');
    }

    /**
     * Get the weights for a child.
     */
    public function weights()
    {
        return $this->hasMany(Weight::class, 'child_id');
    }

    /**
     * Get the heights for the child.
     */
    public function heights()
    {
        return $this->hasMany(Height::class, 'child_id');
    }

    /**
     * Get the hcms for the child.
     */
    public function headMeasurements()
    {
        return $this->hasMany(HeadMeasurement::class, 'child_id');
    }

    /**
     * Get the immunizations for the child.
     */
    public function immunizations()
    {
        return $this->hasMany(Immunization::class, 'child_id');
    }

    public static function status(): array
    {
        return array(
            'Good' => 'Good',
            'Bad' => 'Bad',
        );
    }

    /**
     * The checklists that belong to the child.
     */
    public function checklists()
    {
        return $this->belongsToMany(Checklist::class, 'checklist_child', 'child_id', 'checklist_id');
    }
}
