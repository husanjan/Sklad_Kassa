@extends('layouts.app')

@section('content')


    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade  bd-example-modal-lg " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('Добавление нового счета') }}</h5>

                </div>
                <form role="form" action="{{ route('spraccounts.store') }}" method="post">
                <div class="modal-body">

                        @csrf
                        <div class="row mb-3">
                            <label for="account" class="col-md-4 col-form-label text-md-end">{{ __('Номер счета') }}</label>
                            <div class="col-md-3">
                                <input id="account" type="text" class="form-control" name="account" placeholder="Номер счета" autofocus>
                            </div>
                        </div>

                        <div class="row mb-12">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Описание счета') }}</label>
                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control" name="name" placeholder="Имя счета">
                            </div>
                        </div>
                        <br>

                        <div class="row mb-12">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Комментраии к счету') }}</label>
                            <div class="col-md-8">
                                <textarea id="comment" type="text" class="form-control text" name="comment"></textarea>
                            </div>
                        </div>
                        <br>



                </div>
                <div class="modal-footer ">
                    <div class="row mb-0 ">
                        <div class="col-md-8 justify-content-center">
                            <button type="submit" class="btn btn-facebook active">
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
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2>Справочник счетов</h2>
                            </div>
                            <div class="pull-right">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                                    <i class="align-middle" data-feather="plus"></i> Создание нового счета
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
                    <table class="table table-bordered mt-4">
                        <tr>
                            <th>No</th>
                            <th>Номер счета</th>
                            <th>Описание счета</th>
                            <th>Коментарии к счету</th>
                            <th width="280px">Действие</th>
                        </tr>
                        @foreach ($accounts as $account)
                        @php($count++)
                        <tr>
                            <td><b>{{  $count }}</b></td>

                                <td>{{ $account->account }}</td>
                                <td>{{ $account->name }}</td>
                                <td>{{ $account->comment }}</td>
                                <td>
                                    <a class="btn btn-primary active" href="{{ route('spraccounts.edit', $account->id) }}"> <i class="align-middle" data-feather="edit"></i> Изменить</a>
                                    {!! Form::open(['method' => 'DELETE','route' => ['spraccounts.destroy', $account->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Удалить', ['class' => 'btn btn-danger active']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </table>


@endsection

