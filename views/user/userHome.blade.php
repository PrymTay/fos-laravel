@extends('layouts.userHeader')
@section('content')

    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> --}}
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<div class="sales-boxes">
    <div class="recent-sales box">
        <table class="table table-bordered table-hover table-striped mt-4 data-table" id="table_id" >
            <thead>
              <tr>
                <th>ORDER ID </th> 
                <th>Food Name</th> 
                <th>Price</th>                        
                <th>DATE</th>
    
              </tr>
            </thead>
            <tbody>
                {{-- @foreach ($query as $item)
                <tr>
                  <td>{{ $item->id }}</td> 
                  <td>{{ $item->name }}</td>  
                  <td>{{ $item->price }}</td>        
                  <td>{{ $item->created_at }}</td>
               </tr>
                @endforeach --}}
            </tbody>
          </table>
          <strong><small>Same orderid indicates content of the same order</small></strong>
    </div>
    
    
</div>
<script type="text/javascript">
    $(function () {
      var table = $('.data-table').DataTable({
        dom:'Bfrtip',
            buttons:[
             'copy', 'excel', 'pdf'
            ],
          processing: true,
          serverSide: true,
          ajax: "{{ route('recentOrders') }}",
          columns: [
              {data: 'id'},
              {data: 'name'},
              {data: 'price'},
              {data: 'created_at', orderable: true, searchable: true},
          ]
      });
    });
    </script>

@endsection