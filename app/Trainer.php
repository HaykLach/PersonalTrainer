<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $table = 'trainer';
    protected $fillable = [
        'trainer_name'
    ];

    public function notes() {
        return $this->hasMany(Notes::class);
    }

    public function trainings() {
        return $this->belongsToMany(Training::class, 'trainings_trainers', 'trainer_id', 'training_id');
    }
}
