@extends('layouts.app')
 
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Изменение единицы') }}</div>

                    <div class="card-body">


                        <div class="row">
                            <div class="col-sm-10">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-content custom-form-container">
                                        <form role="form" action="{{ route('spreds.update', $eds->id) }}" method="POST">
                                            @csrf
                                            <input name="_method" type="hidden" value="PATCH">
                                            <div class="row mb-3">
                                                <label for="money" class="col-md-4 col-form-label text-md-end">{{ __('Вид денег') }}</label>
                                                <div class="col-md-3">
                                                    <select id="money" class="form-select" name="money">
                                                        <option value="0" @if($eds->money == 0) selected @endif>Бумага</option>
                                                        <option value="1" @if($eds->money == 1) selected @endif>Монета</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-12">
                                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Название единицы') }}</label>
                                                <div class="col-md-8">
                                                    <input id="name" type="text" class="form-control" name="name" value="{{ $eds->name }}">
                                                </div>
                                            </div>
                                            <br>

                                            <div class="row mb-12">
                                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Количество в единице') }}</label>
                                                <div class="col-md-8">
                                                    <input id="kol" type="text" class="form-control" name="kol" value="{{ $eds->kol }}">
                                                </div>
                                            </div>
                                            <br>

                                            <div class="row mb-12">
                                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Комментраии') }}</label>
                                                <div class="col-md-8">
                                                    <textarea id="comment" type="text" class="form-control text" name="comment" value="{{ $eds->comment }}"></textarea>
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


