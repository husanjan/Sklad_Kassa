@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Изменение счета') }}</div>

                    <div class="card-body">


                        <div class="row">
                            <div class="col-sm-10">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-content custom-form-container">

                                        <form role="form" action="{{ route('spraccounts.update', $accounts->id) }}" method="POST">
                                            @csrf
                                            <input name="_method" type="hidden" value="PATCH">
                                            <div class="row mb-3">
                                                <label for="account" class="col-md-4 col-form-label text-md-end">{{ __('Номер счета') }}</label>
                                                <div class="col-md-3">
                                                    <input id="account" type="text" class="form-control" name="account" value="{{ $accounts->account }}" autofocus>
                                                </div>
                                            </div>

                                            <div class="row mb-12">
                                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Описание счета') }}</label>
                                                <div class="col-md-8">
                                                    <input id="name" type="text" class="form-control" name="name" value="{{ $accounts->name }}">
                                                </div>
                                            </div>
                                            <br>

                                            <div class="row mb-12">
                                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Комментраии к счету') }}</label>
                                                <div class="col-md-8">
                                                    <textarea id="comment" type="text" class="form-control text" name="comment">{{ $accounts->comment }}</textarea>
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


