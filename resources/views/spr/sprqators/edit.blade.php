@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Изменение ряда') }}</div>

                    <div class="card-body">


                        <div class="row">
                            <div class="col-sm-10">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-content custom-form-container">
                                        <form role="form" action="{{ route('sprqators.update', $qators->id) }}" method="POST">
                                            @csrf
                                            <input name="_method" type="hidden" value="PATCH">
                                            <div class="row mb-3">
                                                <label for="safe_id" class="col-md-4 col-form-label text-md-end">{{ __('Номер хранилище') }}</label>
                                                <div class="col-md-3">
                                                    <select id="safe_id" class="form-select" name="safe_id" autofocus>

                                                        @foreach($safes as $safe)
                                                            <option value="{{ $safe->id }}" @if($qators->safe_id == $safe->id) selected @endif >{{ $safe->safe }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="shkaf" class="col-md-4 col-form-label text-md-end">{{ __('Номер Шкафа/Ряда') }}</label>
                                                <div class="col-md-3">
                                                    <select id="shaving" class="form-select" name="shkaf_id" autofocus>

                                                        @foreach($shkaf as $shkafs)
                                                        @if($qators->shkaf_id == $shkafs->id)
                                                            <option value="{{ $shkafs->id }}"  selected  >{{ $shkafs->shkaf }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="qator" class="col-md-4 col-form-label text-md-end">{{ __('Номер ряда') }}</label>
                                                <div class="col-md-3">
                                                    <input id="qator" type="text" class="form-control" name="qator" value="  {{ $qators->qator }}">
                                                </div>
                                            </div>
                                            <div class="row mb-12">
                                                <label for="comment" class="col-md-4 col-form-label text-md-end">{{ __('Комментраии') }}</label>
                                                <div class="col-md-8">
                                                    <textarea id="comment"   class="form-control text" name="comment"  >{{$qators->comment}}</textarea>
                                                </div>
                                            </div>
                                            <br>

                                            <div class="row mb-0">
                                                <div class="col-md-8 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Сохранить') }}
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


    });
</script>
