<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;
use App\Models\Booking;


class OwnerController extends Controller
{
    public function index()
    {
        $rooms = Room::where('owner_id', Auth::id())->get(); // Fetch rooms belonging to the logged-in owner
        return view('owner.my_rooms', compact('rooms'));
    }

    public function home()
    {
      $room = Room::all();
      return view('home.index', compact('room'));
    }

    public function create_room()
    {
      return view('owner.create_room');
    }

    public function add_room(Request $request)
    {
     $data = new Room ();
 
     $data->room_title = $request->title;
     $data->description = $request->description;
     $data->price = $request->price;
     $data->wifi = $request->wifi;
     $data->room_type= $request->type;
     $image=$request->image;
     if($image)
     {
      $imagename =time().'.'.$image->getClientOriginalExtension();
      $request->image->move('room',$imagename);
      $data->image= $imagename;
     }

     $data->save();
     
     return redirect()->back();

    }

    public function view_room()
    {

      $data =Room::all();
      return view('owner.view_room',compact('data'));

    }

    public function room_delete($id)
    {

      $data =Room::find($id);

      $data->delete();
      return redirect()->back();

    }

    public function room_update($id)
    {

      $data = Room::find($id);
      return view('owner.update_room',compact('data'));

    }

    public function edit_room(Request $request, $id)
    {

      $data = Room::find($id);

      $data->room_title = $request->title;
      $data->description = $request->description;
      $data->price = $request->price;
      $data->wifi = $request->wifi;                                                                                                                                     
      $data->room_type = $request->type;
      $image=$request->image;
      if($image)
      {
      $imagename =time().'.'.$image->getClientOriginalExtension();
      $request->image->move('room',$imagename);
      $data->image= $imagename;
      }
     
      $data->save();
      Return redirect()->back();  
    }

    public function bookings(){

      $data=Booking::all();
      return view('owner.booking' ,compact('data'));
    }

    public function delete_booking($id)
    {
      $data = Booking::find($id);

      $data->delete();

      return redirect()->back();
    }


    public function approve_book($id)
    {
      $booking = Booking::find($id);

      $booking->status='approved';
      $booking->save();

      return redirect()->back();
    }

    public function reject_book($id)
    {
      $booking = Booking::find($id);

      $booking->status='rejected';
      $booking->save();

      return redirect()->back();
    }
}
