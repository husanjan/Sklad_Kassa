@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Изменение Хранилище') }}</div>

                    <div class="card-body">


                        <div class="row">
                            <div class="col-sm-10">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-content custom-form-container">
                                        <form role="form" action="{{ route('sprshkafs.update', $shkaf->id) }}" method="POST">
                                            @csrf
                                            <input name="_method" type="hidden" value="PATCH">
                                            <div class="row mb-3">
                                                <label for="safe_id" class="col-md-4 col-form-label text-md-end">{{ __('Номер хранилище') }}</label>
                                                <div class="col-md-3">
                                                    <select id="safe_id" class="form-select" name="safe_id" autofocus>
                                                        <option value="">Интихоб</option>
                                                        @foreach($safes as $safe)
                                                            <option value="{{ $safe->id }}" @if($shkaf->safe_id == $safe->id) selected @endif >{{ $safe->safe }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="shkaf" class="col-md-4 col-form-label text-md-end">{{ __('Номер Шкафа/Ряда') }}</label>
                                                <div class="col-md-3">
                                                    <input id="shkaf" type="text" class="form-control" name="shkaf" value="{{ $shkaf->shkaf }}">
                                                </div>
                                            </div>

                                            <div class="row mb-12">
                                                <label for="comment" class="col-md-4 col-form-label text-md-end">{{ __('Комментраии') }}</label>
                                                <div class="col-md-8">
                                                    <textarea id="comment" type="text" class="form-control text" name="comment">{{ $shkaf->comment }}</textarea>
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

