@extends('layouts.app')

@section('content')
<!-- Button trigger modal -->
 
  
  <!-- Modal -->
  <div class="modal fade  " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog   modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
    
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
             
             <div id="table">
                
             </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
  
        </div>
      </div>
    </div>
  </div>
   <div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Дата </th>
            <th scope="col"></th>
            <th scope="col"> </th>
            
  
          </tr>
        </thead>
        <tbody>
            @php 
             $count=1;
            @endphp
            
            @foreach ($DateFilter as $DateFilters=>$Date )
            <tr>
                <th >{{ $count++ }}</th>
                <th scope="row">{{ $Date }}</th>
                <td>  <a  class="link-primary view" id="{{$DateFilters}}"   data-toggle="modal" data-target="#exampleModalCenter"><span class="badge badge-primary">Просмотреть</span> </a></td>
          
               <td id="delete">

                                    {!! Form::open(['method' => 'DELETE','route' => ['ostatkischets.destroy', $DateFilters],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
            </td>  
              </tr>
            @endforeach
       
         
        </tbody>
      </table>
   </div>
@endsection
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/ajax.min.js')}}"></script>
<script>
     
$(document).ready(function() {

    $('.view').on('click',function()
    {
     
    
   /// alert($(this).attr('id'));

   $.ajax({
   url:  "ostatkischets.edit" ,
   type:"PUT",
   data:{
       "_token": "{{ csrf_token() }}",
       kode_oper:$(this).attr('id'),

   },
   success:function(response){
  
          $('#table').html(response);
  
   },
});
    
    });
});
</script>