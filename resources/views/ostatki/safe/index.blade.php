@extends('layouts.app')

@section('content')
 
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Главная</a></li>
      <li class="breadcrumb-item " aria-current="page">Остатки</li>
      <li class="breadcrumb-item active"><a href="#">Хранилище</a></li>
 
    </ol>
  </nav>
   <div class="container">
    <div class="row    mt-2">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                @foreach ($SprSafes as $SprSafe)
                    
            
    <button class="nav-link  {{ $SprSafe->safe==1? 'active':''}}" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-{{$SprSafe->id}}" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
    Хранилище  {{$SprSafe->safe}}</button>
             
            @endforeach
  </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            @foreach ( $SprSafes as $SprSafe)
         
            <div class="tab-pane fade show {{ $SprSafe->safe==1? 'active':''}}"  id="nav-{{$SprSafe->id}}" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row  mt-2" id="new{{$SprSafe->id}}">
                  <div class="col-md-1">  <label >Шкаф	</label>
                        <select  id="{{$SprSafe->id}}"  data-shaving="shaving{{$SprSafe->id}}" class="form-control shaving{{$SprSafe->id}}">
                            <option selected value="">Выберите</option>
                                @foreach ($shkafs as $shkaf)
                                @if($shkaf->safe_id==$SprSafe->id)
                                <option  value="{{$shkaf->id}}">{{$shkaf->shkaf}}</option>
                                @endif
                              
                                @endforeach
                          
                           
                           
                
                        </select>
                    </div>
                    <div class="col-md-1   ">
                        <label for="">Ряд	</label>
                        <select   id="{{$SprSafe->id}}" data-qator="qator{{$SprSafe->id}}" class="form-control  qator{{$SprSafe->id}}">
                            <option selected value="">Выберите </option>
                            {{-- @foreach ($sprQators as $sprQator)
                            @if($sprQator->safe_id==$SprSafe->id)
                            <option  value="{{$sprQator->id}}">{{$sprQator->qator}}</option>
                            @endif
                          
                            @endforeach --}}
                      
                
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="cellsq">Ячейка</label>
                        <select name="cellsq[]" id="{{$SprSafe->id}}"  data-cells="cells{{$SprSafe->id}}" class="form-control   cells{{$SprSafe->id}}">
                            <option selected value="">Выберите </option>
                            {{-- @foreach ($sprCells as $sprCell)
                            @if($sprCell->safe_id==$SprSafe->id)
                            <option  value="{{$sprCell->id}}">{{$sprCell->cell}}</option>
                            @endif
                            @endforeach --}}
                
                        </select>
                    </div>
                    <div class="col-md-2 offset-5 mt-5">
                      <label for="cellsq">Общие сумма:</label>
                     
                          <label for="" id="AllSumma{{$SprSafe->id}}">0</label>
  
                       
                  </div>
                    
                </div>
                <div class="card mt-1" style="width: auto;">
                    <div class="card-body"  >

                      <table class="table" id="table{{$SprSafe->id}}">
                      
                           {{-- {{$AllOstatks->summa}} --}}
                         
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Шкаф</th>
                                <th scope="col">Ряд</th>
                                <th scope="col">Ячейка</th>
                                <th scope="col">Купюра</th>
                                <th scope="col">Номинал</th>
                                <th scope="col">Сумма</th>
                              </tr>
                            </thead>
                            <tbody>
                             <?php 
                              $count =1; //Initialize variable
                              ?>
                              @foreach ($AllOstatki as $AllOstatks)
                      
                                @if($AllOstatks->safe_id==$SprSafe->id && $AllOstatks->summa>0)
                               
                                 <tr>
                                  <td> {{$count++}}</td>
                                      {{--     shkaf   --}}
                                  @foreach ($shkafs as $shkaf)
                                  @if($shkaf->id==$AllOstatks->shkaf_id)
                                 <td>{{ $shkaf->shkaf }}</td>
                                  @endif
                                  @endforeach
                                              {{--   end shkaf   --}}
                                {{--   qator   --}}
                          @foreach ($sprQators as $sprQator)
                                  @if($sprQator->id==$AllOstatks->qator_id)
                                 <td>{{ $sprQator->qator }}</td>
                                  @endif
                         @endforeach
                                {{-- end qator   --}}
                         {{-- cell  --}}
                         @foreach ($sprCells as $sprCell)
                         @if($sprCell->id==$AllOstatks->cell_id)
                                      <td>{{ $sprCell->cell}}</td>
                         @endif
                         @endforeach       
                             {{--endd  cell  --}}       
                                  @if($AllOstatks->typeFond==1)
                                    <td>Монета</td>
                                  @endif
                               @if($AllOstatks->typeFond==0)
                                   <td>Бумага</td> 
                               @endif
                                  
                               <td>{{ $AllOstatks->naminal}}</td>
                               <td   class="{{$SprSafe->id}}" id="summa{{$SprSafe->id}}">{{ $AllOstatks->summa}}</td>
                                </tr>
                                @endif
                         @endforeach
                            </tbody>
                       
                     
                           </table>
                    </div>
                  </div>
            
            </div>
         
        
            @endforeach
 
          </div>
      
    </div>
   </div>
