<?php

namespace App\Http\Controllers;
use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;



class DataController extends Controller
{
    public function index()
    {
        return view('update-data');
    }

    public function updateData()
    {
        // Find the record in the 'data' table where 'time' is 1
        $dataRecord = Data::where('time', 1)->first();

        if ($dataRecord) {
            // Update the 'time' column to 0
            $dataRecord->update(['time' => 0]);

            // Optionally, you can log the update or perform additional actions
            Log::info('Data updated successfully.');

            return response()->json(['success' => true]);
        } else {
            // Record not found
            Log::warning('Data record not found with time = 1.');

            return response()->json(['success' => false]);
        }
    }

    public function updateDataIfNeeded()
    {
        $currentTime = now()->format('H:i'); // Get the current time in 24-hour format

        if ($currentTime === '11:57') {
            // Update the 'time' column in the 'data' table
            Data::find(1)->update(['time' => 0]); // Change the value to 0
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
}
// app/Http/Controllers/DataController.php

// app/Http/Controllers/RealTimeClockController.php
// app/Http/Controllers/RealTimeClockController.php


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

   
}
