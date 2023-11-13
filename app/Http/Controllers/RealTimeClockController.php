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
        $currentTime = now()->format('H:i');
        $availCheckin = '17:24';
        if ($currentTime === $avail) {
            // Update the 'time' column in the 'data' table
            Data::find(1)->update(['time' => 1]);
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }

}
// app/Http/Controllers/RealTimeClockController.php
// app/Http/Controllers/RealTimeClockController.php


       


