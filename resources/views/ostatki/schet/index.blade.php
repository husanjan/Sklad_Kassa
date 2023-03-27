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
          <input type='date' class="form-control"  name="dayType"   value="{{ date("Y-m-d") }}" /> 
      
          <input type="hidden" value="{{$kodeOper}}" name="kodeOper">
    
     
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
                <input type="hidden" value="{{$kodeOper}}" name="kodeOper">
    
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
           <div class="d-flex justify-content-end"> <div class="btn-group">
           <!-- Button trigger modal -->
           <a href="ostatkischets/create?id=1" class="link-primary">Архив</a>
          
          </div></div>
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
                 <?php 
                 
                 $arrayday1=[];
                 ?>
                 @foreach ($SprAccounts->where('type','=',0) as  $SprAccountDayMoney)
             
               <tr>  
             <td> <b># </b>  </td>
             <td>{{ $SprAccountDayMoney->account}}</td>
             
             @foreach ($FoindDayMoney as $FoindDayMoneys)
                           @if($SprAccountDayMoney->id==$FoindDayMoneys['src'])
                        
                           @php
                              $arrayday1[]=$FoindDayMoneys['src'];
                           @endphp
                       
                           <td  >{{date('Y-m-d', strtotime($FoindDayMoneys['priod']))}}</td>
                           <td>{{ $FoindDayMoneys['ostatok_start']}}</td>
                           <td>{{ $FoindDayMoneys['Prikhod']}}</td>
                           <td>{{ $FoindDayMoneys['Raskhod']}}</td>
                     
                           <td>{{ $FoindDayMoneys['ostatok_end']}}</td>
                             @continue
                         
                           @endif
                        
                        
              @endforeach   
               @if(!in_array($SprAccountDayMoney->id,$arrayday1))
       
               {{-- @if(isset($FoindDayMoney[0]['priod']))   <td>{{ date('Y-m-d', strtotime($FoindDayMoney[0]['priod'])) }}</td>  @endif --}}
               
               <td>0</td>
               <td>0</td>
               <td>0</td>
               <td>0</td>
               <td>0</td>
               @endif
               </tr>
             @endforeach
             <tr>
              <td><b>Монета</b></td>
             </tr>
             <?php 
                 
             $arrayCoin1=[];
             ?>
             @foreach ($SprAccounts->where('type',1) as  $SprAccountCoins)
          
          
           <tr>  
            <td> <b># </b>  </td>
            <td>{{ $SprAccountCoins->account}}</td>
            
            @foreach ($FoindDayCoins as $FoindDayCoin)
                       @if($SprAccountCoins->id==$FoindDayCoin['src'])
                    
                       @php
                       $arrayCoin1['src']=$SprAccountCoins->id;
                    @endphp
                     
                       <td  >{{date('Y-m-d', strtotime($FoindDayCoin['priod']))}}</td>
                       <td>{{ $FoindDayCoin['ostatok_start']}} </td>
                       <td>{{ $FoindDayCoin['Prikhod']}}</td>
                       <td>{{ $FoindDayCoin['Raskhod']}}</td>
            
                       <td>{{ $FoindDayCoin['ostatok_end']}}</td>
                      @continue
                       @endif

               @endforeach   
              
               @if(!in_array($SprAccountCoins->id,$arrayCoin1))
               {{-- @if(isset($FoindDayMoney[0]['priod']))   <td>{{ date('Y-m-d', strtotime($FoindDayMoney[0]['priod'])) }}</td>  @endif --}}
               <td>0</td>
               <td>0</td>
               <td>0</td>
               <td>0</td>
               <td>0</td>
               @endif
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
          <div class="d-flex justify-content-end">  
            <div class="btn-group">
              <a href="ostatkischets/create?id=2" class="link-primary">Архив</a>
              <ul class="dropdown-menu">
                @foreach ( $DateFilterDay as   $DateFilterDays)
                  
            <li> <a class="dropdown-item " >{{$DateFilterDays}}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
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
               <?php 
                 
               $arrayday2=[];
               ?>
              @foreach ($SprAccounts->where('type',0) as  $SprAccount)
             <tr>  
           <td> <b># </b>  </td>
         
           <td>{{ $SprAccount->account}}</td>
   
           @foreach ($FoindMonthMoney as $FoindMonthMoneys)
       
               
                    @if($SprAccount->id==$FoindMonthMoneys['src'])
                        @php
                         $arrayday2[]=$SprAccount->id;
                       @endphp
                      
                         <td  >{{date('Y-m-d', strtotime($FoindMonthMoneys['priod']))}}</td>
                         <td>{{ $FoindMonthMoneys['ostatok_start']}}</td>
                         <td>{{ $FoindMonthMoneys['Prikhod']}}</td>
                         <td>{{ $FoindMonthMoneys['Raskhod']}}</td>
                   
                         <td>{{ $FoindMonthMoneys['ostatok_end']}}</td>
                         
                         @endif                
               @endforeach   
               @if(!in_array($SprAccount->id,$arrayday2))
               {{-- @if(isset($FoindDayMoney[0]['priod']))   <td>{{ date('Y-m-d', strtotime($FoindDayMoney[0]['priod'])) }}</td>  @endif --}}
               <td>0</td>
               <td>0</td>
               <td>0</td>
               <td>0</td>
               <td>0</td>
               @endif
               {{-- @if(!in_array($SprAccount->id,$arrayday2)) --}}
               {{-- @if(isset($FoindMonthMoney[0]['priod']))   <td>{{ date('Y-m-d', strtotime($FoindMonthMoney[0]['priod'])) }}</td>  @endif --}}
        
               {{-- <td>0</td>
               <td>0</td>
               <td>0</td>
               <td>0</td>
               <td>0</td> --}}
               {{-- @endif --}}
             </tr>
           @endforeach
           <tr>
            <td><b>Монета</b></td>
           </tr>
           <?php 
                 
           $arrayCoin2=[];
           ?>
           @foreach ($SprAccounts->where('type',1) as  $SprAccountMonthMoney)
        
         <tr>  
           
       <td> <b># </b>  </td>
       <td>{{ $SprAccountMonthMoney->account}}</td>
     
       @foreach ($FoindMonthCoins AS $FoindMonthC)
       {{-- {{ dd($FoindMonthCoinss) }}  --}}
       {{-- @if(!in_array($SprAccountMonthMoney->id,$arrayCoin2)) --}}
     @php
      // echo "<pre>";
      //   print_r($FoindMonthC);
      //   echo "</pre>";
     @endphp
           @if($SprAccountMonthMoney->id==$FoindMonthC['src'])
       @php
       $arrayCoin2[]=$SprAccountMonthMoney->id;
       @endphp  
     
       <td  >  {{date('Y-m-d', strtotime($FoindMonthC['priod']))}}</td>
       <td>{{ $FoindMonthC['ostatok_start']}}</td>
       <td>{{ $FoindMonthC['Prikhod']}}</td>
       <td>{{ $FoindMonthC['Raskhod']}}</td>

       <td>{{ $FoindMonthC['ostatok_end']}}</td>
       {{-- @continue --}}
       {{-- @endif --}}
       @endif

@endforeach   
 
               {{-- @if(!in_array($SprAccountMonthMoney->id,$arrayCoin2)) --}}
               {{-- @if(isset($FoindMonthMoney[0]['priod']))   <td>{{ date('Y-m-d', strtotime($FoindMonthMoney[0]['priod'])) }}</td>  @endif --}}
               {{-- <td>0</td>
               <td>0</td>
               <td>0</td>
               <td>0</td>
               <td>0</td> --}}
               {{-- @endif --}}
               @if(!in_array($SprAccountMonthMoney->id,$arrayCoin2))
               {{-- @if(isset($FoindDayMoney[0]['priod']))   <td>{{ date('Y-m-d', strtotime($FoindDayMoney[0]['priod'])) }}</td>  @endif --}}
               <td>0</td>
               <td>0</td>
               <td>0</td>
               <td>0</td>
               <td>0</td>
               @endif
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
 