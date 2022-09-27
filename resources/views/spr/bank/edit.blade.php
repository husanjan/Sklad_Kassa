@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header ">
                        <h4> <b>{{ __('Изменение счет') }}</b></h4>
                    </div>

                    <div class="card-body">


                        <div class="row">
                            <div class="col-sm-10">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-content custom-form-container">
                                        <form role="form" action="{{ route('bank_spr.update',$bankUpdate->id) }}" method="POST">
                                            @csrf
                                            <input name="_method" type="hidden" value="PATCH">

                                            <div class="row mb-3">
                                                <label for="safe_id" class="col-md-4 col-form-label text-md-end">{{ __('БИК') }}</label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" name="BIK" minlength="9" maxlength="9" value="{{$bankUpdate->BIK}}">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="safe_id" class="col-md-4 col-form-label text-md-end">{{ __('Полное название	 ') }}</label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" name="full_name" value="{{$bankUpdate->full_name}}">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="safe_id" class="col-md-4 col-form-label text-md-end">{{ __('Полное название	 ') }}</label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" name="short_name" value="{{$bankUpdate->short_name}}">
                                                </div>
                                            </div>


                                            <div class="row mb-12">
                                                <label for="comment" class="col-md-4 col-form-label text-md-end">{{ __('Комментраии') }}</label>
                                                <div class="col-md-8">
                                                    <textarea id="comment"   class="form-control text" name="comment"  >{{$bankUpdate->comment}}</textarea>
                                                </div>
                                            </div>
                                            <br>

                                            <div class="row mb-0">
                                                <div class="col-md-8 offset-md-4">
                                                    <button type="submit" class="btn btn-facebook active">
                                                        {{ __('Изменить') }}
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



