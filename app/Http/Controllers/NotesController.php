<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notes;
use App\Client;
use App\Trainer;
use App\Http\Requests\NotesRequest;
class NotesController extends Controller
{
    public function getClientNotesList($client_id) {
        return response()->json([
            'status' => true,
            'data' => Notes::where('client_id', $client_id)
        ], 200);
    }

    public function getTrainerNotesList($trainer_id) {
        return response()->json([
            'status' => true,
            'data' => Notes::where('trainer', $trainer_id)
        ], 200);
    }

    public function createNote(NotesRequest $request) {
        $client = Client::findOrFail($request->client_id);
        $trainer = Trainer::findOrFail($request->trainer_id);
        
        $note = Notes::where('trainer_id', $trainer->id)->where('note_date',$request->for_time)->get();
        
        if(count($note) > 0) {
            return response()->json([
                'error' => true,
                'message' => 'This trainer is busy for this date' 
            ], 401);
        }
        $note = Notes::where('client_id', $client->id)->get();
        if(count($note) > 0) {
            return response()->json([
                'error' => true,
                'message' => 'You already have a training' 
            ], 401);
        }
        $notes = new Notes();

        $notes->client_id = $request->client_id;
        $notes->trainer_id = $request->trainer_id;
        $notes->training_id = $request->training_id;
        $notes->note_date = $request->for_time;

        $notes->save();

        return response()->json([
            'status' => true,
            'data' => 'Note has been created successfully'
        ], 201);
    }

    public function checkTrainerAvaliableDates($trainer_id) {
        $trainer  = Trainer::findOrFail($trainer_id);
        $now = date('Y-m-d', strtotime('now'));
        $week_end = date('Y-m-d', strtotime('this Sunday'));
        $available_days = [];
        while($now <= $week_end) {
            $trainer = Notes::where('trainer_id', $trainer_id)->where('note_date', $now)->get();
            if(count($trainer) == 0) {
                array_push($available_days, $now);
            }
            $now = date('Y-m-d', strtotime($now . "+1 days"));
        }
        if(count($available_days) > 0) {
            return response()->json([
                'status' => true,
                'data' => [
                    'available_days' => $now
                ]
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => "No available days for this week"
        ]);
    }
}
