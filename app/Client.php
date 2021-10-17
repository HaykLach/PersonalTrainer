<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'client';
    protected $fillable = [
        'client_name'
    ];

    public function trainings() {
        return $this->belongsToMany(Training::class, 'trainings_clients', 'client_id', 'training_id');
    }

    public function notes() {
        return $this->hasMany(Notes::class);
    }
}
