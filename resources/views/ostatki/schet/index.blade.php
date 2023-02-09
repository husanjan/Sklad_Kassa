@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 mt-4 ">
      @if ($message = Session::get('danger'))
<div class="alert alert-danger">
    <p>{{ $message }}</p>
</div>
@endif
      <div class="btn-group btn-group-lg" role="group" aria-label="Basic example">
 
   
          {{-- <button type="button" class="btn btn-primary btn-lg" data-target="#days">Дневной</button> --}}
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#days">
            Дневной
          </button>

        {{-- </form> --}}
            <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#exampleModalCenter">
              На месяц
            </button>
     
    
    <!-- Button trigger modal -->
 

<!-- Modal  days-->
<div class="modal fade" id="days" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Дневной</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('ostatkischets.store') }}" method="POST">
          @csrf  
          <input type='date' class="form-control"  name="dayType" required /> 
      
        
     
      </div>
      <div class="modal-footer">
        
        <button type="submit" class="btn btn-primary" data-target="#days">OK</button>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal end days-->
<!-- Modal  Mothly  -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">На месяц</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('ostatkischets.store') }}" method="POST">
        @csrf
      <div class="modal-body">
        <div class='col-sm-6'>
          <div class="form-group ">
            <div class="btn-group btn-group-lg" role="group" aria-label="Basic example">
             <div class='input-group date' id='datetimepicker5'>
                <input type='date' class="form-control"  name="startDate" required /> 
    
                </span>
             </div>
             <h5> <span class="badge bg-dark mt-2">До</span></h5>
             <div class='input-group date' id='datetimepicker5'>
              <input type='date' class="form-control" name="EndDate" required /> 
   
              </span>
           </div>
          </div>
      </div>
      <div class="modal-footer">
         
        <button type="submit" class="btn btn-primary">Ок</button>
      </div>
    </form>
    </div>
  </div>
</div>
      </div>
    </div>
  </div>
</div>

</div>
 <div class="row">

  <div class="col-12 col-lg-6  mt-2"  >

    <div class="card ">
        <div class="card-body">
            <h4>Дневной</h4>
  
            <br>
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th width="30">Счет</th>
                  <th  >Дата</th>
                  <th>Остаток  на начало</th>
                  <th>Приход</th>
                  <th>Расход</th>
                 <th>Остаток на конец</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><b>Бумага</b></td>
                 </tr>
                @foreach ($FoindDayMoney as $FoindDayMoneys)
               <tr>  
             <td> <b># </b>  </td>
            
             @foreach ($SprAccounts as  $SprAccount)
                           @if($SprAccount->id==$FoindDayMoneys['src'])
                        
                           
                           <td>{{ $SprAccount->account}}</td>
                           <td  >{{date('Y-m-d', strtotime($FoindDayMoneys['priod']))}}</td>
                           <td>{{ $FoindDayMoneys['ostatok_start']}}</td>
                           <td>{{ $FoindDayMoneys['Prikhod']}}</td>
                           <td>{{ $FoindDayMoneys['Raskhod']}}</td>
                     
                           <td>{{ $FoindDayMoneys['ostatok_end']}}</td>
                           
                           @endif                
                 @endforeach   
               </tr>
             @endforeach
             <tr>
              <td><b>Монета</b></td>
             </tr>
            @foreach ($FoindDayCoins as $FoindDayCoin)
           <tr>  
         <td> <b># </b>  </td>
        
         @foreach ($SprAccounts as  $SprAccount)
                       @if($SprAccount->id==$FoindDayCoin['src'])
                    
                       
                       <td>{{ $SprAccount->account}}</td>
                       <td  >{{date('Y-m-d', strtotime($FoindDayCoin['priod']))}}</td>
                       <td>{{ $FoindDayCoin['ostatok_start']}}</td>
                       <td>{{ $FoindDayCoin['Prikhod']}}</td>
                       <td>{{ $FoindDayCoin['Raskhod']}}</td>
            
                       <td>{{ $FoindDayCoin['ostatok_end']}}</td>
                       
                       @endif                
             @endforeach   
           </tr>
         @endforeach
              </tbody>
            </table>
            
            <div>
     
            </div>
        </div>
    </div>
  
    
  </div>


 </div>
 
 <div class="col-12 col-lg-6  mt-2"  >

  <div class="card ">
      <div class="card-body">
          <h4>Ежемесячно</h4>
{{ date('H:i:s') }}
          <br>
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th width="30">Счет</th>
                <th  >Дата</th>
                <th>Остаток  на начало</th>
                <th>Приход</th>
                <th>Расход</th>
               <th>Остаток на конец</th>
            
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><b>Бумага</b></td>
               </tr>
              @foreach ($FoindMonthMoney as $FoindMonthMoneys)
             <tr>  
           <td> <b># </b>  </td>
          
           @foreach ($SprAccounts as  $SprAccount)
                         @if($SprAccount->id==$FoindMonthMoneys['src'])
                      
                         
                         <td>{{ $SprAccount->account}}</td>
                         <td  >{{date('Y-m-d', strtotime($FoindMonthMoneys['priod']))}}</td>
                         <td>{{ $FoindMonthMoneys['ostatok_start']}}</td>
                         <td>{{ $FoindMonthMoneys['Prikhod']}}</td>
                         <td>{{ $FoindMonthMoneys['Raskhod']}}</td>
                   
                         <td>{{ $FoindMonthMoneys['ostatok_end']}}</td>
                         
                         @endif                
               @endforeach   
             </tr>
           @endforeach
           <tr>
            <td><b>Монета</b></td>
           </tr>
          @foreach ($FoindMonthCoins as $FoindMonthCoins)
         <tr>  
       <td> <b># </b>  </td>
      
       @foreach ($SprAccounts as  $SprAccount)
                     @if($SprAccount->id==$FoindMonthCoins['src'])
                  
                     
                     <td>{{ $SprAccount->account}}</td>
                     <td  >{{date('Y-m-d', strtotime($FoindMonthCoins['priod']))}}</td>
                     <td>{{ $FoindMonthCoins['ostatok_start']}}</td>
                     <td>{{ $FoindMonthCoins['Prikhod']}}</td>
                     <td>{{ $FoindMonthCoins['Raskhod']}}</td>
          
                     <td>{{ $FoindMonthCoins['ostatok_end']}}</td>
                     
                     @endif                
           @endforeach   
         </tr>
       @endforeach
            </tbody>
          </table>

       
          <div>
   
          </div>
      </div>
  </div>

  
</div>
@endsection
 