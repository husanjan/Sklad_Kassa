@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-sm-10">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    @if(Auth::user()->hasPermissionTo('permission-create'))
                        <a href="{{ route('permissions.create') }}" class="btn btn-primary pull-right" type="button"><i class="fa fa-plus"></i>&nbsp;Илова кардан</a>
                    @endif

                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Номи амалиёт</th>
                            <th>Шарҳ</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($permissions as $index => $permission)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->guard_name }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('permissions.show',$permission->id) }}">Show</a>
                                    @can('permission-edit')
                                        <a class="btn btn-primary" href="{{ route('permissions.edit',$permission->id) }}">Edit</a>
                                    @endcan
                                    @can('permission-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $permission->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="row">
{{--                        <div class="col-sm-6">{!! $permissions->links() !!}</div>--}}
{{--                        <div class="col-sm-6 text-right" style="margin: 20px 0;">Ҳамагӣ: {{$permissions->total()}}</div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
