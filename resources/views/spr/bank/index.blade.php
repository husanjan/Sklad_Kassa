@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="modal fade    bd-example-modal-lg   show " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                    <input type="text" class="form-control" name="BIK" maxlength="9"  minlength="9">
                                  
                                </div>
                                @if($errors->has('BIK'))
                                <div class="error">      <div class="alert alert-danger">
                                    <p>Хато шуд</p>
                                </div> </div>
                                @endif
                            </div>
    
                            <div class="row mb-3">
                                <label for="shkaf_id" class="col-md-4 col-form-label text-md-end">{{ __('Полное название') }}</label>
                                <div class="col-md-3">
                                    <input type="text"  name="full_name" class="form-control">
                                    @if($errors->has('full_name'))
                                    <div class="error">      <div class="alert alert-danger">
                                        <p>Хато шуд</p>
                                    </div> </div>
                                @endif
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="qator_id"  class="col-md-4 col-form-label text-md-end">{{ __('Краткое название') }}</label>
                                <div class="col-md-3">
                                    <input type="text" name="short_name" class="form-control">
                                    @if($errors->has('short_name'))
                                    <div class="error">{{ $errors->first('short_name') }}</div>
                                @endif
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
                                    <button type="submit" class="btn btn-success active">
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
            <div class="col-lg-12 ml-4">
                <div class="pull-left">
                    <h2>Справочник банк</h2>
                </div>
                <div class="pull-right">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                        <i class="align-middle"data-feather="plus"></i>Создание нового банк
                    </button>
                </div>
            </div>
        </div>
    
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
    
                 <div class="card    col-md-8 ml-4 " >
                    <table class="table table-bordered  ">
                        <tr>
                            <th>#</th>
                            <th>БИК</th>
                            <th>Полное название</th>
                            <th>Полное имя</th>
                            {{-- <th> Коммент</th> --}}
                            <th> </th>
                
                        </tr>
                        @php($count=0)
                                 @foreach($banks AS $bank)
                            @php($count++)
                            <tr>
                                     <td><b>{{$count}}</b>  </td>
                                     <td>{{$bank->BIK}}</td>
                                     <td>{{$bank->full_name}}</td>
                                     <td>{{$bank->short_name}}</td>
                                     {{-- <td>{{$bank->comment}}</td> --}}
                
                
                                <td>
                                    <a class="btn btn-primary" href="{{ route('bank_spr.edit', $bank->id) }}"> <i class="align-middle" data-feather="edit"></i> Изменить</a>
                                    {!! Form::open(['method' => 'DELETE','route' => ['bank_spr.destroy',  $bank->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Удалить', ['class' => 'btn btn-danger active']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                
                    </table>
                 </div>
    </div>
    

@endsection

<script src="{{asset('js/ajax.min.js')}}"></script>


