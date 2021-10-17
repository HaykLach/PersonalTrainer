<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    protected $fillable = [
        'client_id',
        'trainer_id',
        'training_id',
        'note_date'
    ];
    public $timestamps = false;
    public function clients() {
        return $this->belongsTo(Client::class);
    }
    
    public function trainer() {
        return $this->belongsTo(Trainer::class);
    }

    public function training() {
        return $this->belongsTo(Training::class);
    }
}
