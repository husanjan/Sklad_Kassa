@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Создание нового хранилище') }}</div>

                    <div class="card-body">


                        <div class="row">
                            <div class="col-sm-10">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-content custom-form-container">
                                        <form role="form" action="{{ route('sprshkafs.store') }}" method="post">
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
                                                <label for="shkaf" class="col-md-4 col-form-label text-md-end">{{ __('Номер Шкафа/Ряда') }}</label>
                                                <div class="col-md-3">
                                                    <input id="shkaf" type="text" class="form-control" name="shkaf" placeholder="Номер Шкафа/Ряда">
                                                </div>
                                            </div>

                                            <div class="row mb-12">
                                                <label for="comment" class="col-md-4 col-form-label text-md-end">{{ __('Комментраии') }}</label>
                                                <div class="col-md-8">
                                                    <textarea id="comment" type="text" class="form-control text" name="comment"></textarea>
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


