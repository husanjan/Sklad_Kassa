@extends('layouts.app')

@section('content')
   <div class="container-fluid">
    <div class="modal fade  bd-example-modal-lg " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('Добавление нового счета') }}</h5>

                </div>
                <form role="form" action="{{ route('sprshkafs.store') }}" method="post">
                    @csrf
                    <div class="row mb-3 mt-2">
                        <label for="safe_id" class="col-md-4 col-form-label text-md-end">{{ __('Номер хранилище') }}</label>
                        <div class="col-md-3">
                            <select id="safe_id" class="form-select" name="safe_id" autofocus required>
                                <option value="">Интихоб</option>
                                @foreach($safes as $safe)
                                    <option value="{{ $safe->id }}">{{$safe->safe}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="shkaf" class="col-md-4 col-form-label text-md-end">{{ __('Номер Шкафа/Ряда') }}</label>
                        <div class="col-md-3">
                            <input id="shkaf" type="text" class="form-control" name="shkaf" placeholder="Номер Шкафа/Ряда" required>
                        </div>
                    </div>

                    <div class="row mb-12">
                        <label for="comment" class="col-md-4 col-form-label text-md-end">{{ __('Комментраии') }}</label>
                        <div class="col-md-8">
                            <textarea id="comment" type="text" class="form-control text" name="comment"></textarea>
                        </div>
                    </div>
                    <br>



                    <div class="modal-body">

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
          <h2>Справочник/Шкафов</h2>
           </div>
            <div class="pull-right">
                <button type="button" class="btn btn-success  " data-toggle="modal" data-target="#exampleModalCenter">
                    <i class="align-middle" data-feather="plus"></i> Создание нового шкафа/стилажа
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
                  <div class="card col-md-6">
                    <table class="table  col-md-12">
                        <tr>
                            <th>No</th>
                            <th>Номер хранилище</th>
                            <th>Номер шкафа/стилажа</th>
                            {{-- <th>Коментарии</th> --}}
                            <th width="280px">Действие</th>
                        </tr>
                        @foreach ($shkafs as $shkaf)
                        @php($count++)
                        <tr>
                            <td><b>{{  $count }}</b></td>
                                <td>
                                    @foreach($safes as $safe)
                                        @if($shkaf->safe_id == $safe->id)
                                            {{ $safe->safe }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ $shkaf->shkaf }}</td>
                                {{-- <td>{{ $shkaf->comment }}</td> --}}
                                <td>
                                    <a class="btn   btn-primary" href="{{ route('sprshkafs.edit', $shkaf->id) }}"> <i class="align-middle" data-feather="edit"></i>  Изменить</a>
                                    {!! Form::open(['method' => 'DELETE','route' => ['sprshkafs.destroy', $shkaf->id],'style'=>'display:inline']) !!}

                                    {{Form::button('<i class="far fa-trash-alt icon-size"></i>', ['type' =>'submit', 'class' => 'btn btn-danger'])}}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                  </div>
   </div>
@endsection


