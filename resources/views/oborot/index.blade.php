@extends('layouts.app')

@section('content')

    <div class="modal fade  bd-example-modal-lg " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('Добавление нового оборот') }}</h5>

                </div>

                <form role="form was-validated"  novalidate action="{{ route('oborot_spr.store') }}" method="post">
                    @csrf

                    <input type="hidden" name="kod_oper" value="{{$kodeOper}}">
                    <div class="row mb-3 mt-3">
                         <div class="container">
                             <div class="alert alert-danger alert-dismissible fade  " id="alerts">
                              <center>   <strong >Введите правильную сумму   !!</strong> .</center>
{{--                                 <button type="button" class="btn-close" data-bs-dismiss="alert"></button>--}}
                             </div>
                         </div>
                        <div class="col-md-3 offset-1">

                            <input   required id="date" type="date" aria-describedby="Data" class="form-control" name="date"  >
                        </div>
                        <div class="col-md-4 offset-1">

                            <select name="Bik" id="" required  aria-describedby="Bik"class="form-control was-validated">

                                <option disabled selected value="">БИК выберите</option>
                                @foreach($bik AS $biks)
                                <option value="{{$biks->id}}">{{$biks->BIK}} ({{$biks->full_name}})  </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row  offset-1">

                        <div class="col-md-3  ">

                            <select name="priznak" required id="priznak" class="form-control">
                                <option disabled selected value="">Выберите Признак</option>
                                <option value="1">Приход</option>
                                <option value="0">Расход</option>
                            </select>
                        </div>
                        <div class="col-md-3  ">

                            <select name="account_id_out" id="schet1"  required  class="form-control schet1">
                                <option disabled selected value="" >Выберите счетов</option>
                                @foreach($sprAccounts AS $accounts)


                                    <option value="{{$accounts->id}}">{{$accounts->account}} {{$accounts->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3  ">
                            <div id="schet2">


                            <select name="" id="" class="form-control"  disabled="" >
                                <option disabled selected >Выберите счетов</option>

                            </select>
                            </div>
                        </div>

                    </div>
                    <div class="row  offset-1 mt-2">
                        <div class="col-md-4  mt-2">
                            <div class="input-group">
                                <span class="input-group-text">Номинал</span>
                                <input   required   type="text" id="summash" class="form-control nomcou " aria-describedby="btnGroupAddon" name="nominal[]"  >

                            </div>



                                 </div>

                        <div class="col-md-4 mt-2 ">
                            <div class="input-group">
                                <span class="input-group-text">Сумма</span>
                                <input   required   type="text" id="summas" class="form-control count  " aria-describedby="btnGroupAddon" name="summa[]"  >

                            </div>

                            <div class="input-group-tex t" id="btnGroupAddon" disabled ></div>

                        </div>


                            <div class="col-md-4 mt-3">
                                <button type="button" onclick="add()" class="btn btn-bitbucket active" id="adds" disabled> <i class="align-middle" data-feather="plus"></i></button>
                                <button onclick="remove()" type="button"  class="btn btn-bitbucket active"><i class="align-middle" data-feather="trash-2"></i></button>

                            </div>
                        <input type="hidden" value="1" id="total_chq">
                    </div>
                    <div id="new_chq" >

                    </div>
                    <div class="row  offset-3 mt-2 ">
                    <div class="col-md-3 mt-3">



                    </div>

                        <div class="col-md-5 mt-3">
                            <button type="button"   class="btn btn-light active" id="adds" disabled><div id="countsum"></div> </button>

                        </div>
                    </div>
                    <div class="row col-md-8   offset-1">

                        <div class=" ">
                            <span class="input-group-text col-md-4">{{ __('Комментраии') }}</span>
                            <div class="input-group">

                            <textarea id="comment" type="text" class="form-control   text  " name="comment" aria-describedby="btnGroupAddon"></textarea>
                            </div>
                        </div>
                    </div>
                    <br>



                    <div class="modal-body">

                    </div>
                    <div class="modal-footer ">
                        <div class="row mb-0 ">
                            <div class="col-md-8 justify-content-center">
                                <button type="submit" class="btn btn-facebook active addform" disabled>
                                    {{ __('Добавить') }}
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
                <h2>Оборот</h2>
            </div>
            <div class="pull-right">
                <button type="button" class="btn btn-success  " data-toggle="modal" data-target="#exampleModalCenter">
                    <i class="align-middle" data-feather="plus"></i> Создание нового оборот
                </button>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>БИК</th>
            <th>Номер счета 1</th>
            <th>Номер счета 2</th>
            <th>Номинал</th>
            <th>Сумма</th>
            <th>Код операции</th>
            <th>Коментарии</th>
            <th> </th>

        </tr>

                @foreach($obor AS $oborot)
            <tr>
                   <td></td>
                   <td>
                       @foreach($bik AS $biks)
                           @if($oborot->Bik==$biks->id)
                               {{$biks->BIK}}   <br> {{$biks->full_name}}
                           @endif
                       @endforeach


                   </td>
                   <td>

                       {{$oborot->account_id_out}}
                       @foreach($sprAccounts AS $sprAccount)
                           @if($oborot->account_id_out==$sprAccount->id)
                               {{$sprAccount->account}}   <br> {{$sprAccount->name}}
                           @endif
                       @endforeach

                   </td>
                   <td>
                       @foreach($sprAccounts AS $sprAccount)
                           @if($oborot->account_id_in==$sprAccount->id)
                               {{$sprAccount->account}}   <br> {{$sprAccount->name}}
                           @endif
                       @endforeach
                   </td>
                   <td>{{$oborot->nominal}}</td>
                   <td>{{$oborot->summa}}</td>
                   <td>

                       @if($oborot->priznak===1)
                           {{"Приход"}}
                       @endif
                           @if($oborot->priznak==0)
                               {{"Расход"}}
                           @endif
                    </td>
                   <td>{{$oborot->comment}}</td>


             <td>


                 {!! Form::open(['method' => 'DELETE','route' => ['oborot_spr.destroy', $oborot->id],'style'=>'display:inline']) !!}
                 {!! Form::submit('Удалить', ['class' => 'btn btn-instagram active']) !!}
                 {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

    </table>
@endsection

<script src='{{asset('js/ajax.min.js')}}'></script>
<script src="{{asset('js/OborotJs.js')}}"></script>
<script>
    // (function() {
    //     'use strict';
    //     window.addEventListener('load'    //                 input.classList.remove('is-invalid'), function() {
    //         // fetch all the forms we want to apply custom style
    //         var inputs = document.getElementsByClassName('form-control')
    //
    //         // loop over each input and watch blue event
    //         var validation = Array.prototype.filter.call(inputs, function(input) {
    //
    //             input.addEventListener('keyup', function(event) {
    //                 // reset

    //                 input.classList.remove('is-valid')
    //
    //                 if (input.checkValidity() === false) {
    //                     input.classList.add('is-invalid')
    //                 }
    //                 else {
    //                     input.classList.add('is-valid')
    //                 }
    //             }, false);
    //         });
    //     }, false);
    // })()
</script>
