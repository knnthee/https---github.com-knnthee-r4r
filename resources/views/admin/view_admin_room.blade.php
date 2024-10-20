<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    @include('admin.header')
    @include('admin.sidebar')

   

    
     


    <style type="text/css">

    .table_deg
    {
        border: 2px solid white;
        margin: auto;
        width:80%;
        text-align: center;
        margin-top: 40px;
    }

    .th_deg
    {
        background-color: rgb(255, 255, 255);
        padding: 15px;
    }
    
    tr
    {
        border: 3px solid white;
    }

    td
    {
        padding: 10px;
    }
    
    </style>
    


    <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            


            <table class="table_deg">

                <tr>
                    <th class="th_deg">Room Title</th>
                    <th class="th_deg">Description</th>
                    <th class="th_deg">Price</th>
                    <th class="th_deg">Wifi</th>
                    <th class="th_deg">Room Type</th>
                    <th class="th_deg">Image</th>
                    <th class="th_deg">Delete</th>
                    <th class="th_deg">Status</th>
                </tr>

                @foreach($data as $data)
                <tr>
                    <td>{{$data->room_title}}</td>
                    
                    <td>{!! Str::limit ($data->description,150) !!}</td>
                    <td>₱{{$data->price}}</td>
                    <td>{{$data->wifi}}</td>
                    <td>{{$data->room_type}}</td>
                    
                    <td>
                        <img width="100" src="room/{{$data->image}}">
                    </td>
                    <td>
                        <a onclick="return confirm('Are you sure to delete this?');" class="btn btn-danger" href="{{url('room_delete',$data->id)}}">Delete</a>

                    </td>
                    
                    <td>
                        @if($data->status == 'approved')

                        <span style="color: green;">Approved</span>

                        @endif

                        @if($data->status == 'rejected')

                        <span style="color: red;">Rejected</span>

                        @endif

                        @if($data->status == 'waiting')

                        <span style="color: yellow;">Waiting</span>
                        @endif
                    </td>
                </tr>

                @endforeach


            


    </div>
        </div>
         </div>        
   
        @include('admin.footer')
      
  </body>
</html>