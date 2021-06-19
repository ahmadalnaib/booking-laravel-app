<?php

namespace App\Http\Controllers;
use App\Models\Schedule;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use App\Bookings\TimeSlotGenerator;
use App\Models\Service;

class BookingController extends Controller
{
    public function __invoke()
    {
        $schedule=Schedule::find(1);
        $service=Service::find(1);
        
        $slots=(new TimeSlotGenerator($schedule,$service))->get();
        return view('bookings.create',[
            'slots'=>$slots
        ]);
    }
}