@endsection
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/ajax.min.js')}}"></script>
<script>
 $(document).ready(function() {

 //Allsummma 
  var sum=0;
  const id_array = [];
  $('[id^=summa').each(function() {
    sum+=parseFloat($(this).text());
              // console.log($(this).text());
            //  var  sum= {
            //     id:parseFloat($(this).text()),
            //      summa:parseFloat($(this).attr('class'),
            //   };
              const obj = {id: parseFloat($(this).attr('class')), amount:parseFloat($(this).text())};
               id_array.push(obj);  
    });
    // console.log(id_array);
   
var result = Object.values(id_array.reduce((hash, item) => {
    if (!hash[item.id]) {
        hash[item.id] = {id:item.id,amount: 0 };
    }
    hash[item.id].amount += item.amount;
    return hash;
}, {}));
result.forEach(function(message){
   // console.log(message.id)
    $('#AllSumma'+message.id).html(message.amount);
});



// end  //Allsummma 














//end ajax send shaving
// console.log(result);
    $('select').on('change', function() {
   
      var Table1=null;
    //  alert($('.shaving'+ $(this).attr('id')).val());
    //  alert($('.qator'+ $(this).attr('id')).val());
    //  alert($('.cells'+ $(this).attr('id')).val());   
    //   alert($('.cells'+ $(this).attr('id')).val());

    
      Table1=$("#table"+$(this).attr('id'));
      var idrr=$(this).attr('id');
  
      // alert($(this).attr('id'));
      $("#table"+$(this).attr('id')).html("");
      var shaving=$('.shaving'+ $(this).attr('id')).val();
       var qator= $('.qator'+ $(this).attr('id')).val();
       var  cell=$('.cells'+ $(this).attr('id')).val();
        var  safe=$(this).attr('id');
        // alert(safe);
        // alert(shaving);
        // alert(qator);
        // alert(cell);
        if(shaving<1)
        {
         
          qator=undefined;
          shaving=undefined;
          cell=undefined;
        }
        if(qator<1)
        {
         
          qator=undefined;
          cell=undefined;
        }
        if(cell<1)
        {
         
         
          cell=undefined;
        }
       
       $.ajax({
          
         url: "{{route('ostatkisafe.store')}}",
         type:"POST",
         data:{
             "_token":"{{csrf_token()}}",
             id_safe:safe,shaving:shaving,qator:qator,cell:cell,
        
         },
        
         success:function(response){

            // alert(response);  
              //  .append(response);  
                  // console.log(response);
                //  $('#table'+$(this).attr('id')).html(table);
                $("#table"+idrr).html(response);
                var summa=0;
                $('[id^=summa'+idrr).each(function() {
                  summa+=parseFloat($(this).text());
                       
                  });
                 $('#AllSumma'+idrr).html(summa);

         },
        
     });
    
    //   Table1.append('</table>');
     //  [id^=summa'+idrr[id^=summa'+idrr]
        
    
   });

   
///shaving ajax send
$(document).on('change','[data-shaving^="shaving"]',function (){

// alert($(this).val());
var id_number=$(this).val();



var safe=$(this).attr('id');

var qator=$(".qator"+safe);
qator.html("");
 
if(this.value>0)
{



qator.append('<option selected="" value="">Выберите</option>');

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
        console.log(qator);
     }

 },
});
}else{

$(".cells"+safe).html('<option selected="" value="">Выберите</option>');
$(".qator"+safe).html('<option selected="" value="">Выберите</option>');

}


});


$(document).on('change','[data-qator^="qator"]',function (){


// var id_number=$(this).val();


 
var safe=$(this).attr('id');

var cell=$(".cells"+safe);
cell.html("");


if(this.value>0)
{
//вактин$("#safe_id option:selected").val();


var shaving=$(".shaving"+safe+" option:selected").val();


cell.append('<option selected="" value="">Выберите</option>');

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
qator.html('<option selected="" value="">Выберите</option>');
$(".cells"+safe).html('<option selected="" value="">Выберите</option>');
}


}); 
 
});
 
 
 
</script>