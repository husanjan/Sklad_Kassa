@extends('template')
@section('menu-permission', 'active')
@section('breadcrumb')
    <h2>Амалиётҳо</h2>
    <ol class="breadcrumb">
        <li><a href="/">Асосӣ</a></li>
        <li><a href="{{route('permission-index')}}">Амалиёт</a></li>
        <li class="active">Ислоҳ кардан</li>
    </ol>
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-6">
            <div class="ibox float-e-margins">
                <div class="ibox-content custom-form-container">
                    <form role="form" action="{{ route('permission-update', $permission->id) }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group @if($errors->has('name')) has-error @endif">
                            <label class="control-label">Номи амалиёт</label>
                            <input type="text" name="name" id="name" placeholder="rayon-create" value="{{ $permission->name }}" class="form-control">
                            @if($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                        </div>

                        <div class="form-group @if($errors->has('description')) has-error @endif">
                            <label class="control-label">Шарҳи амалиёт</label>
                            <input type="text" name="description" id="description" placeholder="Илова намудани Ноҳия" value="{{ $permission->description }}" class="form-control">
                            @if($errors->has('description')) <p class="help-block">{{ $errors->first('description') }}</p> @endif
                        </div>

                        <div class="form-group @if($errors->has('controller')) has-error @endif">
                            <label class="control-label">Контроллер</label>
                            <input type="text" name="controller" id="controller" placeholder="rayon" value="{{ $permission->controller }}" class="form-control">
                            @if($errors->has('controller')) <p class="help-block">{{ $errors->first('controller') }}</p> @endif
                        </div>

                        <div class="form-group @if($errors->has('controller_name')) has-error @endif">
                            <label class="control-label">Номи контроллер</label>
                            <input type="text" name="controller_name" id="controller_name" placeholder="Ноҳия" value="{{ $permission->controller_name }}" class="form-control">
                            @if($errors->has('controller_name')) <p class="help-block">{{ $errors->first('controller_name') }}</p> @endif
                        </div>
                        <div class="form-group">
                            <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>Сабт намудан</strong></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection