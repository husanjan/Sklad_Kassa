@extends('layouts.app')

@section('content')




   
  <!-- Modal -->
  <nav aria-label="breadcrumb ">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Главная</a></li>
        <li class="breadcrumb-item active" aria-current="page">Ботилшуда танга</li>
    </ol>
</nav>

  @if ($message = Session::get('success'))
  <div class="alert alert-success">
      <p>{{ $message }}</p>
  </div>
  @endif
  @if ($message = Session::get('danger'))
  <div class="alert alert-danger">
      <p>{{ $message }}</p>
  </div>
  @endif
  <div class="container">
    <div class="col-md-12">
        <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#rashod"   id="priznak" value="0">Приход </button>
            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#rashod"  id="priznak" value="1">Расход</button>

        </div>
    </div>
</div>
@endsection

 

<script src="{{asset('js/ajax.min.js')}}"></script>
{{-- this sccript nepolnie input add --}}
<script src="{{asset('js/nepolnoeScript.js')}}"></script>
{{-- end this sccript nepolnie input add --}}
{{-- this sccript Checked validate click with submit  --}}
<script src="{{asset('js/submitValidate.js')}}"></script>
{{-- end this sccript Checked validate click with submit  --}}

{{-- this sccript count all Sum   --}}
<script src="{{asset('js/sumCounts.js')}}"></script>
{{-- end this sccript   count all Sum   --}}
{{-- this sccript count all Safe  safeshkaf    --}}
<script src="{{asset('js/AddRemoveButton.js')}}"></script>
{{-- end this sccript   count all Sum   --}}
 <script>
     //Safe ajax
 
      
     $(document).on('change','[id^=safe_id]',function (){


var  id_number= $(this).attr("id").substr(-2);
$('#'+id_number.substr(-2,1)+'Somon').addClass("d-none");
console.log(id_number.substr(-2,1));
$("#"+$(this).attr('id')).removeClass("border-danger");
 var shaving=$("#shaving"+id_number);

 if(this.value>0)
 {
     $("#shaving"+id_number).html("");
     shaving.append("<option >Интихоб</option>");

     $.ajax({
         url: "{{route('shkafTable.post')}}",
         type:"POST",
         data:{
             "_token": "{{ csrf_token() }}",
             id:this.value

         },
         success:function(response){


             for (const [key, value] of Object.entries(response)) {
                 var newMsgs='<option  value="'+value.id+'">'+value.shkaf+'</option>';

                 shaving.append(newMsgs);

             }

         },
     });
 }else{
     $("#shaving"+id_number).html(" <option >Интихоб</option>");

 }
});
//Safe ajax end
///shaving ajax send
$(document).on('change','[id^=shaving]',function (){


var  id_number= $(this).attr("id").substr(-2);
id_number.substr(-2,1);
$("#"+$(this).attr('id')).removeClass("border-danger");
$('#'+id_number.substr(-2,1)+'Somon').addClass("d-none");
 var qator=$("#qator_id"+id_number);

 if(this.value>0)
 {
     var safe=$("#safe_id"+id_number+" option:selected").val();

     qator.html("");
     qator.append("<option >Интихоб</option>");

     $.ajax({
         url: "{{route('qatorTable.post')}}",
         type:"POST",
         data:{
             "_token": "{{ csrf_token() }}",
             id_shkaf:this.value,safe_id:safe,

         },
         //safe_id
         success:function(response){


             for (const [key, value] of Object.entries(response)) {
                 var newMsgs='<option  value="'+value.id+'">'+value.qator+'</option>';

                 qator.append(newMsgs);

             }

         },
     });
 }else{
     qator.html(" <option >Интихоб</option>");

 }

});
//end ajax send shaving
///qator_id ajax send
$(document).on('change','[id^=cells]',function (){
var  id_number= $(this).attr("id").substr(-2);
$('#'+id_number.substr(-2,1)+'Somon').addClass("d-none");
$("#"+$(this).attr('id')).removeClass("border-danger");

});
$(document).on('change','[id^=qator_id]',function (){
$("#"+$(this).attr('id')).removeClass("border-danger");
var  id_number= $(this).attr("id").substr(-2);
$('#'+id_number.substr(-2,1)+'Somon').addClass("d-none");
 var cell=$("#cells"+id_number);
 if(this.value>0)
 {
     //вактин$("#safe_id option:selected").val();

     var safe=$("#safe_id"+id_number+" option:selected").val();
     var shaving=$("#shaving"+id_number+" option:selected").val();

     cell.html("");
     cell.append("<option >Интихоб</option>");

     $.ajax({
         url: "{{route('cellsTable.post')}}",
         type:"POST",
         data:{
             "_token": "{{ csrf_token() }}",
             id_shkaf:shaving,qator_id:this.value,safe_id:safe,

         },
         //safe_id
         success:function(response){


             for (const [key, value] of Object.entries(response)) {
                 var newMsgs='<option  value="'+value.id+'">'+value.cell+'</option>';

                 cell.append(newMsgs);

             }

         },
     });
 }else{
     qator.html(" <option >Интихоб</option>");

 }

});
//end ajax send qator
//clear counts
$(document).on('change','[id^=edin_id]',function (){

$("#"+$(this).attr('id')).removeClass("border-danger");
var  id_number= $(this).attr("id").substr(-2);
$('#'+id_number.substr(-2,1)+'Somon').addClass("d-none");
$("#count"+id_number).val("");
$("#sum"+id_number).html("");

});
//clear end

 </script>
<script src="/js/Sprjs.js"></script>

