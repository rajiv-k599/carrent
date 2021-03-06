@extends('shared.AdminLayout')
@section('adminDashboard')
<link href="{{ asset('css/print.css') }}" rel="stylesheet">
<div class="card">
    <div class="card-header d-flex align-items-center">
      <h4>New Booking</h4>
    </div>
    <div class="card-body" >
      <div class="table-responsive" id="data">
      <table class="table table-bordered border-primary table-hover" >
          <thead>
            <tr>
                <th colspan="5" style="text-align:center">User Details</th>
                                       
            </tr>
          </thead>
          <tbody>
              <tr>
                  <td class="table-active">Name:</td>
                  <td>{{ $book->name }}</td>
                  <td class="table-active">Email:</td>
                  <td>{{ $book->email }}</td>
              </tr>
              <tr>
                <td class="table-active">Address:</td>
                <td>{{ $book->address }}</td>
                <td class="table-active">Phone no:</td>
                <td>{{ $book->number }}</td>
            </tr>
            <tr>
                <th colspan="5" style="text-align:center">Booking Details</th>
            </tr>
            <tr>
                <td class="table-active">Booking no:</td>
                <td>{{ $book->bookingNumber }}</td>
                <td class="table-active">Vehicle Name:</td>
                <td>{{ $book->Vname }}</td>
            </tr>
            <tr >
                <td class="table-active">Booking Date:</td>
                <td colspan='3'>{{ $book->created_at }}</td>
               
            </tr>
            <tr>
                <td class="table-active">FromDate:</td>
                <td>{{ $book->FromDate }}</td>
                <td class="table-active">ToDate:</td>
                <td>{{ $book->ToDate }}</td>
            </tr>
            <?php
            //   $from_date = $request->Fdate;
            //   $to_date = $request->Tdate;
               $first_datetime = new DateTime($book->FromDate);
               $last_datetime = new DateTime($book->ToDate);
              $interval = $first_datetime->diff($last_datetime);
              $final_days = $interval->format('%a')+1;
             
            ?>
            <tr>
                <td class="table-active">Total Days</td>
                <td>{{ $final_days}}</td>
                <td class="table-active">Rent Per Days:</td>
                <td>{{ $book->Rate }}</td>
            </tr>
            <tr>
                <td colspan='3' class="table-active">Grand total</td>
                <td>
                    <?php $res=$final_days*$book->Rate; echo $res; ?>
                </td>
            </tr>
            <tr>
                <td class="table-active">Booking Status:</td>
                <td colspan='3'><?php if($book->status==0){
                                         echo 'Pending';
                                          }elseif ($book->status==1) {
                                             echo 'Confirmed';
                                          } else {
                                            echo 'Canceled';
                                          }
                ?></td>
            </tr>
           
           

          </tbody>
      </table>
     
    </div>
    <button onclick="myprint()">print</button>
</div>
 
@endsection
<script>
    function myprint(){
      window.print();
    }
  </script>