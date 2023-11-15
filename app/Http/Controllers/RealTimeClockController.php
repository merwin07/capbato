<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Data;
use Carbon\Carbon;

class RealTimeClockController extends Controller
{
   

    public function index()
    {
        $response = Http::get('https://worldtimeapi.org/api/timezone/Asia/Manila');

        if ($response->successful()) {
            $data = $response->json();
            return response()->json(['time' => $data['datetime']]);
        }

        return response()->json(['error' => 'Failed to fetch real-time.']);
    }

    public function updateDataIfNeeded()
    {
        

        $currentDate = now()->format('Y-m-d');
        $currentTime = now()->format('H:i');

        if ($currentDate === '2023-11-15' && $currentTime === '17:05') {
            // Update the 'time' column in the 'data' table
            Data::find(1)->update(['time' => 0]);
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);


    }

}
// app/Http/Controllers/RealTimeClockController.php
// app/Http/Controllers/RealTimeClockController.php


       


