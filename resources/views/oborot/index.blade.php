@extends('layouts.app')

@section('content')
<form role="form was-validated"    action="{{ route('oborot_spr.store') }}" method="post">
    <div class="modal fade  bd-example-modal-lg " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('Добавление нового оборот') }}</h5>

                </div>

              
                    @csrf

                    <input type="hidden" name="kod_oper" value="{{$kodeOper}}">
                    <input type="hidden" name="kode_oper" value="{{$kodOper}}">
                    <div class="row mb-3 mt-3">
                         <div class="container">
                             <div class="alert alert-danger alert-dismissible fade  " id="alerts">
                              <center>   <strong >Введите правильную сумму   !!</strong> .</center>
{{--                                 <button type="button" class="btn-close" data-bs-dismiss="alert"></button>--}}
                             </div>
                         </div>
                        <div class="col-md-3 offset-1">

                            <input    readonly="readonly" id="date" type="date"  value="<?php echo date('Y-m-d'); ?>" class="form-control" name="date"  >
                        </div>
                        <div class="col-md-3 ">
                            <select name="bik"       class="form-control " required>
                    <option value="">БИК выберите</option>
                
                        @foreach($bik AS $biks)
                    <option value="{{$biks->id}}">{{$biks->BIK}} ({{$biks->full_name}})  </option>
                                @endforeach

                            </select>
                       
                        </div>
                        <div class="col-md-3 ">
                            <input type="text" placeholder="Номер документ"  name="n_doc" class="form-control" required  >
                        </div>
                    </div>
                    <input type="hidden"  value="0"  name="priznak"  >
                    <input type="hidden"  value="7"  name="account_id_in"  >
                    {{-- <div class="row  offset-1">

                        <div class="col-md-3  ">
                               
                            <select name="priznak" required id="priznak" class="form-control">
                                <option disabled selected value="">Выберите Признак</option>
                                <option value="1">Приход</option>
                                <option value="0">Расход</option>
                            </select>
                        </div>
                        <div class="col-md-3  ">

                            <select name="account_id_out" id="schet1"  required  class="form-control schet1">
                                <option disabled selected value="" >Выберите счетов</option>
                                @foreach($sprAccounts AS $accounts)


                                    <option value="{{$accounts->id}}">{{$accounts->account}} {{$accounts->name}} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3  ">
                            <div id="schet2">


                            <select name="" id="" class="form-control"  disabled="" >
                                <option disabled selected >Выберите счетов</option>

                            </select>
                            </div>
                        </div>

                    </div> --}}
                    <div class="row  offset-1 mt-2">
                        <div class="col-md-4  mt-2">
                            <div class="input-group">
                                <span class="input-group-text">Номинал</span>
                                <input   required   type="text" id="summash" class="form-control nomcou " aria-describedby="btnGroupAddon" name="nominal[]"  >

                            </div>



                                 </div>

                        <div class="col-md-4 mt-2 ">
                            <div class="input-group">
                                <span class="input-group-text">Сумма</span>
                                <input   required   type="text" id="summas" class="form-control count  " aria-describedby="btnGroupAddon" name="summa[]"  >

                            </div>

                            <div class="input-group-tex t" id="btnGroupAddon" disabled ></div>

                        </div>


                            <div class="col-md-4 mt-3">
                                <button type="button" onclick="add()" class="btn btn-primary" id="adds" disabled> <i class="align-middle" data-feather="plus"></i></button>
                                <button onclick="remove()" type="button"  class="btn btn-bitbucket active"><i class="align-middle" data-feather="trash-2"></i></button>

                            </div>
                        <input type="hidden" value="1" id="total_chq">
                    </div>
                    <div id="new_chq" >

                    </div>
                      {{-- <div class="row offset-1 mt-2" >
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="safe_check"  >
                            <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                          </div>
                      </div> --}}
                        <div class="row offset-1 mt-2 d-none"  id="d-none" >




                            <div class="col-md-2 ">
                                <label for="safe_id51">Хранилище</label>
                                <select name="safe_id"   id="safe_id51" class="form-control selects51 Somon">
                                    <option   selected value="">Выберите</option>
                                    @foreach($safes as $safe)
                                        <option value="{{$safe->id}}">{{$safe->safe}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">  <label for="shaving51">Шкаф	</label>
                                <select name="shkaf_id"   id="shaving51" class="form-control selects51 Somon">


                                </select>
                            </div>
                            <div class="col-md-2   ">
                                <label for="qator_id51">Ряд	</label>
                                <select name="qator_id"   id="qator_id51" class="form-control selects51 Somon">
                                    <option   selected value="">Выберите </option>

                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="cells51">Ячейка</label>
                                <select name="cell_id"   id="cells51" class="form-control selects51 Somon">


                                </select>

                        </div>
                        </div>
                    <div class="row  offset-3 mt-2 ">
                    <div class="col-md-3 mt-3">



                    </div>

                        <div class="col-md-5 mt-3">
                            <button type="button"   class="btn btn-light active" id="adds" disabled><div id="countsum"></div> </button>

                        </div>
                    </div>
                    <div class="row col-md-8   offset-1">

                        <div class=" ">
                            <span class="input-group-text col-md-4">{{ __('Комментраии') }}</span>
                            <div class="input-group">

                            <textarea id="comment" type="text" class="form-control   text  " name="comment" aria-describedby="btnGroupAddon"></textarea>
                            </div>
                        </div>
                    </div>
                    <br>



                    <div class="modal-body">

                    </div>
                    <div class="modal-footer ">
                        <div class="row mb-0 ">
                            <div class="col-md-8 justify-content-center">
                                <button type="submit" class="btn btn-facebook active addform" disabled>
                                    {{ __('Добавить') }}
                                </button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-light offset-11" data-dismiss="modal">Закрыт</button>

                    </div>


               
            </div>
        </div>
    </div>
</form>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
    <div class="row">
        <div class="col-lg-12 margin-tb ">
            <div class="pull-left">
                <h2>Оборот</h2>
            </div>
            <div class="pull-right offset-2">
                <button type="button" class="btn btn-success  " data-toggle="modal" data-target="#exampleModalCenter">
                    <i class="align-middle" data-feather="plus"></i> Создание нового оборот
                </button>
            </div>
        </div>
    </div>


    <div class="col-12 col-lg-8 d-flex  justify-content-center offset-2">

        <div class="card ">
            <div class="card-body">
    <table class="table ">
        <tr>
            <th>#</th>
            <th>БИК</th>
            <th>Номер документы</th>
            <th>Номер счета </th>
            <th>Номинал</th>
            <th>Сумма</th>
            <th>Код операции</th>
            <th>Коментарии</th>
            <th> </th>

        </tr>

                @foreach($obor AS $oborot)
            <tr>
                   <td></td>
                   <td>
                       @foreach($bik AS $biks)
                           @if($oborot->bik==$biks->id)
                               {{$biks->bik}}   <br> {{$biks->full_name}}
                           @endif
                       @endforeach


                   </td>
                   <td>

                       {{$oborot->n_doc}}
                       {{-- @foreach($sprAccounts AS $sprAccount)
                           @if($oborot->account_id_out==$sprAccount->id)
                               {{$sprAccount->account}}   <br> {{$sprAccount->name}}
                           @endif
                       @endforeach --}}

                   </td>
                   <td>
                       @foreach($sprAccounts AS $sprAccount)
                           @if($oborot->account_id_in==$sprAccount->id)
                               {{$sprAccount->account}}   <br> {{$sprAccount->name}}
                           @endif
                       @endforeach
                   </td>
                   <td>{{$oborot->nominal}}</td>
                   <td>{{$oborot->summa}}</td>
                   <td>

                       @if($oborot->priznak===1)
                       {{"Расход"}} 
                       @endif
                           @if($oborot->priznak==0)
                            {{"Приход"}}
                           @endif
                    </td>
                   <td>{{$oborot->comment}}</td>


             <td>


                 {!! Form::open(['method' => 'DELETE','route' => ['oborot_spr.destroy', $oborot->id],'style'=>'display:inline']) !!}
                 {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
                 {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

    </table>
            </div>
        </div>
    </div>
@endsection

<script src='{{asset('js/ajax.min.js')}}'></script>
<script src="{{asset('js/OborotJs.js')}}"></script>
<script>
    
    $(document).on('click','#safe_check',function(){

    if($(this).prop('checked'))
    {
      $('#d-none').removeClass('d-none');
        return;
    }else{
        $('#d-none').addClass('d-none');
        $('#safe_id51').val('');
        $('#shaving51').val('');
        $('#qator_id51').val('');
        $('#cells51').val('');
    }
    });
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
</script>
