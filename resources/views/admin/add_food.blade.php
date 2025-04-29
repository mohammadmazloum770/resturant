<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')
   <style>
    label{
      display: inline-block;
      width: 200px;
      color: white;
    }
    .div_deg{
      padding: 15px;
    }
    .div_deg label{
      display: inline-block;
      width: 200px;
    }
    .div_deg input{
      color: black;
    }
    textarea{
      color: black;
    }
    .btn-primary{
      background-color:rgb(141, 8, 8);
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    } .col-sm-10{
        display: inline-block;
      padding: 15px;
    }
    </style>
   
  </head>
  <body>

  @include('admin.header')
    


    @include('admin.sidebar')
  




    
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <form action="{{ url('upload_food') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="div_deg">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Food Title</label>
                    <div class="col-sm-10">
                      <input type="text" name="title" class="form-control" id="inputEmail3" placeholder="Food Title" required>
                    </div>
                  </div>

                  <div class="div_deg">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Food Details</label>
                      <textarea  name="description" cols="70" rows="5" placeholder="Description" required></textarea>
                    </div>
                  
                  <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Food Price</label>
                    <div class="col-sm-10">
                      <input type="text" name="price" class="form-control" id="inputEmail3" placeholder="Food Price" required>
                    </div>
                  </div>
                  <div class="div_deg">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                      <input type="file" name="img" required >
                    </div>
                    </div>
                  <input type="submit" value="Add Food" class="btn-primary">


            </form>
        
      </div>
    </div>
    @include('admin.js')
    
  </body>
</html>