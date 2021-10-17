<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $fillable = [
        'training_name'
    ];

    public function notes() {
        return $this->hasMany(Notes::class);
    }

    public function clients() {
        return $this->belongsToMany(Client::class, 'training_clients', 'training_id', 'client_id');
    }

    public function trainers() {
        return $this->belongsToMany(Trainer::class, 'training_trainers', 'training_id', 'trainer_id');
    }
}
