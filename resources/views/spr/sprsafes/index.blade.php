@extends('layouts.app')

@section('content')
         

  <div class="container-fluid ">
    <div class="modal fade  bd-example-modal-lg " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('Добавление нового хранилище') }}</h5>

                </div>
                <form role="form" action="{{route('sprsafes.store') }}" method="post">
                    @csrf
                    <div class="row mb-3 mt-2">
                        <label for="safe" class="col-md-4 col-form-label text-md-end">{{ __('Номер хранилище') }}</label>
                        <div class="col-md-3">
                            <input id="safe" type="text" class="form-control" name="safe" placeholder="Номер хранилище"  required autofocus>
                        </div>
                    </div>

                    <div class="row mb-12">
                        <label for="comment" class="col-md-4 col-form-label text-md-end">{{ __('Комментраии') }}</label>
                        <div class="col-md-8">
                            <textarea id="comment" type="text" class="form-control text" name="comment"></textarea>
                        </div>
                    </div>
                    <br>

                    <div class="row mb-2">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-success">
                                {{ __('Добавить') }}
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="row">
                        <div class="col-lg-12 margin-tb ml-4">
                            <div class="pull-left">
                                <h2>Справочник хранилище</h2>
                            </div>
                            <div class="pull-right">
                                <button type="button" class="btn btn-success  " data-toggle="modal" data-target="#exampleModalCenter">
                                    <i class="align-middle" data-feather="plus"></i> Создание нового хранилище
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
                 <div class="card ml-3 col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Номер хранилище</th>
                            <th>Коментарии</th>
                            <th width="280px">Действие</th>
                        </tr>
                        @foreach ($safes as $safe)
                        @php($count++)
                        <tr>
                            <td><b>{{  $count }}</b></td>
                                <td>{{ $safe->safe }}</td>
                                <td>{{ $safe->comment }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('sprsafes.edit', $safe->id) }}"> <i class="align-middle" data-feather="edit"></i>Изменить</a>
                                    {!! Form::open(['method' => 'DELETE','route' => ['sprsafes.destroy', $safe->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Удалить', ['class' => 'btn btn-danger ']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                 </div>
  </div>


@endsection


