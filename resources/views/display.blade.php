<html lang="en">
<head>
    <title>Laravel DataTables Tutorial Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
        
</head>
      <body>
      @if(session()->has('fail'))
   <div class="alert alert-danger">
      {{ session('fail') }}
   </div>
   @elseif(session()->has('success'))
   <div class="alert alert-danger">
      {{ session('success') }}
   </div>
@endif
         <div class="container">
               <h2>Admin Table</h2>
            <table class="table table-bordered" style="text-align: center;" id="table">
               <thead>
                  <tr>
                     <th>S.N.</th>
                     <!-- <th>Product Id</th> -->
                     <th>Name</th>
                     <th>Email</th>
                     <th>Phone</th>
                     <th>Image</th>
                     <th>Action</th>
                  </tr>
               </thead>
               @foreach($data as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <!-- <td>{{$item->id}}</td> -->
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->phone_number}}</td>
                        <!-- <td>{{$item->image}}</td> -->
                        <td><img src="{{ asset($item->image) }}" width="50" height="50" alt="image"></td>
                        <td>
                           <a href="{{route('edit.form',[ 'id' =>$item->id])}}" class="btn btn-primary">Edit</a>
                           <a href="#" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach

            </table>
         </div>
         <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
      <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
      <script>
         $(document).ready(function(){
            $('#table').DataTable();
         });
      </script>
   </body>
</html>