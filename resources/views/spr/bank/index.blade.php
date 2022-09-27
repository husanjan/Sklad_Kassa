@extends('layouts.app')

@section('content')
    <div class="modal fade  bd-example-modal-lg " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __(' ') }}</h5>

                </div>
                <form role="form" action="{{ route('bank_spr.store') }}" method="post">
                    <div class="modal-body">


                        @csrf
                        <div class="row mb-3">
                            <label for="safe_id" class="col-md-4 col-form-label text-md-end">{{ __('БИК') }}</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="BIK" maxlength="9" >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="shkaf_id" class="col-md-4 col-form-label text-md-end">{{ __('Полное название') }}</label>
                            <div class="col-md-3">
                                <input type="text"  name="full_name" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="qator_id"  class="col-md-4 col-form-label text-md-end">{{ __('Краткое название') }}</label>
                            <div class="col-md-3">
                                <input type="text" name="short_name" class="form-control">
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
                                <button type="submit" class="btn btn-facebook active">
                                    {{ __('Создать') }}
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
                <h2>Справочник счет</h2>
            </div>
            <div class="pull-right">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                    <i class="align-middle"data-feather="plus"></i>Создание нового счет
                </button>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered mt-4">
        <tr>
            <th>#</th>
            <th>БИК</th>
            <th>Полное название</th>
            <th>Полное имя</th>
            <th> Коммент</th>
            <th> Действие</th>

        </tr>
        @php($count=0)
                 @foreach($banks AS $bank)
            @php($count++)
            <tr>
                     <td> <b>{{  $count }}</b>  </td>
                     <td> {{$bank->BIK}} </td>
                     <td> {{$bank->full_name}}  </td>
                     <td> {{$bank->short_name}}  </td>
                     <td> {{$bank->comment}}  </td>


                <td>
                    <a class="btn btn-facebook active" href="{{ route('bank_spr.edit', $bank->id) }}"> <i class="align-middle" data-feather="edit"></i> Изменить</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['bank_spr.destroy',  $bank->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Удалить', ['class' => 'btn btn-instagram active']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach

    </table>

@endsection

<script src="{{asset('js/ajax.min.js')}}"></script>


