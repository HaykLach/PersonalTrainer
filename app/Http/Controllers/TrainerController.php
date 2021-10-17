<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trainer;

class TrainerController extends Controller
{
    public function getTrainerList() {
        return response()->json([
            'status' => true,
            'data' => Trainer::all()
        ], 200);
    }
}
