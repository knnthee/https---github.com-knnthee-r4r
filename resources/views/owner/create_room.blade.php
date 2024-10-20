<!DOCTYPE html>
<html>
  <head> 
   
    
    <style type="text/css">

    label
    {
     
        display: inline-block;
        width: 200px;
    }

    .div_deg
    {
    padding-top: 30px;
    }

    .div_center
    {
        text-align: center;
        padding-top: 40px;
    }

    </style>

    

    @include('admin.css')
    @include('admin.header')
    @include('admin.sidebar')
    

    <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

              <div class="div_center">
                <h1>Add Rooms</h1>
                <form action="{{url('add_room')}}" method="Post" enctype="multipart/form-data">


                    @csrf

                    <div class="div_deg">
                        <label> Room title </label>
                        <input type="text" name="title">
                    </div>

                    <div class="div_deg">
                        <label> Room description </label>
                        <textarea name="description"></textarea>
                    </div>

                    <div class="div_deg">
                        <label> Price </label>
                        <input type="number" name="price">
                    </div>

                    <div class="div_deg">
                        <label> Room Type </label>
                        <select name="type">
                            <option  value = "studio">Studio</option>
                            <option value="apartment">Apartment</option>
                        </select>
                    </div>

                    <div class="div_deg">
                        <label> Wifi</label>
                        <select name="wifi">
                            <option  value = "yes">yes</option>
                            <option value="no">no</option>
                        </select>
                    </div> 

                    <div class="div_deg">
                        <label>Upload Image </label>
                        <input type= "file" name="image">
                    </div>

                    <div class="div_deg">
                        <input class="btn btn-primary" type="submit" value="Add Room">
                    </div>

                  


          </div>
        </div>
    </div>
    
    

    
        @include('admin.footer')
      
  </body>
</html>

