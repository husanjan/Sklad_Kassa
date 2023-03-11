@extends('layouts.app')

@section('content')

<div class="container-fluid">
                    <div class="row">

                        <div class="col-lg-2 margin-tb ml-2">

                            <div class="pull-left">
                                <h2>Фонд эмиссионный танга</h2>
                            </div>

                       
                         
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a class="btn btn-primary" href="{{ route('fondEmissionsTanga.create') }}"><i class="align-middle" data-feather="edit-3"></i>Приход  счета</a>
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModalCenter"  id="priznak" value="1">Расход</button>
                    
                              </div>
 
                        </div>
       
                    </div>

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
                    @php($count=0)

{{--                    <--Таблица Эмиссонный --}}
  {{--  Расход Модал--}}
  <form method="PATCH" action="{{route('fondEmissionsTanga.edit',1)}}">
    @csrf
    <input     value="1"   name="priznak" type="hidden">
    <input            name="kode_oper" type="hidden"   value="{{$kodeOper}}">
    <input            name="farsuda" type="hidden"   value="1">
    <input type="hidden" name="src" value="4">
  <!-- Modal -->
<div class="modal fade" id="exampleModalCenter"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog  modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-3  ">
                    <label for="date">Дата	</label>
                    <input  type="datetime-local"readonly="readonly"     style="width: 11rem;"     value="<?php echo date('Y-m-d H:i:s'); ?>"     name="date" class="form-control"    >

                    <input     value="1"    name="priznak" type="hidden"    >
                    <input            name="kode_operRashod" type="hidden"   value="{{$kodeOper}}">
                    <input            name="KorshoyamRashod" type="hidden"   value="1" >

                </div>
             
                    <input type="hidden" name="kode_oper_oborRashod" value="{{$kodeOperObort }}">
           
              
                <div class="col-md-2">
                    <label for="count01">Номер Документ	</label>
                    <input        type="text"  name="ndoc" class="form-control "  autocomplete="off" required>
                </div>
       
 
         {{-- //Table ostatki  --}}
         <table class="table mt-2">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Хранилище</th>
                <th scope="col">Шкаф/Стилаж</th>
                <th scope="col">Катор</th>
                <th scope="col">Ячейка</th>
                <th scope="col">Единиц</th>
                <th scope="col">Наминал</th>
                <th scope="col">Сумма</th>
                <th scope="col">Сумма расход</th>
              </tr>
            </thead>
            <tbody>
               
                <?php $pos=1 ?>
                @foreach( $arrayResult AS  $ostatkiResults)
                @if($ostatkiResults->summa>0)
                <input type="hidden" name="id[]" value="{{$ostatkiResults->id}}">
                  <tr class="border-bottom" id="t{{$ostatkiResults->id}}">
                 
           <td> <?php print $pos++ ?></td>
                  
                    @foreach ($safes as $safe)
                                 
                    @if($ostatkiResults->safe_id===$safe->id) <td> <input type="hidden" name="safe{{$ostatkiResults->id}}" value="{{$safe->id}}">{{$safe->safe}}</td>  @endif
                    @endforeach
                    {{-- <td>{{ $ostatkiResults->safe_id }}</td> --}}
            
                    @foreach ( $shkafs as $shkaf )
           
                    @if($ostatkiResults->shkaf_id===$shkaf->id ) <td><input type="hidden" name="shkaf{{$ostatkiResults->id}}" value="{{$shkaf->id}}">{{ $shkaf->shkaf }}</td>  @endif
                    @endforeach
                    @foreach ( $sprQators as $sprQator )
           
                    @if($ostatkiResults->qator_id===$sprQator->id ) <td><input type="hidden" name="sprQator{{$ostatkiResults->id}}" value="{{$sprQator->id}}">{{ $sprQator->qator }}</td>  @endif
                    @endforeach
                    @foreach ( $sprCells as $sprCell )
           
                    @if($ostatkiResults->cell_id===$sprCell->id ) <td><input type="hidden" name="sprCell{{$ostatkiResults->id}}" value="{{$sprCell->id}}">{{ $sprCell->cell }}</td>  @endif
                    @endforeach
                    @foreach ($sprEds as $sprEd )
           
                    @if($ostatkiResults->ed_id===$sprEd->id ) <td><input type="hidden" name="sprEd{{$ostatkiResults->id}}" value="{{$sprEd->id}}" >{{ $sprEd->name }}</td>  @endif
                    @endforeach
              
                    <td> {{ $ostatkiResults->naminal=='razne'?'Разные':$ostatkiResults->naminal}} <input type="hidden"  id="naminal{{$ostatkiResults->id}}"  name="naminal{{$ostatkiResults->id}}" value="{{$ostatkiResults->naminal}}"></td>
                    <td ><label for="" id="sumr{{$ostatkiResults->id}}" class="{{$ostatkiResults->id}}"><input type="hidden" name="ostatkiResults{{$ostatkiResults->id}}" value="{{ $ostatkiResults->summa}}"> {{ $ostatkiResults->summa}}</label> сомони</td>
                    <td><input type="text" class="form-control col-md-4 summaR"  name="Summarashod{{$ostatkiResults->id}}[]" id="{{$ostatkiResults->id}}"></td>
                    
                  </tr>@endif
                 
                @endforeach
        </tbody>
         </table>

            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыт</button>
          <button type="submit" class="btn btn-primary" disabled>Save changes</button>
        </div>
      </div>
    </div>
  </div>
   </form>
           
               <div class="card col-md-8 ml-2">
                <table class="table mt-2">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Хранилище</th>
                      <th scope="col">Шкаф/Стилаж</th>
                      <th scope="col">Катор</th>
                      <th scope="col">Ячейка</th>
                      <th scope="col">Единиц</th>
                      <th scope="col">Наминал</th>
                      <th scope="col">Сумма</th>
          
                    </tr>
                  </thead>
                  <tbody>
                     
                      <?php $pos=1 ?>
                      @foreach( $arrayResult AS  $ostatkiResults)
                      @if($ostatkiResults->summa>0)
                      <input type="hidden" name="id[]" value="{{$ostatkiResults->id}}">
                        <tr class="border-bottom" id="t{{$ostatkiResults->id}}">
                       
                 <td> <?php print $pos++ ?></td>
                        
                          @foreach ($safes as $safe)
                                       
                          @if($ostatkiResults->safe_id===$safe->id) <td> <input type="hidden" name="safe{{$ostatkiResults->id}}" value="{{$safe->id}}">{{$safe->safe}}</td>  @endif
                          @endforeach
                          {{-- <td>{{ $ostatkiResults->safe_id }}</td> --}}
                  
                          @foreach ( $shkafs as $shkaf )
                 
                          @if($ostatkiResults->shkaf_id===$shkaf->id ) <td><input type="hidden" name="shkaf{{$ostatkiResults->id}}" value="{{$shkaf->id}}">{{ $shkaf->shkaf }}</td>  @endif
                          @endforeach
                          @foreach ( $sprQators as $sprQator )
                 
                          @if($ostatkiResults->qator_id===$sprQator->id ) <td><input type="hidden" name="sprQator{{$ostatkiResults->id}}" value="{{$sprQator->id}}">{{ $sprQator->qator }}</td>  @endif
                          @endforeach
                          @foreach ( $sprCells as $sprCell )
                 
                          @if($ostatkiResults->cell_id===$sprCell->id ) <td><input type="hidden" name="sprCell{{$ostatkiResults->id}}" value="{{$sprCell->id}}">{{ $sprCell->cell }}</td>  @endif
                          @endforeach
                          @foreach ($sprEds as $sprEd )
                 
                          @if($ostatkiResults->ed_id===$sprEd->id ) <td><input type="hidden" name="sprEd{{$ostatkiResults->id}}" value="{{$sprEd->id}}" >{{ $sprEd->name }}</td>  @endif
                          @endforeach
                    
                          <td> {{ $ostatkiResults->naminal=='razne'?'Разные':$ostatkiResults->naminal}} <input type="hidden"  id="naminal{{$ostatkiResults->id}}"  name="naminal{{$ostatkiResults->id}}" value="{{$ostatkiResults->naminal}}"></td>
                          <td ><label for="" id="sumr{{$ostatkiResults->id}}" class="{{$ostatkiResults->id}}"><input type="hidden" name="ostatkiResults{{$ostatkiResults->id}}" value="{{ $ostatkiResults->summa}}"> {{ $ostatkiResults->summa}}</label> сомони</td>
                        
                          
                        </tr>@endif
                       
                      @endforeach
              </tbody>
               </table>  </div>   
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

{{-- end this sccript   count all Sum   --}}
 <script>
     //Safe ajax
    //    $(document).on('change','#accounted',function(){
               
    //           $('#accounts').html('<input type="hidden" name="accounts" value="'+$("#accounted option:selected").text()+'">')
               
    //    });
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
$("#add,#add3,#add5,#addt,#addb,#addc,#addd,#adde,#addf,#addg,#addh,#addj,#addk").click(function(){




var id_btn=$(this).val();

    
//  console.log('.selects'+id_btn);
 var idv=id_btn.substr(-2,1);

var  new_btn=parseInt($('#total_chq'+id_btn).val())+1;
var values=$("#total_chq"+id_btn).val();
var counts=$("#count"+idv+values).val();
// console.log("#count"+idv+values);


console.log(selectValidation('.selects'+idv));

if(selectValidation('.selects'+idv) && counts>0 && values<=9)
{
var   nominal= $('#'+'nominal'+id_number).val();
var   nominalsss= $('input[id^=count]').val();
var   edins= $("#edin_id"+id_number).val();


var val_nominal=$("#nominal"+id_btn).val();
var val_edin=$("#edin_id"+idv+values).val();
var val_count=$("#count"+idv+values).val();

var $safe_id = $("#safe_id"+id_btn+" > option").clone();
var $edin_id = $("#edin_id"+id_btn+" > option").clone();


var new_input='<div class="row  mt-2" id="new'+idv+new_btn+'"><div>';

var edi= '<div class="col-md-2   ">  <div>';
var select_edin='<select id="edin_id'+idv+new_btn+'"  class="form-select Somon selects edin_id'+id_btn+'  edin_id" name="ed_id'+idv+'[]" > </select>';
var select_edin= $(select_edin).append($edin_id);
var edinLabel='<label for="edin_id'+idv+new_btn+'">Единиц	</label>';
var edins=$(edi).append(edinLabel,select_edin);
var counts= '  <div class="col-md-1  "><label for="count'+idv+new_btn+'">Кол-во	</label><input      style="width: 05rem;" id="count'+idv+new_btn+'"   type="text"  name="count'+idv+'[]" class="form-control Somon  count"></div>';
  // ..Хранилище тег
var saf='<div class="col-md-2 "></div>';
var safeLabel='<label for="safe_id0'+new_btn+'">Хранилище</label>';
var safe_Select='<select name="safe_id'+idv+'[]"   id="safe_id'+idv+new_btn+'" style="width: 08rem;" class="form-control  Somon selects'+id_btn+'"></select>   <input     id="nominal'+val_nominal+'"  value="1" disabled  type="hidden"  name="nominal"     >';
safe_Select=$(safe_Select).append($safe_id);
var safes=$(saf).append(safeLabel,safe_Select);
// ..Хранилище тег end
var shkaf='<div class="col-md-2">  <label for="shaving0">Шкаф	</label><select style="width: 08rem;" name="shaving'+idv+'[]"   id="shaving'+idv+new_btn+'" class="form-control Somon selects'+id_btn+'"><select></div>';
var ryad='<div class="col-md-2   "><label for="qator_id'+idv+new_btn+'">Ряд	</label><select name="qator_id'+idv+'[]" style="width: 08rem;"    id="qator_id'+idv+new_btn+'" class="form-control Somon selects'+id_btn+'"></select></div>';
var cell='<div class="col-md-1   "> <label for="cells0'+new_btn+'">Ячейка</label> <select name="cells'+idv+'[]"   id="cells'+idv+new_btn+'" class="form-control  Somon selects'+id_btn+'"></select></div>    <input     id="nominal'+idv+new_btn+'"  value="1" disabled  type="hidden"  name="nominal"     >';



var new_ip=$(new_input).append(edins,counts,safes,shkaf,ryad,cell);

$('#new_chq'+id_btn).append(new_ip);



$('#total_chq'+id_btn).val(new_btn);
$('#edin_id'+idv+id_btn).append($safe_id);

return;
}
$('.toast').toast('show');
});



 </script>
 <script src="js/FondRashod.js"></script>
  <script src="{{asset('js/AddRemoveButton.js')}}"></script>
<script src="/js/Sprjs.js"></script>