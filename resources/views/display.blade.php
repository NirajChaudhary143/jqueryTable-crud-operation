<html lang="en">
<head>
    <title>Laravel DataTables Tutorial Example</title>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
        
</head>
      <body>
        
         <div class="container">
               <h2>Prosucts Table</h2>
            <table class="table table-bordered" id="table">
               <thead>
                  <tr>
                     <th>S.N.</th>
                     <!-- <th>Product Id</th> -->
                     <th>Name</th>
                     <th>Email</th>
                     <th>Phone</th>
                     <th>Image</th>
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