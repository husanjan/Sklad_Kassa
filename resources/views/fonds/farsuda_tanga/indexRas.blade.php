 {{--  Расход Модал--}}
 <form method="POST" action="{{route('farsuda_tanga.store')}}">
    @csrf
    <input     value="1"   name="priznak" type="hidden">
    <input     value="farsuda"   name="acccounti" type="hidden">
    <input            name="kode_oper" type="hidden"   value="{{$kodeOper}}">
    <input            name="farsuda" type="hidden"   value="1" >
    <input type="hidden" name="src" value="4">
 
    <div class="modal-dialog  modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Фарсуда/Расход</h5>
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
                    <input            name="KorshoyamRashod" type="hidden"   value="3" >
                
                </div>
             
                    <input type="hidden" name="kode_oper_oborRashod" value="{{$kodeOperObort }}">
           
              
                <div class="col-md-2">
                    <label for="count01">Номер Документ	</label>
                    <input        type="text"  name="ndoc" class="form-control "  autocomplete="off" required>
                </div>
                <label for="" class="offset-md-9 mt-4">  <span class="badge badge-light text-black "><h6><b>Общие сумма : </b>{{$allsumfarsudaTanga}}</h6></span> </label>

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
               
                @php
               $i=1;//Initialize variable
              @endphp
                @foreach($farsudaTanga AS  $ostatkiResults)
                @if($ostatkiResults->summa>0)
                <input type="hidden" name="id[]" value="{{$ostatkiResults->id}}">
                  <tr class="border-bottom" id="t{{$ostatkiResults->id}}">
                    <td> {{$i}} </td>
                   
                    <?php  $i++ ?>
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
                    <td > <input type="hidden" id="sumr{{$ostatkiResults->id}}" class="{{$ostatkiResults->id}}" name="ostatkiResults{{$ostatkiResults->id}}" value="{{ $ostatkiResults->summa}}"> {{ $ostatkiResults->summa}}  сомони</td>
                    <td><input type="text" class="form-control col-md-4 summaRFarT"  name="Summarashod{{$ostatkiResults->id}}[]" id="{{$ostatkiResults->id}}"></td>
                    
                  </tr>
                 @endif
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
 
   </form>

   <script>
    $(document).ready(function(){
   
    
   $(".summaRFarT").keyup(function(){
    
   // console.log();
      //console.log(parseFloat($(this).val())/1000/parseFloat($('#naminal'+$(this).attr('id')).val())%1==0);
   if(parseFloat($(this).val())/1000/parseFloat($('#naminal'+$(this).attr('id')).val())%1==0)
   {
   
   
   function selectValidation(id_select) {
    var selectIsValid = null;
    var incr=0;
    var decriment=0;
    
   $('.summaRFarT').each(function() {
   
       var values= $('#sumr'+$(this).attr('id')).val();
       if(parseFloat($(this).val())>0 && parseFloat($(this).val())/1000/parseFloat($('#naminal'+$(this).attr('id')).val())%1==0)
       {
       
   
            incr++;
         
           if(values>=parseFloat($(this).val())&& parseFloat($(this).val())>0)
           {
               decriment++;
               // console.log(values);
               if(incr==decriment)
       {
                selectIsValid=true;
                $(':input[type="submit"]').prop('disabled',true);
                 return;
         }
           }
   
              
    
           }
   
           });
   
   
   return     selectIsValid;
   }
   
   
   let id=$(this).attr("id");
   
       if(selectValidation())
       {
           $(':input[type="submit"]').prop('disabled', false);
       }else{
           $(':input[type="submit"]').prop('disabled', true);
          return;
       }
   
   
   if($('#sumr'+id).val()>=parseFloat($(this).val()) && parseFloat($(this).val())>0)
   {
         $('#t'+id).removeClass('border-danger');
        // $('#t'+id).addClass('border-success');
         return;
   
   }else{
   //  $('#t'+id).removeClass('border-success');
         $('#t'+id).addClass('border-danger');  
         $(':input[type="submit"]').prop('disabled', true);
         return;
   }
   //     if(selectValidation()==false){
   //     $('#t'+id).removeClass('border-danger');  
   //     $('#t'+id).removeClass('border-success');
   //             return 
   //    }
   }else{
    
   $(':input[type="submit"]').prop('disabled', true);
   }
   //end validate checked nomnal summa rashod summa
   });
   
   });
   </script>