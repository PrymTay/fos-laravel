@extends('layouts.Userheader')
@section('content')
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<div>
    <div class="sales-boxes">
      <div class="recent-sales box">
        <div class="row ">
          <div class="col-md-6">

            <div class="input-group mb-3">
              <div class="input-group-addon">
                <span class="input-group-text bg-info text-white" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" id="date" placeholder="Date"/>
            </div> 

          </div>
        </div>
        <table class="table table-bordered table-hover table-striped mt-4 data-table">
          <thead>
            <tr>
              <th>FIRST NAME</th>
         
              <th>ORDER ID</th>           
              <th>TOTAL</th>             
              <th>DATE</th>

            </tr>
          </thead>
          <tbody>
          
          </tbody>
        </table>
      </div>
    </div>
    </div>
</div>


<!--popper js-->
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
{{-- <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script> --}}

<!-- date range picker js-->

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<!-- data tables js-->

<script type="text/javascript" src=" https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src=" https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src=" https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>



<script>
  $(document).ready(function(){

    // Date range picker
    var startDate = "";
    var endDate = "";
    $('#date').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('YYYY-MM-DD ' ) + ' to ' + picker.endDate.format('YYYY-MM-DD '));
    });

    $('#date').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
    });

    $(function() {
      $('#date').daterangepicker({
        timePicker: false,
        startDate: moment().startOf('hour'),
        
        endDate: moment().startOf('hour').add(32, 'hour'),
        locale: {
          format: 'YYYY-MM-DD '
        }
      }, function(start, end) {
        var startDate = start.format('YYYY-MM-DD ');
        var endDate = end.format('YYYY-MM-DD ');
       console.log(startDate,endDate)
    
        if (startDate !== "" && endDate !== "") {
          getDateRangeRecord(startDate, endDate);
        }
      });
    });
   
        // ajax for the date range picker
        function getDateRangeRecord(endDate, startDate) {
          $.ajax({
            data: [],
            url: "/user/expenditure",
            type: "get",
           
            cache: true,
            data: {
              startDate: startDate,
              endDate: endDate
            },
            dataSrc: "tableData",
            dataType: "json",
            success: function(data) {
             // console.log(data);
              
            // $("#table_id tbody").html(data);
             var i = "1";

             //DATA TABLES
 
        
         $('.data-table').DataTable({
          "iDisplayLength": 5,
          dom: 'Bfrtip',
          buttons: [
                'copy', 'excel', 'pdf'
              ],
              'className':'btn btn-info',
          processing: true,
          serverSide: true,
          ajax: "{{ route('userReport') }}",
          "columns": [
           
              {data: 'firstname'},
              {data: 'total'},
              {data: 'order_id'},
              {data: 'created_at' },
             
            
          ],
         
      });
    //});
            }
  });
  }

});
//}
      //});
    
  
        //console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
   

</script>

</html>
              

@endsection