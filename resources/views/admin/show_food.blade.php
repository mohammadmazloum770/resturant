<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')
   <style>

    table {
        border: 1px solid skyblue;
        margin: auto;
        width: 800px;
        
    }
    th{
        background-color: skyblue;
        color: white;
        padding: 10px;
        margin: 10px;
    }
    td{
        color: white;
        padding: 10px;

    }
    .btn-danger{
        background-color: red;
        color: white;
        padding: 10px;
        text-decoration: none;
    }
    .btn-update{
        background-color: yellow;
        color: black;
        padding: 10px;
        text-decoration: none;
    }
   </style>
   
  </head>
  <body>

  @include('admin.header')
    


    @include('admin.sidebar')
  




    
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h1>All Foods</h1>
            <div>
                <table>
                    <tr>
                        <th>Food Title</th>
                        <th>Details</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Delete</th>
                        <th>Update</th>
                    </tr>
                    @foreach ($data as $data)
                    <tr>
                        <td>{{ $data->title }}</td>
                        <td>{{ $data->detail }}</td>
                        <td>{{ $data->price }}</td>
                        <td>
                            <img src="food_img/{{ $data ->image }}" alt="" style="width: 100px; height: 100px;">


                        </td>
                        <td><a href="{{ url('delete_food',$data->id) }}" class="btn-danger" onclick="return confirm('Are you sure to delete this')">Delete</a></td>
       
                        <td><a href="{{ url('update_food',$data->id) }}" class="btn-update">Update</a></td>
       
                      </tr>
                    @endforeach
                </table>


            </div>
      </div>
    </div>
    @include('admin.js')
    
  </body>
</html>