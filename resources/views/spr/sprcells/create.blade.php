@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Создание нового ячейка') }}</div>

                    <div class="card-body">


                        <div class="row">
                            <div class="col-sm-10">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-content custom-form-container">
                                        <form role="form" action="{{ route('sprcell.store') }}" method="post">
                                            @csrf
                                            <div class="row mb-3">
                                                <label for="safe_id" class="col-md-4 col-form-label text-md-end">{{ __('Номер хранилище') }}</label>
                                                <div class="col-md-3">
                                                    <select id="safe_id" class="form-select" name="safe_id" autofocus>
                                                        <option value="">Интихоб</option>
                                                        @foreach($safes as $safe)
                                                            <option value="{{ $safe->id }}">{{ $safe->safe }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="shkaf_id" class="col-md-4 col-form-label text-md-end">{{ __('Номер шкафа/стилажа') }}</label>
                                                <div class="col-md-3">
                                                    <select   class="form-select" name="shkaf_id" id="shaving">
                                                        <option value="">Интихоб</option>


                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="qator_id" class="col-md-4 col-form-label text-md-end">{{ __('Номер ряда') }}</label>
                                                <div class="col-md-3">
                                                    <select id="qator_id" class="form-select" name="qator_id">
                                                        <option value="" selected>Интихоб</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="cells" class="col-md-4 col-form-label text-md-end">{{ __('Номер ячейка') }}</label>
                                                <div class="col-md-3">
                                                    <input id="cells" type="text" class="form-control" name="cell" placeholder="Номер ячейка">
                                                </div>
                                            </div>

                                            <div class="row mb-12">
                                                <label for="comment" class="col-md-4 col-form-label text-md-end">{{ __('Комментраии') }}</label>
                                                <div class="col-md-8">
                                                    <textarea id="comment"   class="form-control text" name="comment"></textarea>
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

<script src="{{asset('js/ajax.min.js')}}"></script>
  <script type="text/javascript">

      $(document).ready(function(){
           var shaving=  $("#shaving");
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
                   console.log(response);

            for (const [key, value] of Object.entries(response )) {
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


        });
    </script>

