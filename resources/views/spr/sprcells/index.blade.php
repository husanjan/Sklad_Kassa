@extends('layouts.app')

@section('content')
   <div class="container-fluid">
    <div class="modal fade  bd-example-modal-lg " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('Добавление нового счета') }}</h5>

                </div>
                <form role="form" action="{{ route('sprcell.store') }}" method="s">
                    <div class="modal-body">


                            @csrf
                            <div class="row mb-3">
                                <label for="safe_id" class="col-md-4 col-form-label text-md-end">{{ __('Номер хранилище') }}</label>
                                <div class="col-md-3">
                                    <select id="safe_id" class="form-select" name="safe_id" autofocus required>
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
                                    <select   class="form-select" name="shkaf_id" id="shaving" required>
                                        <option value="">Интихоб</option>


                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="qator_id" class="col-md-4 col-form-label text-md-end">{{ __('Номер ряда') }}</label>
                                <div class="col-md-3">
                                    <select id="qator_id" class="form-select" name="qator_id" required>
                                        <option value="" selected>Интихоб</option>

                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="cells" class="col-md-4 col-form-label text-md-end">{{ __('Номер ячейка') }}</label>
                                <div class="col-md-3">
                                    <input id="cells" type="text" class="form-control" name="cell" placeholder="Номер ячейка" required>
                                </div>
                            </div>

                            <div class="row mb-12">
                                <label for="comment" class="col-md-4 col-form-label text-md-end">{{ __('Комментраии') }}</label>
                                <div class="col-md-8">
                                    <textarea id="comment"   class="form-control text" name="comment"></textarea>
                                </div>
                            </div>
                            <br>

                    </div>
                    <div class="modal-footer ">
                        <div class="row mb-0 ">
                            <div class="col-md-8 justify-content-center">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Добавить') }}
                                </button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-light offset-11" data-dismiss="modal">Закрыт</button>

                    </div>

                </form>

            </div>
        </div>
    </div>



  <div class="row">
                        <div class="col-lg-12 margin-tb ml-2">
                            <div class="pull-left">
                                <h2>Справочник Ячейка</h2>
                            </div>
                            <div class="pull-right">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                                    <i class="align-middle" data-feather="plus"></i> Создание нового Ячейка
                                </button>
                            </div>
                        </div>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @php($count=0)
                   <div class="card col-md-6 ml-2">
                    <table class="table table-bordered mt-2">
                        <tr>
                            <th>No</th>
                            <th>Номер хранилище</th>
                            <th>Номер шкафа/стилажа</th>
                            <th>Номер ряда</th>
                            <th>Номер Ячейка</th>
                            {{-- <th>Коментарии</th> --}}
                            <th width="280px">Действие</th>
                        </tr>
                        @foreach ($cell as $cells)

                        @php($count++)
                        <tr>
                            <td><b>{{  $count }}</b></td>
                                <td>
                                    @foreach($safes as $safe)
                                        @if($cells->safe_id == $safe->id)
                                            {{ $safe->safe }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($shkafs as $shkaf)
                                        @if($cells->shkaf_id == $shkaf->id)
                                            {{ $shkaf->shkaf }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($qators as $qator)
                                        @if($cells->qator_id == $qator->id)
                                            {{ $qator->qator }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ $cells->cell }}</td>
                                {{-- <td>{{ $cells->comment }}</td> --}}
                                <td>
                                    <a class="btn btn-primary" href="{{ route('sprcell.edit', $cells->id) }}">  <i class="align-middle" data-feather="edit"></i> Изменить</a>
                                    {!! Form::open(['method' => 'DELETE','route' => ['sprcell.destroy', $cells->id],'style'=>'display:inline']) !!}
                                     {!! Form::submit('  Удалить', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
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

