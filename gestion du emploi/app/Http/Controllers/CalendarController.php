<?php

namespace App\Http\Controllers;
use App\Models\Seances;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;


class CalendarController extends Controller
{
    public function index(Request $request)
    {
    	
		$events=array();
		$bookings = DB::table('seances')
		->join('enseignants', 'seances.enseignant_id', '=', 'enseignants.id')
		->select('seances.*', DB::raw("CONCAT(enseignants.prenom, ' ', enseignants.nom) as en"))
		->get();
	

		foreach ($bookings as $booking) {
			 $events[] = [
				'title' => $booking->en,
				'start' => $booking->date_Debut, 
				'end' => $booking->date_Fin,
			];
		}
		
		
        
    	return view('Calendar',['events'=>$events]);
    }

    public function action(Request $request)
    {
    	if($request->ajax())
    	{
    		if($request->type == 'add')
    		{
    			$event = Seances::create([
    				'title'		=>	$request->id,
    				'start'		=>	$request->date_Debut,
    				'end'		=>	$request->date_Fin
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'update')
    		{
    			$event = Seances::find($request->id)->update([
    				'title'		=>	$request->title,
    				'start'		=>	$request->start,
    				'end'		=>	$request->end
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'delete')
    		{
    			$event = Seances::find($request->id)->delete();

    			return response()->json($event);
    		}
    	}
    }
}
