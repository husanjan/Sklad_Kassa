@extends('layouts.app')

@section('content')
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2>Справочник единиц</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-success" href="{{ route('spreds.create') }}">
                                    <i class="align-middle" data-feather="edit-3"></i> Введение новой единицы</a>
                            </div>
                        </div>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @php($count=0)
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Тип денег</th>
                            <th>Название</th>
                            <th>Количество в упаковке</th>
                            <th>Коментарии</th>
                            <th width="280px">Действие</th>
                        </tr>
                        @foreach ($eds as $ed)
                        @php($count++)
                        <tr>
                            <td><b>{{  $count }}</b></td>
                                <td>@if($ed->money == 0) Купюра @else Монета @endif</td>
                                <td>{{ $ed->name }}</td>
                                <td>{{ $ed->kol }}</td>
                                <td>{{ $ed->comment }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('spreds.edit', $ed->id) }}"> <i class="align-middle" data-feather="edit"></i> Изменить</a>
                                    {!! Form::open(['method' => 'DELETE','route' => ['spreds.destroy', $ed->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </table>


@endsection


