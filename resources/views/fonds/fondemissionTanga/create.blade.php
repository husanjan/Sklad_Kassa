@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Добавление эмиссионный фонд танга') }}</div>

                    <div class="card-body">


                        <div class="row">
                            <div class="col-sm-10">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-content custom-form-container">
{{--                                        autocomplete="off"--}}
                                        <form role="form"   autocomplete="off" action="{{ route('fondEmissionsTanga.store') }}"  method="post">
                                            @csrf
                                        <div class="row mb-3">
                                           <label for="account" class="col-md-4 col-form-label text-md-end">{{ __('Дата') }}</label>
                                                <div class="col-md-3">
                                                    <input id="account" type="date" class="form-control" name="date" required  value="{{date('Y-m-d')}}"  autofocus>
                                                </div>

                                                <input type="hidden"  name="kode_oper_oborRashod" value="{{$kodeOper}}">
                                                
                                        </div>

                                            <div class="row mb-12">
                                              <label for="nomil" class="col-md-4  col-form-label text-md-end">{{ __('Номер Документ') }}</label>
                                                <div class="col-md-8">
                                                    <input   type="text" class="form-control" name="n_doc" placeholder=" ">
                                                </div>
                                                <label for="nomil" class="col-md-4  col-form-label text-md-end">{{ __('Номинал') }}</label>
                                                <div class="col-md-8 mt-2">
                                                    {{-- <input id="nomil" type="text" class="form-control" name="naminal" placeholder=""> --}}
                                                    <select id="nomil" class="form-select" name="naminal" autofocus >
                                                        <option value="">Интихоб</option>
                                                        <option value="0.01" >1  дирам</option>
                                                        <option value="0.05" >5  дирам</option>
                                                        <option value="0.10" >10  дирам</option>
                                                    
                                                        <option value="0.20" >20  дирам</option>
                                                        <option value="0.25" >25  дирам</option>
                                                        <option value="0.50" >50  дирам</option>
                                                        <option value="1" >1 сомони  </option>
                                                        <option value="3" >3 сомони  </option>
                                                        <option value="5" >5 сомони  </option>


                                                    </select>
                                                </div>
                                            </div>         <br>
                                            <div class="row mb-3">
                                                <label for="edin_id" class="col-md-4 col-form-label text-md-end">{{ __('Един') }}</label>
                                                <div class="col-md-3">

                                                    <select id="edin_id" class="form-select" name="ed_id" autofocus >
                                                        <option value="">Интихоб</option>
                                                        @foreach($sprEds as $sprEd)

                                                            <option value="{{$sprEd->kol}}" >{{$sprEd->name}}


                                                            </option>
                                                        @endforeach


                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-12">
                                                <label for="count" class="col-md-4 col-form-label text-md-end">{{ __('Количество') }}</label>
                                                <div class="col-md-8">
                                                    <input id="count" type="number" class="form-control" name="kol" required>
                                                     <div id="sum">

                                                     </div>
                                                </div>

                                            </div>         <br>

 
                                            <div class="row mb-3">
                                                <label for="safe_id" class="col-md-4 col-form-label text-md-end">{{ __('Хранилище') }}</label>
                                                <div class="col-md-3">
                                                    <select id="safe_id" class="form-select" name="safe_id" required>
                                                        <option value="">Интихоб</option>
                                                        @foreach($safes as $safe)
                                                            <option value="{{$safe->id}}">{{$safe->safe}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="shkaf_id" class="col-md-4 col-form-label text-md-end">{{ __('Шкаф/Стляж') }}</label>
                                                <div class="col-md-3">
                                                    <select id="shaving" class="form-select" name="shkaf_id" required>
                                                        <option value="">Интихоб</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="qator_id" class="col-md-4 col-form-label text-md-end">{{ __('Ряд') }}</label>
                                                <div class="col-md-3">
                                                    <select id="qator_id" class="form-select" name="qator_id" required>
                                                        <option value="">Интихоб</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="cell_id" class="col-md-4 col-form-label text-md-end">{{ __('Ячейка') }}</label>
                                                <div class="col-md-3">
                                                    <select id="cells" class="form-select" name="cell_id" required>
                                                        <option value="">Интихоб</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-12">
                                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Комментраии ') }}</label>
                                                <div class="col-md-8">
                                                    <textarea id="comment" type="text" class="form-control text" name="comment"></textarea>
                                                </div>
                                            </div>
                                            <br>

                                            <div class="row mb-0">
                                                <div class="col-md-8 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Добавить') }}
                                                    </button>
                                                </div>
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
    </div>

@endsection

<script src="{{asset('js/scripts.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/ajax.min.js')}}"></script>

<script type="text/javascript">

    $(document).ready(function(){
        $('form').submit(function (){
            $(this).find("button[type='submit']").prop('disabled',true);
        });
        $("#edin_id").change(function()
        {
           $("#count").val("");
        });

      $("#count,#nomil").on("keyup change", function(){
        $("#sum").html("");
            var sum=100;
          var   nominal= $("#nomil").val();
          var   edins= $("#edin_id").val();

         $("#sum").html('<div class="alert alert-primary  mt-2">Сумма '+edins.split('|')[0]*nominal*this.value+' Сомони</div>');
      });
        var shaving=$("#shaving");
        //аджакс Запрос таблица Шкаф
        $('#safe_id').change(function(){

            if(this.value>0)
            {
                $("#shaving").html("");
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
                $("#shaving").html(" <option >Интихоб</option>");

            }
        });

        ///


        $('#shaving').change(function(){
            var qator=$("#qator_id");

            if(this.value>0)
            {
                $("#safe_id option:selected").val();

                qator.html("");
                qator.append("<option >Интихоб</option>");

                $.ajax({
                    url: "{{route('qatorTable.post')}}",
                    type:"POST",
                    data:{
                        "_token": "{{ csrf_token() }}",
                        id_shkaf:this.value,safe_id:$("#safe_id option:selected").val(),

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

        $('#qator_id').change(function(){
            var cell=$("#cells");
            if(this.value>0)
            {
                $("#safe_id option:selected").val();

                cell.html("");
                cell.append("<option >Интихоб</option>");

                $.ajax({
                    url: "{{route('cellsTable.post')}}",
                    type:"POST",
                    data:{
                        "_token": "{{ csrf_token() }}",
                        id_shkaf:$("#shaving option:selected").val(),qator_id:this.value,safe_id:$("#safe_id option:selected").val(),

                    },
                    //safe_id
                    success:function(response){

                        //console.log(response);
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
    });




</script>
<script src="/js/Sprjs.js"></script>
