@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6 mt-4 ">
      <div class="btn-group btn-group-lg" role="group" aria-label="Basic example">

       
      
        <form action="{{ route('ostatkischets.store') }}" method="POST">
          @csrf
          <input type="hidden" name="dayType" value="{{date('Y-m-d')}}">
          <button type="submit" class="btn btn-primary btn-lg">Дневной</button>
           

        </form>

     
         
          
            <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#exampleModalCenter">
              На месяц
            </button>
     
    
    <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"> На месяц</h5>
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
                <input type='date' class="form-control"  name="startDate" /> 
    
                </span>
             </div>
             <h5> <span class="badge bg-dark mt-2">До</span></h5>
             <div class='input-group date' id='datetimepicker5'>
              <input type='date' class="form-control" name="EndDate" /> 
   
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
 
@endsection
 