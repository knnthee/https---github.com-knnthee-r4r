<!DOCTYPE html>
<html>
  <head> 
    @include('owner.css')

    <style type="text/css">

.table_deg
    {
        border: 2px solid white;
        margin: auto;
        width:100%;
        text-align: center;
        margin-top: 40px;
    }

    .th_deg
    {
        background-color: rgb(255, 255, 255);
        padding: 2px;
    }
    
    tr
    {
        border: 3px solid white;
    }

    td
    {
        padding: 4px;
    }

    </style>


   

    @include('owner.header')
    @include('owner.sidebar')

    <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <table class="table_deg">
                <tr>
                    <th class="th_deg">Room_id</th>
                    <th class="th_deg">Customer name</th>
                    <th class="th_deg">Email</th>
                    <th class="th_deg">Phone</th>
                    <th class="th_deg">Arrival Date </th>
                    <th class="th_deg">Leaving Date</th>
                    <th class="th_deg">Status</th>
                    <th class="th_deg">Room Title</th>
                    <th class="th_deg">Price</th>
                    <th class="th_deg">Image</th>
                    <th class="th_deg">Delete</th>
                    <th class="th_deg">Status Update</th>
                </tr>
            
                @foreach($data as $data)
                <tr>
                    <td>{{$data->room_id}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->start_date}}</td>
                    <td>{{$data->end_date}}</td>
                    <td>
                        @if($data->status == 'approved')
                            <span style="color: green;">Approved</span>
                        @elseif($data->status == 'rejected')
                            <span style="color: red;">Rejected</span>
                        @elseif($data->status == 'waiting')
                            <span style="color: yellow;">Waiting</span>
                        @endif
                    </td>
                    <td>
                        @if($data->room)
                            {{$data->room->room_title}}
                        @else
                            <span style="color: red;">Room Not Found</span>
                        @endif
                    </td>
                    <td>
                        @if($data->room)
                            ₱{{$data->room->price}}.00
                        @else
                            <span style="color: red;">N/A</span>
                        @endif
                    </td>
                    <td>
                        @if($data->room)
                            <img style="width: 200px!important" src="/room/{{$data->room->image}}">
                        @else
                            <img style="width: 200px!important" src="/room/default-image.jpg"> <!-- Optional placeholder -->
                        @endif
                    </td>
                    <td>
                        <a onclick="return confirm('Are you sure to delete this');" 
                           class="btn btn-danger" href="{{url('delete_booking', $data->id)}}">Delete</a>
                    </td>
                    <td>
                        <span style="padding-bottom: 15px;">
                            <a class="btn btn-success" href="{{url('approve_book', $data->id)}}">Approve</a>
                        </span>
                        <a class="btn btn-danger" href="{{url('reject_book', $data->id)}}">Reject</a>
                    </td>
                </tr>
                @endforeach
            </table>
            


          </div>
        </div>
    </div>

        
    @include('owner.footer')
      
  </body>
</html>