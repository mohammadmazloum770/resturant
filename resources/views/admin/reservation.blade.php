<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')
   <style>

    table{
        border:1pxsolid skyblye;
        margin: auto;
        width: 100px;
        margin-top: 50px;
        border-collapse: collapse;
        width: 80%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    

    }

    th{
        background-color: skyblue;
        padding: 20px;
        text-align: center;
        font-size: 18px;
    }
    td{
        padding: 20px;
        text-align: center;
        color:white;
        font-weight: bold;

    }

    </style>

   
  </head>
  <body>

  @include('admin.header')
    


    @include('admin.sidebar')
  




    
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

          <table>
            <tr>
               <th>Phone Number</th>
               <th>Nb of guest</th>
               <th>Date</th>
               <th>Time</th>
            </tr>

            @foreach($book as $book)


            
            <td>{{$book->phone  }}</td>
            <td>{{$book->guest  }}</td>
            <td>{{$book->date }}</td>
            <td>{{$book->time  }}</td>


            </tr>
            @endforeach
          </table>
       
      </div>
    </div>
    @include('admin.js')
    
  </body>
</html>