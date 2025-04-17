<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Driver;
use App\Models\DriverReview;
use App\Models\Inbox;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class driverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAllDrivers()
    {
        $drivers = User::where('role', 'driver')
        ->with(['reviewsReceived.client']) 
        ->get();

        return response()->json([
            'status' => true,
            'data' => $drivers
        ]);
    }

    public function getReviews($id){
        $driverReviewed=DriverReview::with('client')->where('driver_id',$id)->get();
        return response()->json([
            'status' =>true,
            'data' =>$driverReviewed
        ]);
    }

    public function getMyInbox(){
        $user=Auth::user();
        if ($user->role !="driver"){
            return response()->json([
                'Its not a valid Driver'
            ]);
    }
        else{
            $Inboxes=Inbox::where('driver_id',$user->id)->get();
            return response()->json([
                'status'=>true,
                'data'=>$Inboxes
            ]);

    }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
