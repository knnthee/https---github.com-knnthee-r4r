<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;
use App\Models\Booking;


class AdminController extends Controller
{
    public function index()
    {
        if (Auth::id())    
        { 
          $usertype = Auth()->user()->usertype;
          if($usertype=='user')
          {
            $room = Room::all();
            return view('home.index', compact('room'));
          }
          
          else if($usertype=='admin')
          {
            $room = room::where('status','approved')->get()->count();
            return view('admin.index', compact('room'));
          }
          else if($usertype=='owner')
          {
            return view('owner.index');
          }
          else
          {
            return redirect()->back(); 
          }
        }
    }

    public function home()
    {
      $room = Room::where('status','=','Approved')->get();
      return view('home.index', compact('room'));
    }

    public function approval_room()
    {

      $data =Room::all();
      return view('admin.approval_room',compact('data'));

    }

    public function approve_post($id)
    {
      $room = Room::find($id);

      $room->status='approved';
      $room->save();

      return redirect()->back();
    }

    public function reject_post($id)
    {
      $room = Room::find($id);

      $room->status='rejected';
      $room->save();

      return redirect()->back();
    }

    public function view_admin_room()
{
    // Fetch all room data
    $data = Room::all();  // Correct the variable name to 'data' for room details
    
    // Count approved rooms
    $room = Room::where('status', 'approved')->count();

    // Pass both 'data' and 'room' to the view
    return view('admin.view_admin_room', compact('data', 'room'));
}



  }