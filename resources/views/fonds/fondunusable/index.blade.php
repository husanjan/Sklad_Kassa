@extends('layouts.app')

@section('content')




  {{--  Приход Модал--}}

  <!-- Modal -->


  <!-- Modal -->


  <nav aria-label="breadcrumb ">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Главная</a></li>
        <li class="breadcrumb-item active" aria-current="page">Коршоям</li>
    </ol>
</nav>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<form method="POST" action="{{ route('fondunusable.store') }}" id="submit" >
    @csrf
  <div class="modal fade " id="rashod" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div  style="height: 70px">
                <div class="toast offset-md-10">
                    <div class="toast fade mx-auto toast-danger toast-fixed show showing" id="basic-danger-example" role="alert" aria-live="assertive" aria-atomic="true" data-mdb-autohide="true" data-mdb-delay="2000" data-mdb-position="top-right" data-mdb-append-to-body="true" data-mdb-stacking="true" data-mdb-width="350px" data-mdb-color="danger" style="width: 350px; display: block; top: 10px; right: 10px; bottom: unset; left: unset; transform: unset;">
                        <div class="toast-header toast-danger bg-danger">
                            <strong class="me-auto ">ХАТО</strong>


                        </div>
                        <div class="toast-body ">Турги дароред!!</div>
                    </div>
                </div>
                
            </div>
      <div class="modal-dialog modal-dialog-top  modal-xl" role="document">

          <div class="modal-content  ">

              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">
                     <div id="textpriznak"></div></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">

                  <div class="row  offset-1">

                      <div class="col-md-3  ">
                          <label for="date">Дата	</label>
                          <input  type="datetime-local"readonly="readonly"     style="width: 11rem;"     value="<?php echo date('Y-m-d H:i:s'); ?>"     name="date" class="form-control"    >

                          <input      value="0"    name="priznak" type="hidden"    >
                          <input            name="kode_oper" type="hidden"   value="{{$kodeOper}}">
                          <input            name="farsuda" type="hidden"   value="1" >

                      </div>
                      <div class="col-md-2  ">

                          
                      
                          <input type="hidden" name="kode_oper_obor" value="{{$kodeOperObort }}">
                          <input type="hidden"  name="src" value="4">
                            
                              {{-- <div id="src">
                              
                                  
                                  
                                 
                              </div> --}}
                          {{-- <select name="src"   id="accounted" class="form-control" required>
                              <option disabled selected value="">Выберите </option>
                              @foreach($sprAccounts AS $accounts)
                                  <option value="{{$accounts->id}}">{{$accounts->account}}</option>
                              @endforeach
                          </select> --}}
                          <div id="accounts"></div>

                      </div>
                    
                      <div class="col-md-2  ">
                          <label for="count01">Номер Документ	</label>
                          <input        type="text"  name="ndoc" class="form-control "  autocomplete="off" required>
                      </div>
                      <div class="col-md-4" id="AllSumma"></div>
                      
                  </div>
                  <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
                      <li class="nav-item">
                          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#One" role="tab" aria-controls="home" aria-selected="true">1 cом  <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="0Somon"></i></a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" id="Three-tab" data-toggle="tab" href="#Three" role="tab" aria-controls="Three" aria-selected="false">3 cом <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="3Somon"></i></a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" id="Five-tab" data-toggle="tab" href="#Five" role="tab" aria-controls="Five" aria-selected="false">5 cом <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="5Somon"></i></a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" id="ten-tab" data-toggle="tab" href="#Ten" role="tab" aria-controls="ten" aria-selected="false">10 cом <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="tSomon"></i></a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" id="twelwe-tab" data-toggle="tab" href="#Twelwe" role="tab" aria-controls="twelwe" aria-selected="false">20 cом <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="bSomon"></i></a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" id="fifty-tab" data-toggle="tab" href="#Fifty" role="tab" aria-controls="fifty" aria-selected="false">50 cом <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="cSomon"></i> </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" id="Hundred-tab" data-toggle="tab" href="#Hundred" role="tab" aria-controls="Hundred" aria-selected="false">100 cом <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="dSomon"></i></a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" id="TwoHundred-tab" data-toggle="tab" href="#TwoHundred" role="tab" aria-controls="TwoHundred" aria-selected="false">200 cом <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="eSomon"></i></a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" id="Fiftyhundred-tab" data-toggle="tab" href="#Fiftyhundred" role="tab" aria-controls="Fiftyhundred" aria-selected="false">500 cом <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="fSomon"></i></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="razne-tab" data-toggle="tab" href="#razne" role="tab" aria-controls="razne" aria-selected="false">Разные <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="rrazne"></i></a>
                    </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="One" role="tabpanel" aria-labelledby="home-tab">

                                   <div class="row  mt-2     " id="new00"  >





                                       <input     id="nominal01"  value="1"   class="nominal"  type="hidden"  name="nominal0[]"     >


                                        <div class="col-md-2   ">
                                            <label for="edin_id">Единиц</label>
                                            <select id="edin_id01" class="form-select selects01 Somon edin_id"  name="ed_id0[]" >
                                                <option value="">Интихоб</option>
                                                @foreach($sprEds as $sprEd)
                                                    <option value="{{$sprEd->id}} " data-id="{{$sprEd->kol}}">{{$sprEd->name}}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="col-md-1  ">
                                            <label for="count01">Кол-во	</label>
                                            <input      style="width: 05rem;" id="count01" data-type="0" type="text"  name="count0[]" class="form-control  Somon  count">

                                        </div>
                                        <div class="col-md-2 ">
                                            <label for="safe_id01">Хранилище</label>
                                            <select name="safe_id0[]" style="width: 08rem;"  id="safe_id01" class="form-control selects01  Somon">
                                                <option   selected value="">Выберите</option>
                                                @foreach($safes as $safe)
                                                    <option value="{{$safe->id}}">{{$safe->safe}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2" style="width: 08rem;">  <label for="shaving01">Шкаф	</label>
                                            <select name="shaving0[]"   id="shaving01" class="form-control selects01  Somon">
                                                <option   selected value="">Выберите </option>

                                            </select>
                                        </div>
                                        <div class="col-md-2   ">
                                            <label for="qator_id01">Ряд	</label>
                                            <select name="qator_id0[]" style="width: 08rem;"  id="qator_id01" class="form-control selects01  Somon">
                                                <option   selected value="">Выберите </option>

                                            </select>
                                        </div>
                                        <div class="col-md-1">
                                            <label for="cells01">Ячейка</label>
                                            <select name="cells0[]"   id="cells01" class="form-control selects01  Somon">
                                                <option   selected value="">Выберите </option>

                                            </select>
                                        </div>


                                       <div class="col-md-2 mt-4">
                                           <button type="button"   class="btn btn-primary active" id="add"    value="01" > <i class="align-middle" data-feather="plus"></i></button>
                                           <button   id="remove" value="01" type="button"  class="btn btn-bitbucket active"><i class="align-middle" data-feather="trash-2"></i></button>
                                           <input type="hidden" value="1" id="total_chq01">
                                       </div>
                                   </div>



                                   <div id="new_chq01"></div>
                          <div class="form-check form-switch  col-md-4 mt-4">
                              {{-- <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"  value="nepolniySomon0" >
                              <div class="form-check-label"  for="flexSwitchCheckChecked" >Неполный</div> --}}

                          </div>
                          <div id="sum01" class="col-md-3 offset-8   "  style="margin-top:-10px;" >   </div>
                               <div  id="nepolniySomon0">



                               </div>


                               </div>
              <div class="tab-pane fade" id="Three" role="tabpanel" aria-labelledby="Three-tab">
                          <div class="row  mt-2" id="new31">
                              <input     id="nominal31"  value="3"    type="hidden"  name="nominal3[]"     >
                              <div class="col-md-2   ">
                                  <label for="edin_id">Единиц	</label>
                                  <select id="edin_id31" class="form-select selects31 Somon edin_id" name="ed_id3[]"  >
                                      <option value="">Интихоб</option>
                                      @foreach($sprEds as $sprEd)

                                          <option value="{{$sprEd->id}} " data-id="{{$sprEd->kol}}">{{$sprEd->name}}
                                          </option>
                                      @endforeach
                                  </select>

                              </div>
                              <div class="col-md-1  ">
                                  <label for="count31">Кол-во	</label>
                                  <input      style="width: 05rem;" id="count31" data-type="0"   type="text"  name="count3[]" class="form-control Somon count">

                              </div>
                              <div class="col-md-1 ">
                                  <label for="safe_id31">Хранилище</label>
                                  <select name="safe_id3[]"   id="safe_id31" class="form-control selects31 Somon">
                                      <option   selected value="">Выберите</option>
                                      @foreach($safes as $safe)
                                          <option value="{{$safe->id}}">{{$safe->safe}}</option>
                                      @endforeach
                                  </select>
                              </div>
                              <div class="col-md-1">  <label for="shaving31">Шкаф	</label>
                                  <select name="shaving3[]"   id="shaving31" class="form-control selects31 Somon">

                                      <option   selected value="">Выберите </option>
                                  </select>
                              </div>
                              <div class="col-md-1   ">
                                  <label for="qator_id3[]">Ряд	</label>
                                  <select name="qator_id3[]"   id="qator_id31" class="form-control selects31 Somon">
                                      <option   selected value="">Выберите </option>

                                  </select>
                              </div>
                              <div class="col-md-2">
                                  <label for="cells31">Ячейка</label>
                                  <select name="cells3[]"   id="cells31" class="form-control selects31 Somon">


                                  </select>
                              </div>
                              <div class="col-md-3 mt-4">
                                  <button type="button"   class="btn btn-primary active" id="add3"    value="31" > <i class="align-middle" data-feather="plus"></i></button>
                                  <button   id="remove3" value="31" type="button"  class="btn btn-bitbucket active"><i class="align-middle" data-feather="trash-2"></i></button>
                                  <input type="hidden" value="1" id="total_chq31">
                              </div>
                          </div>
                             <div id="new_chq31"></div>
                  <div class="form-check form-switch  col-md-4 mt-4">
                      {{-- <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"  value="nepolniySomon3" >
                      <div class="form-check-label"  for="flexSwitchCheckChecked" >Неполный</div> --}}

                  </div>
                  <div id="sum31" class="col-md-3 offset-8   "  style="margin-top:-10px;" >   </div>
                  <div  id="nepolniySomon3">    </div>


                      </div>
                      <div class="tab-pane fade" id="Five" role="tabpanel" aria-labelledby="Five-tab">
                          <div class="row  mt-2" id="new51">
                              <input     id="nominal51"  value="5"    type="hidden"  name="nominal5[]"     >
                              <div class="col-md-2   ">
                                  <label for="edin_id">Единиц	</label>
                                  <select id="edin_id51" class="form-select selects51 Somon edin_id" name="ed_id5[]"  >
                                      <option value="">Интихоб</option>
                                      @foreach($sprEds as $sprEd)
                                          <option value="{{$sprEd->id}} " data-id="{{$sprEd->kol}}" >{{$sprEd->name}}
                                          </option>
                                      @endforeach
                                  </select>

                              </div>
                              <div class="col-md-1  ">
                                  <label for="count51">Кол-во	</label>
                                  <input      style="width: 05rem;" id="count51" data-type="0"  type="text"  name="count5[]" class="form-control Somon count">

                              </div>
                              <div class="col-md-1 ">
                                  <label for="safe_id51">Хранилище</label>
                                  <select name="safe_id5[]"   id="safe_id51" class="form-control selects51 Somon">
                                      <option   selected value="">Выберите</option>
                                      @foreach($safes as $safe)
                                          <option value="{{$safe->id}}">{{$safe->safe}}</option>
                                      @endforeach
                                  </select>
                              </div>
                              <div class="col-md-1">  <label for="shaving51">Шкаф	</label>
                                  <select name="shaving5[]"   id="shaving51" class="form-control selects51 Somon">


                                  </select>
                              </div>
                              <div class="col-md-1   ">
                                  <label for="qator_id51">Ряд	</label>
                                  <select name="qator_id5[]"   id="qator_id51" class="form-control selects51 Somon">
                                      <option   selected value="">Выберите </option>

                                  </select>
                              </div>
                              <div class="col-md-2">
                                  <label for="cells51">Ячейка</label>
                                  <select name="cells5[]"   id="cells51" class="form-control selects51 Somon">


                                  </select>
                              </div>
                              <div class="col-md-3 mt-4">
                                  <button type="button"   class="btn btn-primary active" id="add5"    value="51" > <i class="align-middle" data-feather="plus"></i></button>
                                  <button   id="remove5" value="51" type="button"  class="btn btn-bitbucket active"><i class="align-middle" data-feather="trash-2"></i></button>
                                  <input type="hidden" value="1" id="total_chq51">
                              </div>
                          </div>


                          <div id="new_chq51"></div>

                          <div class="form-check form-switch  col-md-4 mt-4">
                              {{-- <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"  value="nepolniySomon5" >
                              <div class="form-check-label"  for="flexSwitchCheckChecked" >Неполный</div> --}}

                          </div>
                          <div  id="nepolniySomon5">   </div>
                          <div id="sum51" class="col-md-4 offset-8" > </div>


                      </div>
                      <div class="tab-pane fade" id="Ten" role="tabpanel" aria-labelledby="ten-tab">
                          <div class="row  mt-2" id="newt">
                              <input     id="nominalt1"  value="10"    type="hidden"  name="nominalt[]"     >
                              <div class="col-md-2   ">
                                  <label for="edin_id">Единиц	</label>
                                  <select id="edin_idt1" class="form-select selectst1 Somon edin_id" name="ed_idt[]"  >
                                      <option value="">Интихоб</option>
                                      @foreach($sprEds as $sprEd)
                                          <option value="{{$sprEd->id}} " data-id="{{$sprEd->kol}}" >{{$sprEd->name}}
                                          </option>
                                      @endforeach
                                  </select>

                              </div>
                              <div class="col-md-1  ">
                                  <label for="countt1">Кол-во	</label>
                                  <input      style="width: 05rem;" id="countt1"  data-type="0" type="text"  name="countt[]" class="form-control Somon count">

                              </div>
                              <div class="col-md-1 ">
                                  <label for="safe_idt1">Хранилище</label>
                                  <select name="safe_idt[]"   id="safe_idt1" class="form-control selectst1 Somon">
                                      <option   selected value="">Выберите</option>
                                      @foreach($safes as $safe)
                                          <option value="{{$safe->id}}">{{$safe->safe}}</option>
                                      @endforeach
                                  </select>
                              </div>
                              <div class="col-md-1">  <label for="shavingt1">Шкаф	</label>
                                  <select name="shavingt[]"   id="shavingt1" class="form-control selectst1 Somon">


                                  </select>
                              </div>
                              <div class="col-md-1   ">
                                  <label for="qator_idt1">Ряд	</label>
                                  <select name="qator_idt[]"   id="qator_idt1" class="form-control selectst1 Somon">
                                      <option   selected value="">Выберите </option>

                                  </select>
                              </div>
                              <div class="col-md-2">
                                  <label for="cellst1">Ячейка</label>
                                  <select name="cellst[]"   id="cellst1" class="form-control selectst1 Somon">


                                  </select>
                              </div>
                              <div class="col-md-3 mt-4">
                                  <button type="button"   class="btn btn-primary active" id="addt"    value="t1" > <i class="align-middle" data-feather="plus"></i></button>
                                  <button   id="removet" value="t1" type="button"  class="btn btn-bitbucket active"><i class="align-middle" data-feather="trash-2"></i></button>
                                  <input type="hidden" value="1" id="total_chqt1">
                              </div>
                          </div>


                          <div id="new_chqt1"></div>
                          <div id="sumt1" class="col-md-3 offset-8   "  style="margin-top:-10px;" >   </div>
                          <div class="form-check form-switch  col-md-4 mt-4">
                              {{-- <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"  value="nepolniySomont" >
                              <div class="form-check-label"  for="flexSwitchCheckChecked" >Неполный</div> --}}

                          </div>
                          <div  id="nepolniySomont">   </div>
                           


                      </div>
                      <div class="tab-pane fade" id="Twelwe" role="tabpanel" aria-labelledby="tewlwe-tab">

                          <div class="row  mt-2" id="newb">
                              <input     id="nominalb1"  value="20"    type="hidden"  name="nominalb[]"     >
                              <div class="col-md-2   ">
                                  <label for="edin_id">Единиц	</label>
                                  <select id="edin_idb1" class="form-select selectsb1 Somon edin_id" name="ed_idb[]"  >
                                      <option value="">Интихоб</option>
                                      @foreach($sprEds as $sprEd)
                                          <option value="{{$sprEd->id}} " data-id="{{$sprEd->kol}}"  >{{$sprEd->name}}
                                          </option>
                                      @endforeach
                                  </select>

                              </div>
                              <div class="col-md-1  ">
                                  <label for="countb1">Кол-во	</label>
                                  <input      style="width: 05rem;" id="countb1"  data-type="0" type="text"  name="countb[]" class="form-control Somon count">

                              </div>
                              <div class="col-md-1 ">
                                  <label for="safe_idb1">Хранилище</label>
                                  <select name="safe_idb[]"   id="safe_idb1" class="form-control selectsb1 Somon">
                                      <option   selected value="">Выберите</option>
                                      @foreach($safes as $safe)
                                          <option value="{{$safe->id}}">{{$safe->safe}}</option>
                                      @endforeach
                                  </select>
                              </div>
                              <div class="col-md-1">  <label for="shavingb1">Шкаф	</label>
                                  <select name="shavingb[]"   id="shavingb1" class="form-control selectsb1 Somon">

                                      <option   selected value="">Выберите </option>
                                  </select>
                              </div>
                              <div class="col-md-1   ">
                                  <label for="qator_idb1">Ряд	</label>
                                  <select name="qator_idb[]"   id="qator_idb1" class="form-control selectsb1 Somon">
                                      <option   selected value="">Выберите </option>

                                  </select>
                              </div>
                              <div class="col-md-2">
                                  <label for="cellsb1">Ячейка</label>
                                  <select name="cellsb[]"   id="cellsb1" class="form-control selectsb1 Somon">
                                      <option   selected value="">Выберите </option>

                                  </select>
                              </div>
                              <div class="col-md-3 mt-4">
                                  <button type="button"   class="btn btn-primary active" id="addb"    value="b1" > <i class="align-middle" data-feather="plus"></i></button>
                                  <button   id="removeb" value="b1" type="button"  class="btn btn-bitbucket active"><i class="align-middle" data-feather="trash-2"></i></button>
                                  <input type="hidden" value="1" id="total_chqb1">
                              </div>
                          </div>


                          <div id="new_chqb1"></div>
                          <div id="sumb1" class="col-md-3 offset-8   "  style="margin-top:-10px;"  > </div>
                          <div class="form-check form-switch  col-md-4 mt-4">
                              {{-- <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"  value="nepolniySomonb" >
                              <div class="form-check-label"  for="flexSwitchCheckChecked" >Неполный</div> --}}

                          </div>
                          <div  id="nepolniySomonb">   </div>
                  


                      </div>
                      <div class="tab-pane fade" id="Fifty" role="tabpanel" aria-labelledby="fifty-tab">

                          <div class="row  mt-2" id="newc">
                              <input     id="nominalc1"  value="50"    type="hidden"  name="nominalc[]"     >
                              <div class="col-md-2   ">
                                  <label for="edin_id">Единиц	</label>
                                  <select id="edin_idc1" class="form-select selectsc1 Somon edin_id" name="ed_idc[]"  >
                                      <option value="">Интихоб</option>
                                      @foreach($sprEds as $sprEd)
                                          <option value="{{$sprEd->id}} " data-id="{{$sprEd->kol}}" >{{$sprEd->name}}
                                          </option>
                                      @endforeach
                                  </select>

                              </div>
                              <div class="col-md-1  ">
                                  <label for="countc1">Кол-во	</label>
                                  <input      style="width: 05rem;" id="countc1"   data-type="0" type="text"  name="countc[]" class="form-control Somon count">

                              </div>
                              <div class="col-md-1 ">
                                  <label for="safe_idc1">Хранилище</label>
                                  <select name="safe_idc[]"   id="safe_idc1" class="form-control selectsc1 Somon">
                                      <option   selected value="">Выберите</option>
                                      @foreach($safes as $safe)
                                          <option value="{{$safe->id}}">{{$safe->safe}}</option>
                                      @endforeach
                                  </select>
                              </div>
                              <div class="col-md-1">  <label for="shavingc1">Шкаф	</label>
                                  <select name="shavingc[]"   id="shavingc1" class="form-control selectsc1 Somon">


                                  </select>
                              </div>
                              <div class="col-md-1   ">
                                  <label for="qator_idc1">Ряд	</label>
                                  <select name="qator_idc[]"   id="qator_idc1" class="form-control selectsc1 Somon">
                                      <option  selected value="">Выберите </option>

                                  </select>
                              </div>
                              <div class="col-md-2">
                                  <label for="cellsc1">Ячейка</label>
                                  <select name="cellsc[]"   id="cellsc1" class="form-control selectsc1 Somon" >


                                  </select>
                              </div>
                              <div class="col-md-3 mt-4">
                                  <button type="button"   class="btn btn-primary active" id="addc"    value="c1" > <i class="align-middle" data-feather="plus"></i></button>
                                  <button   id="removec" value="c1" type="button"  class="btn btn-bitbucket active"><i class="align-middle" data-feather="trash-2"></i></button>
                                  <input type="hidden" value="1" id="total_chqc1">
                              </div>
                          </div>


                          <div id="new_chqc1"></div>
                        
                          <div class="form-check form-switch  col-md-4 mt-4">
                              {{-- <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"  value="nepolniySomonc" >
                              <div class="form-check-label"  for="flexSwitchCheckChecked" >Неполный</div> --}}

                          </div>
                          <div id="sumc1" class="col-md-3 offset-8 "  style="margin-top:-10px;" > </div>
                          <div  id="nepolniySomonc">   </div>

                     


                      </div>
                      <div class="tab-pane fade" id="Hundred" role="tabpanel" aria-labelledby="hundred-tab">

                          <div class="row  mt-2" id="newd">
                              <input     id="nominald1"  value="100"    type="hidden"  name="nominald[]"     >
                              <div class="col-md-2   ">
                                  <label for="edin_id">Единиц	</label>
                                  <select id="edin_idd1" class="form-select selectsd1 Somon edin_id" name="ed_idd[]"  >
                                      <option value="">Интихоб</option>
                                      @foreach($sprEds as $sprEd)
                                          <option value="{{$sprEd->id}} " data-id="{{$sprEd->kol}}" >{{$sprEd->name}}
                                          </option>
                                      @endforeach
                                  </select>

                              </div>
                              <div class="col-md-1  ">
                                  <label for="countcd">Кол-во	</label>
                                  <input      style="width: 05rem;" id="countd1"  data-type="0" type="text"  name="countd[]" class="form-control Somon count">

                              </div>
                              <div class="col-md-1 ">
                                  <label for="safe_idd1">Хранилище</label>
                                  <select name="safe_idd[]"   id="safe_idd1" class="form-control selectsd1 Somon">
                                      <option   selected value="">Выберите</option>
                                      @foreach($safes as $safe)
                                          <option value="{{$safe->id}}">{{$safe->safe}}</option>
                                      @endforeach
                                  </select>
                              </div>
                              <div class="col-md-1">  <label for="shavingd1">Шкаф	</label>
                                  <select name="shavingd[]"   id="shavingd1" class="form-control selectsd1 Somon">
                                      <option   selected value="">Выберите </option>

                                  </select>
                              </div>
                              <div class="col-md-1   ">
                                  <label for="qator_idd1">Ряд	</label>
                                  <select name="qator_idd[]"   id="qator_idd1" class="form-control selectsd1 Somon">
                                      <option   selected value="">Выберите </option>

                                  </select>
                              </div>
                              <div class="col-md-2">
                                  <label for="cellsd1">Ячейка</label>
                                  <select name="cellsd[]"   id="cellsd1" class="form-control selectsd1 Somon">


                                  </select>
                              </div>
                              <div class="col-md-3 mt-4">
                                  <button type="button"   class="btn btn-primary active" id="addd"    value="d1" > <i class="align-middle" data-feather="plus"></i></button>
                                  <button   id="removed" value="d1" type="button"  class="btn btn-bitbucket active"><i class="align-middle" data-feather="trash-2"></i></button>
                                  <input type="hidden" value="1" id="total_chqd1">
                              </div>
                          </div>


                          <div id="new_chqd1"></div>
                        
                          <div class="form-check form-switch  col-md-4 mt-4">
                              {{-- <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"  value="nepolniySomond" >
                              <div class="form-check-label"  for="flexSwitchCheckChecked" >Неполный</div> --}}

                          </div>
                          <div id="sumd1" class="col-md-3 offset-8 "  style="margin-top:-10px;"> </div>
                          <div  id="nepolniySomond">   </div>
                      

                      </div>
                      <div class="tab-pane fade" id="TwoHundred" role="tabpanel" aria-labelledby="TwoHundred-tab">

                          <div class="row  mt-2" id="newe">
                              <input     id="nominale1"  value="200"    type="hidden"  name="nominale[]"     >
                              <div class="col-md-2   ">
                                  <label for="edin_id">Единиц	</label>
                                  <select id="edin_ide1" class="form-select selectsd1 Somon edin_id" name="ed_ide[]"  >
                                      <option value="">Интихоб</option>
                                      @foreach($sprEds as $sprEd)
                                          <option value="{{$sprEd->id}} " data-id="{{$sprEd->kol}}" >{{$sprEd->name}}
                                          </option>
                                      @endforeach
                                  </select>

                              </div>
                              <div class="col-md-1  ">
                                  <label for="countce1">Кол-во	</label>
                                  <input      style="width: 05rem;" id="counte1"  data-type="0" type="text"  name="counte[] " class="form-control Somon count">

                              </div>
                              <div class="col-md-1 ">
                                  <label for="safe_ide1">Хранилище</label>
                                  <select name="safe_ide[]"   id="safe_ide1" class="form-control selectse1 Somon">
                                      <option   selected value="">Выберите</option>
                                      @foreach($safes as $safe)
                                          <option value="{{$safe->id}}">{{$safe->safe}}</option>
                                      @endforeach
                                  </select>
                              </div>
                              <div class="col-md-1">  <label for="shavinge1">Шкаф	</label>
                                  <select name="shavinge[]"   id="shavinge1" class="form-control selectse1 Somon">


                                  </select>
                              </div>
                              <div class="col-md-1   ">
                                  <label for="qator_ide1">Ряд	</label>
                                  <select name="qator_ide[]"   id="qator_ide1" class="form-control selectse1 Somon">
                                      <option   selected value="">Выберите </option>

                                  </select>
                              </div>
                              <div class="col-md-2">
                                  <label for="cellse1">Ячейка</label>
                                  <select name="cellse[]"   id="cellse1" class="form-control selectse1 Somon">


                                  </select>
                              </div>
                              <div class="col-md-3 mt-4">
                                  <button type="button"   class="btn btn-primary active" id="adde"    value="e1" > <i class="align-middle" data-feather="plus"></i></button>
                                  <button   id="removee" value="e1" type="button"  class="btn btn-bitbucket active"><i class="align-middle" data-feather="trash-2"></i></button>
                                  <input type="hidden" value="1" id="total_chqe1">
                              </div>
                          </div>


                          <div id="new_chqe1"></div>
                        
                          <div class="form-check form-switch  col-md-4 mt-4">
                              {{-- <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"  value="nepolniySomone" >
                              <div class="form-check-label"  for="flexSwitchCheckChecked" >Неполный</div> --}}

                          </div>
                          <div id="sume1" class="col-md-3 offset-8 "  style="margin-top:-10px;" > </div>
                          <div  id="nepolniySomone">   </div>
                       

                      </div>
                  
                    
                      <div class="tab-pane fade" id="Fiftyhundred" role="tabpanel" aria-labelledby="fiftyhundred-tab">
                        <div class="row  mt-2" id="newf">
                               <input     id="nominalf1"  value="500"    type="hidden"  name="nominalf[]"     >
                               <div class="col-md-2   ">
                                   <label for="edin_id">Единиц	</label>
                                   <select id="edin_idf1" class="form-select selectsf1 Somon edin_id" name="ed_idf[]"  >
                                       <option value="">Интихоб</option>
                                       @foreach($sprEds as $sprEd)
                                           <option value="{{$sprEd->id}} " data-id="{{$sprEd->kol}}" >{{$sprEd->name}}
                                           </option>
                                       @endforeach
                                   </select>
 
                               </div>
                               <div class="col-md-1  ">
                                   <label for="countcf1">Кол-во	</label>
                                   <input      style="width: 05rem;" id="countf1"  data-type="0" type="text"  name="countf[]" class="form-control Somon count">
 
                               </div>
                               <div class="col-md-1 ">
                                   <label for="safe_idf1">Хранилище</label>
                                   <select name="safe_idf[]"   id="safe_idf1" class="form-control selectsf1 Somon">
                                       <option   selected value="">Выберите</option>
                                       @foreach($safes as $safe)
                                           <option value="{{$safe->id}}">{{$safe->safe}}</option>
                                       @endforeach
                                   </select>
                               </div>
                               <div class="col-md-1">  <label for="shavingf1">Шкаф	</label>
                                   <select name="shavingf[]"   id="shavingf1" class="form-control selectsf1 Somon">
 
 
                                   </select>
                               </div>
                               <div class="col-md-1   ">
                                   <label for="qator_idf1">Ряд	</label>
                                   <select name="qator_idf[]"   id="qator_idf1" class="form-control selectsf1 Somon">
                                       <option   selected value="">Выберите </option>
 
                                   </select>
                               </div>
                               <div class="col-md-2">
                                   <label for="cellsf1">Ячейка</label>
                                   <select name="cellsf[]"   id="cellsf1" class="form-control selectsf1 Somon">
                                       <option   selected value="">Выберите </option>
 
                                   </select>
                               </div>
                               <div class="col-md-3 mt-4">
                                   <button type="button"   class="btn btn-primary active" id="addf"    value="f1" > <i class="align-middle" data-feather="plus"></i></button>
                                   <button   id="removef" value="f1" type="button"  class="btn btn-bitbucket active"><i class="align-middle" data-feather="trash-2"></i></button>
                                   <input type="hidden" value="1" id="total_chqf1">
                               </div>
                           </div>
 
 
                           <div id="new_chqf1"></div>
                       
                        
                           <div class="form-check form-switch  col-md-4 mt-4">
                               {{-- <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"  value="nepolniySomonf" >
                               <div class="form-check-label"  for="flexSwitchCheckChecked" >Неполный</div> --}}
 
                           </div>
                           <div id="sumf1"  class="col-md-3 offset-8 "  style="margin-top:-15px;"> </div>
                           <div  id="nepolniySomonf">   </div>
                          
 
                   </div>

                       <div class="tab-pane fade" id="razne" role="tabpanel" aria-labelledby="razne-tab">
                        <div class="row  mt-2" id="newf">
                              
                             
                               <div class="col-md-1  ">
                                   <label for="countcf1">Сумма	</label>
                                   <input      style="width: 05rem;" id="countf1" data-type="0"  type="text"  name="summarazne" class="form-control Somon count">
 
                               </div>
                               <div class="col-md-1 ">
                                   <label for="safe_idf1">Хранилище</label>
                                   <select name="safe_idrazned"   id="safe_idr1" class="form-control selectsf1 Somon">
                                       <option   selected value="">Выберите</option>
                                       @foreach($safes as $safe)
                                           <option value="{{$safe->id}}">{{$safe->safe}}</option>
                                       @endforeach
                                   </select>
                               </div>
                               <div class="col-md-1">  <label for="shavingr1">Шкаф	</label>
                                   <select name="shavingrazne"   id="shavingr1" class="form-control selectsf1 Somon">
 
 
                                   </select>
                               </div>
                               <div class="col-md-1   ">
                                   <label for="qator_idr1">Ряд	</label>
                                   <select name="qator_idrazne"   id="qator_idr1" class="form-control selectsf1 Somon">
                                       <option   selected value="">Выберите </option>
 
                                   </select>
                               </div>
                               <div class="col-md-2">
                                   <label for="cellsf1">Ячейка</label>
                                   <select name="cellsrazne"   id="cellsr1" class="form-control selectsf1 Somon">
                                       <option   selected value="">Выберите </option>
 
                                   </select>
                               </div>
                           
                           </div>
 
 
                       
                       
                     
                          
 
                       </div>
                     
                  </div>
                             
                  <div class="accordion mt-5" id="accordionExample">
                      <div class="accordion-item">
                          <h2 class="accordion-header" id="headingOneD">
                              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">

                              </button>
                          </h2>
                          <div id="collapseOne" class="accordion-collapse collapse  " aria-labelledby="headingOneD" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                  <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
                                      <li class="nav-item">
                                          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#OneD" role="tab" aria-controls="home" aria-selected="true">1 дирам <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="gSomon"></i></a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="nav-link" id="FiveD-tab" data-toggle="tab" href="#FiveD" role="tab" aria-controls="FiveD" aria-selected="false">5 дирам <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="hSomon"></i></a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#TwintyD" role="tab" aria-controls="TwintyD" aria-selected="false">20 дирам <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="jSomon"></i></a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#FiftyD" role="tab" aria-controls="contact" aria-selected="false">50 дирам <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="kSomon"></i></a>
                                      </li>

                                  </ul>
                                  <div class="tab-content" id="myTabContent">
                                      <div class="tab-pane fade show active" id="OneD" role="tabpanel" aria-labelledby="home-tab">
{{--                                              1 dirami --}}
                                                
<div class="row  mt-2" id="newg">
    <input     id="nominalg1"  value="0.01"    type="hidden"  name="nominalg[]"     >
    <div class="col-md-2   ">
        <label for="edin_id">Единиц	</label>
        <select id="edin_idg1" class="form-select selectsd1 Somon edin_id" name="ed_idg[]"  >
            <option value="">Интихоб</option>
            @foreach($sprEds as $sprEd)
                <option value="{{$sprEd->id}} " data-id="{{$sprEd->kol}}" >{{$sprEd->name}}
                </option>
            @endforeach
        </select>

    </div>
    <div class="col-md-1  ">
        <label for="countcg1">Кол-во	</label>
        <input      style="width: 05rem;" id="countg1" data-type="0" data-type="0" type="text"  name="countg[] " class="form-control Somon count">

    </div>
    <div class="col-md-1 ">
        <label for="safe_ide1">Хранилище</label>
        <select name="safe_idg[]"   id="safe_idg1" class="form-control selectsg1 Somon">
            <option   selected value="">Выберите</option>
            @foreach($safes as $safe)
                <option value="{{$safe->id}}">{{$safe->safe}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-1">  <label for="shavinge1">Шкаф	</label>
        <select name="shavingg[]"   id="shavingg1" class="form-control selectsg1 Somon">


        </select>
    </div>
    <div class="col-md-1   ">
        <label for="qator_idg1">Ряд	</label>
        <select name="qator_idg[]"   id="qator_idg1" class="form-control selectsg1 Somon">
            <option   selected value="">Выберите </option>

        </select>
    </div>
    <div class="col-md-2">
        <label for="cellsg1">Ячейка</label>
        <select name="cellsg[]"   id="cellsg1" class="form-control selectsg1 Somon">


        </select>
    </div>
    <div class="col-md-3 mt-4">
        <button type="button"   class="btn btn-primary active" id="addg"    value="g1" > <i class="align-middle" data-feather="plus"></i></button>
        <button   id="removeg" value="g1" type="button"  class="btn btn-bitbucket active"><i class="align-middle" data-feather="trash-2"></i></button>
        <input type="hidden" value="1" id="total_chqg1">
    </div>
</div>


<div id="new_chqg1"></div>

<div class="form-check form-switch  col-md-4 mt-4">
    {{-- <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"  value="nepolniySomong" >
    <div class="form-check-label"  for="flexSwitchCheckChecked" >Неполный</div> --}}

</div>
<div id="sumg1" class="col-md-3 offset-8 "  style="margin-top:-10px;" > </div>
<div  id="nepolniySomong">   </div> 
{{-- End One diram --}}
</div>
                                      <div class="tab-pane fade " id="FiveD" role="tabpanel" aria-labelledby="FiveD-tab"> 
                                        
                                        <div class="row  mt-2" id="newh">
                                            <input     id="nominalh1"  value="0.05"    type="hidden"  name="nominalh[]"     >
                                            <div class="col-md-2   ">
                                                <label for="edin_id">Единиц	</label>
                                                <select id="edin_idh1" class="form-select selectsd1 Somon edin_id" name="ed_idh[]"  >
                                                    <option value="">Интихоб</option>
                                                    @foreach($sprEds as $sprEd)
                                                        <option value="{{$sprEd->id}} " data-id="{{$sprEd->kol}}" >{{$sprEd->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
              
                                            </div>
                                            <div class="col-md-1  ">
                                                <label for="counth1">Кол-во	</label>
                                                <input      style="width: 05rem;" id="counth1" data-type="0"  type="text"  name="counth[] " class="form-control Somon count">
              
                                            </div>
                                            <div class="col-md-1 ">
                                                <label for="safe_idh1">Хранилище</label>
                                                <select name="safe_idh[]"   id="safe_idh1" class="form-control selectsh Somon">
                                                    <option   selected value="">Выберите</option>
                                                    @foreach($safes as $safe)
                                                        <option value="{{$safe->id}}">{{$safe->safe}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-1">  <label for="shavingh1">Шкаф	</label>
                                                <select name="shavingh[]"   id="shavingh1" class="form-control selectsh Somon">
              
              
                                                </select>
                                            </div>
                                            <div class="col-md-1   ">
                                                <label for="qator_ide1">Ряд	</label>
                                                <select name="qator_idh[]"   id="qator_idh1" class="form-control selectsh Somon">
                                                    <option   selected value="">Выберите </option>
              
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="cellsh1">Ячейка</label>
                                                <select name="cellsh[]"   id="cellsh1" class="form-control selectsh Somon">
              
              
                                                </select>
                                            </div>
                                            <div class="col-md-3 mt-4">
                                                <button type="button"   class="btn btn-primary active" id="addh"    value="h1" > <i class="align-middle" data-feather="plus"></i></button>
                                                <button   id="removeh" value="h1" type="button"  class="btn btn-bitbucket active"><i class="align-middle" data-feather="trash-2"></i></button>
                                                <input type="hidden" value="1" id="total_chqh1">
                                            </div>
                                        </div>
              
              
                                        <div id="new_chqh1"></div>
                                      
                                        <div class="form-check form-switch  col-md-4 mt-4">
                                            {{-- <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"  value="nepolniySomonh" >
                                            <div class="form-check-label"  for="flexSwitchCheckChecked" >Неполный</div> --}}
              
                                        </div>
                                        <div id="sumh1" class="col-md-3 offset-8 "  style="margin-top:-10px;" > </div>
                                        <div  id="nepolniySomonh">   </div>
                                    </div>
                                      <div class="tab-pane fade " id="TwintyD" role="tabpanel" aria-labelledby="TwintyD-tab">  

                                        <div class="row  mt-2" id="newj">
                                            <input     id="nominalj1"  value="0.20"    type="hidden"  name="nominalj[]"     >
                                            <div class="col-md-2   ">
                                                <label for="edin_id">Единиц	</label>
                                                <select id="edin_idj1" class="form-select selectsd1 Somon edin_id" name="ed_idj[]"  >
                                                    <option value="">Интихоб</option>
                                                    @foreach($sprEds as $sprEd)
                                                        <option value="{{$sprEd->id}} " data-id="{{$sprEd->kol}}" >{{$sprEd->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
              
                                            </div>
                                            <div class="col-md-1  ">
                                                <label for="countcj1">Кол-во	</label>
                                                <input      style="width: 05rem;" id="countj1"  data-type="0" type="text"  name="countj[] " class="form-control Somon count">
              
                                            </div>
                                            <div class="col-md-1 ">
                                                <label for="safe_idj1">Хранилище</label>
                                                <select name="safe_idj[]"   id="safe_idj1" class="form-control selectsj1 Somon">
                                                    <option   selected value="">Выберите</option>
                                                    @foreach($safes as $safe)
                                                        <option value="{{$safe->id}}">{{$safe->safe}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-1">  <label for="shavinge1">Шкаф	</label>
                                                <select name="shavingj[]"   id="shavingj1" class="form-control selectsj1 Somon">
              
              
                                                </select>
                                            </div>
                                            <div class="col-md-1   ">
                                                <label for="qator_idh1">Ряд	</label>
                                                <select name="qator_idj[]"   id="qator_idj1" class="form-control selectsj1 Somon">
                                                    <option   selected value="">Выберите </option>
              
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="cellsj1">Ячейка</label>
                                                <select name="cellsj[]"   id="cellsj1" class="form-control selectsj1 Somon">
              
              
                                                </select>
                                            </div>
                                            <div class="col-md-3 mt-4">
                                                <button type="button"   class="btn btn-primary active" id="addj"    value="j1" > <i class="align-middle" data-feather="plus"></i></button>
                                                <button   id="removej" value="j1" type="button"  class="btn btn-bitbucket active"><i class="align-middle" data-feather="trash-2"></i></button>
                                                <input type="hidden" value="1" id="total_chqj1">
                                            </div>
                                        </div>
              
              
                                        <div id="new_chqj1"></div>
                                      
                                        <div class="form-check form-switch  col-md-4 mt-4">
                                            {{-- <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"  value="nepolniySomonj" >
                                            <div class="form-check-label"  for="flexSwitchCheckChecked" >Неполный</div> --}}
              
                                        </div>
                                        <div id="sumj1" class="col-md-3 offset-8 "  style="margin-top:-10px;" > </div>
                                        <div  id="nepolniySomonj">   </div>
                                      </div>


                                      {{-- Fifty 50 diram --}}
                                      <div class="tab-pane fade " id="FiftyD" role="tabpanel" aria-labelledby="FiftyD-tab"> 
                                        <div class="row  mt-2" id="newk">
                                            <input     id="nominalk1"  value="0.50"    type="hidden"  name="nominalk[]"     >
                                            <div class="col-md-2   ">
                                                <label for="edin_id">Единиц	</label>
                                                <select id="edin_idk1" class="form-select selectsd1 Somon edin_id" name="ed_idk[]"  >
                                                    <option value="">Интихоб</option>
                                                    @foreach($sprEds as $sprEd)
                                                        <option value="{{$sprEd->id}} " data-id="{{$sprEd->kol}}" >{{$sprEd->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
              
                                            </div>
                                            <div class="col-md-1  ">

                                                <label for="countce1">Кол-во	</label>
                                                <input      style="width: 05rem;" id="countk1"  data-type="0" type="text"  name="countk[] " class="form-control Somon count">
              
                                            </div>
                                            <div class="col-md-1">
                                                <label for="safe_ide1">Хранилище</label>
                                                <select name="safe_idk[]"   id="safe_idk1" class="form-control selectsk1 Somon">
                                                    <option   selected value="">Выберите</option>
                                                    @foreach($safes as $safe)
                                                        <option value="{{$safe->id}}">{{$safe->safe}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-1">  <label for="shavingk1">Шкаф	</label>
                                                <select name="shavingk[]"   id="shavingk1" class="form-control selectsk1 Somon">
              
              
                                                </select>
                                            </div>
                                            <div class="col-md-1   ">
                                                <label for="qator_ide1">Ряд	</label>
                                                <select name="qator_idk[]"   id="qator_idk1" class="form-control selectsk1 Somon">
                                                    <option   selected value="">Выберите </option>
              
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="cellsk1">Ячейка</label>
                                                <select name="cellsk[]"   id="cellsk1" class="form-control selectsk1 Somon">
              
              
                                                </select>
                                            </div>
                                            <div class="col-md-3 mt-4">
                                                <button type="button"   class="btn btn-primary active" id="addk"    value="k1" > <i class="align-middle" data-feather="plus"></i></button>
                                                <button   id="removek" value="k1" type="button"  class="btn btn-bitbucket active"><i class="align-middle" data-feather="trash-2"></i></button>
                                                <input type="hidden" value="1" id="total_chqk1">
                                            </div>
                                        </div>
              
              
                                        <div id="new_chqk1"></div>
                                      
                                        <div class="form-check form-switch  col-md-4 mt-4">
                                            {{-- <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"  value="nepolniySomonk" >
                                            <div class="form-check-label"  for="flexSwitchCheckChecked" >Неполный</div> --}}
              
                                        </div>
                                        <div id="sumk1" class="col-md-3 offset-8 "  style="margin-top:-10px;" > </div>
                                        <div  id="nepolniySomonk">   </div>    
                                    </div>

                                  </div>
                              </div>
                          </div>
                      </div>
                      </div>
                  <textarea name="comment" id="" cols="50" rows="3" class="form-control mt-1" placeholder="Коммент"></textarea>
                  <button   type="submit" id="submits"   class="btn btn-success mt-2  offset-10">Submit</button>
              </div>

          </div>
      </div>
  </div>
</form>
<form method="POST" action="{{route('fondunusable.store')}}">
    @csrf
    <input     value="1"   name="priznak" type="hidden">
    <input            name="kode_oper" type="hidden"   value="{{$kodeOper}}">
    <input            name="farsuda" type="hidden"   value="1" >
    <input type="hidden" name="src" value="4">
  <!-- Modal -->
<div class="modal fade" id="exampleModalCenter"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog  modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-3  ">
                    <label for="date">Дата	</label>
                    <input  type="datetime-local"readonly="readonly"     style="width: 11rem;"     value="<?php echo date('Y-m-d H:i:s'); ?>"     name="date" class="form-control"    >

                    <input     value="1"    name="priznak" type="hidden"    >
                    <input            name="kode_operRashod" type="hidden"   value="{{$kodeOper}}">
                    <input            name="KorshoyamRashod" type="hidden"   value="1" >

                </div>
             
                    <input type="hidden" name="kode_oper_oborRashod" value="{{$kodeOperObort }}">
           
              
                <div class="col-md-2">
                    <label for="count01">Номер Документ	</label>
                  
                    <input        type="text"  name="ndoc" class="form-control "  autocomplete="off" required>
                   
                </div>
                <label for="" class="offset-md-9 mt-4">  <span class="badge badge-light text-black "><h6><b>Общие сумма :  {{ $allsumkorshoyam }}</b></h6></span> </label>
         {{-- //Table ostatki  --}}
         <table class="table mt-2">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Хранилище</th>
                <th scope="col">Шкаф/Стилаж</th>
                <th scope="col">Катор</th>
                <th scope="col">Ячейка</th>
                <th scope="col">Единиц</th>
                <th scope="col">Наминал</th>
                <th scope="col">Сумма</th>
                <th scope="col">Сумма расход</th>
              </tr>
            </thead>
            <tbody>
               
                @php
               $i=1;//Initialize variable
              @endphp
                @foreach( $arrayResult AS  $ostatkiResults)
                @if($ostatkiResults->summa>0)
                <input type="hidden" name="id[]" value="{{$ostatkiResults->id}}">
                  <tr class="border-bottom" id="t{{$ostatkiResults->id}}">
                    <td> {{ $i}} </td>
                   
                    <?php  $i++ ?>
                    @foreach ($safes as $safe)
                                 
                    @if($ostatkiResults->safe_id===$safe->id) <td> <input type="hidden" name="safe{{$ostatkiResults->id}}" value="{{$safe->id}}">{{$safe->safe}}</td>  @endif
                    @endforeach
                    {{-- <td>{{ $ostatkiResults->safe_id }}</td> --}}
            
                    @foreach ( $shkafs as $shkaf)
           
                    @if($ostatkiResults->shkaf_id===$shkaf->id) <td><input type="hidden" name="shkaf{{$ostatkiResults->id}}" value="{{$shkaf->id}}">{{ $shkaf->shkaf }}</td>  @endif
                    @endforeach
                    @foreach ( $sprQators as $sprQator)
           
                    @if($ostatkiResults->qator_id===$sprQator->id) <td><input type="hidden" name="sprQator{{$ostatkiResults->id}}" value="{{$sprQator->id}}">{{ $sprQator->qator }}</td>  @endif
                    @endforeach
                    @foreach ( $sprCells as $sprCell )
           
                    @if($ostatkiResults->cell_id===$sprCell->id) <td><input type="hidden" name="sprCell{{$ostatkiResults->id}}" value="{{$sprCell->id}}">{{ $sprCell->cell }}</td>  @endif
                    @endforeach
                    @foreach ($sprEds as $sprEd )
           
                    @if($ostatkiResults->ed_id===$sprEd->id) <td><input type="hidden" name="sprEd{{$ostatkiResults->id}}" value="{{$sprEd->id}}" >{{ $sprEd->name }}</td>  @endif
                    @endforeach
              
                    <td> {{ $ostatkiResults->naminal=='razne'?'Разные':$ostatkiResults->naminal}} <input type="hidden"  id="naminal{{$ostatkiResults->id}}"  name="naminal{{$ostatkiResults->id}}" value="{{$ostatkiResults->naminal}}"></td>
                    <td ><label for="" id="sumr{{$ostatkiResults->id}}" class="{{$ostatkiResults->id}}"><input type="hidden" name="ostatkiResults{{$ostatkiResults->id}}" value="{{ $ostatkiResults->summa}}"> {{ $ostatkiResults->summa}}</label> сомони</td>
                    <td><input type="text" class="form-control col-md-4 summaR"  name="Summarashod{{$ostatkiResults->id}}[]" id="{{$ostatkiResults->id}}"></td>
                    
                  </tr>@endif
                 
                @endforeach
        </tbody>
         </table>

            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыт</button>
          <button type="submit" class="btn btn-primary" disabled>Save changes</button>
        </div>
      </div>
    </div>
  </div>
   </form>
      <div class="container">
          <div class="col-md-12">
            <div class="btn-group col-auto" role="group" aria-label="Basic example">
                <button type="button" onclick="this.form.reset();" class="btn btn-outline-primary" data-context="korshoyam" data-toggle="modal" data-target="#rashod" id="priznak" value="0">Приход </button>
                <button type="button" class="btn btn-outline-primary"   data-toggle="modal" data-target="#exampleModalCenter"  value="1">Расход</button>
                

            </div>
          </div>
      </div>



  {{--  Расход Модал--}}


   {{--        Oborot table end --}}
        {{--        Fond table Коршоям --}}
        <div class="col-12 col-lg-6 " id="korshoyam-Pul">

            <div class="card  ">
                <div class="card-body">
                    <h4>Коршоям</h4>

                    <br>
                    <table class="table col-md-auto">
                        <tbody><tr>
                            <th>#</th>
                            <th>Дата</th>
                            <th>Номер док</th>
                            <th>Номер счет</th>
                            <th>Признак</th>
                            <th>Сумма</th>
                             


                        </tr>
                        @php($krcount=1)
                
                        @foreach(json_decode($FondMoney->take(20),true) as $korshoyam)
                      
                        <?php 

    //print_r(array_map(function($value){return   $value['summa'];}, $korshoyam));
?>
                           @if(array_keys( array_count_values(array_map(function($value){return   $value['type'];},$korshoyam)))[0]==1 || array_keys( array_count_values(array_map(function($value){return   $value['src'];},$korshoyam)))[0]==1)
                        <tr zippy="mdoclist_1" id="mdoclist_1">
                           
                                  <td> <b>{{  $krcount++ }}</b>  </td>
                          
                            <td  id="kord{{array_keys(array_count_values(array_map(function($value){return   $value['kode_oper'];},$korshoyam)))[0]}}">{{date("d-m-Y H:i:s", strtotime(  array_keys( array_count_values(array_map(function($value){return   $value['date'];},$korshoyam)))[0]))}}</td>
                            <td  id="korfdoc{{array_keys(array_count_values(array_map(function($value){return   $value['kode_oper'];},$korshoyam)))[0]}}"> {{   array_keys( array_count_values(array_map(function($value){return   $value['n_doc'];},$korshoyam)))[0]}} </td>
                                                @foreach($sprAccounts AS $sprAccounti)


                                 @if($sprAccounti->id==array_keys( array_count_values(array_map(function($value){return   $value['src'];},$korshoyam)))[0])
                                    <td class="col-md-2" id="kornfc{{array_keys(array_count_values(array_map(function($value){return   $value['kode_oper'];},$korshoyam)))[0]}}">
                                        {{$sprAccounti->account  }} </td>
                                @endif
                            @endforeach
                            @if(array_keys( array_count_values(array_map(function($value){return   $value['priznak'];},$korshoyam)))[0]==0)
                            <td  id="kor{{array_keys(array_count_values(array_map(function($value){return   $value['kode_oper'];},$korshoyam)))[0]}}">Приход</td>
                            @endif
                            @if(array_keys( array_count_values(array_map(function($value){return   $value['priznak'];},$korshoyam)))[0]==1)
                            <td  id="kor{{array_keys(array_count_values(array_map(function($value){return   $value['kode_oper'];},$korshoyam)))[0]}}">Расход</td>
                            @endif
                           
                       
                                  <td class="col-md-4">

                                <a class=" link-primary       Fond_id"  href="#" data-toggle="modal" data-target="#Fonds"   data-id="kor"  id="{{array_keys(array_count_values(array_map(function($value){return   $value['kode_oper'];},$korshoyam)))[0]}} "  value="{{array_keys(array_count_values(array_map(function($value){return   $value['type'];},$korshoyam)))[0]}}">
                                <i class="text-dark fa fa-eye"></i>   {{   array_sum(array_map(function($value){return   $value['summa'];}, $korshoyam)) }}  </a></td>
                               
                                
                                 </tr>
                                 @endif
                         @endforeach

                        </tbody>
                    </table>
                    <div class="mt-4 offset-lg-10"><table><tbody><tr>
                                <td valign="middle">
                                         <button class="btn btn-secondary "data-toggle="modal"  data-target=".korshoyam_detal" id="korshoyam_pul">Подробонее</button>
                                </td>

                            </tr></tbody></table>
                    </div>
                </div>
            </div>
        </div>
        {{--         Fond Коршоям table end --}}
{{--modal 1 Коршоям Детализация--}}
<div class="modal fade bd-example-modal-lg" tabindex="-1" id="Fonds" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Детализация
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                
            </div>
            <div class="modal-body">
                <div class="row mb-3 mt-2">

                    <div class="col-md-3     offset-1 ">
                        <label for="dates">Дата	</label>
                        <input     id="fdate" disabled type="text" aria-describedby="Data" class="form-control"   >
                    </div>
                   
                    <div class="col-md-3">
                        <label for="fn_doc">Номер документ	</label>
                        <input     id="fn_doc" disabled type="text" aria-describedby="Data" class="form-control"   >
                    </div>
                    <div class="col-md-2 ">
                  
                        <label for="fschyot1">Счет 	</label>
                        <select name="account_id_out" id="fschyot1"  required  class="form-control schet1" disabled="">
                            <option   selected  id="fschyot" >Выберите счетов</option>
    
                        </select>
                    </div>
                    <div class="col-md-2 ">
                        <label for="fpriznak">Признак	</label>
                        <input     id="fpriznak" disabled type="text" aria-describedby="Data" class="form-control"   >
                    </div>
                </div>
                
                <div id="fondAjax">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Закрыт</button>
                {{-- <button type="button" class="btn btn-secondary" >Печать</button> --}}
            </div>
        </div>
    </div>
</div>
{{--modal1 end Коршоям Детализация--}}
@endsection

 

<script src="{{asset('js/ajax.min.js')}}"></script>
{{-- this sccript nepolnie input add --}}
<script src="{{asset('js/nepolnoeScript.js')}}"></script>
{{-- end this sccript nepolnie input add --}}
{{-- this sccript Checked validate click with submit  --}}
<script src="{{asset('js/submitValidate.js')}}"></script>
{{-- end this sccript Checked validate click with submit  --}}

{{-- this sccript count all Sum   --}}
<script src="{{asset('js/sumCounts.js')}}"></script>
{{-- end this sccript   count all Sum   --}}
{{-- this sccript count all Safe  safeshkaf    --}}
<script>
     $(document).ready(function() {
     //Safe ajax
     $(".Fond_id").click(function(){
            console.log("dd");
            $('#fpriznak').val('');
       
             var  kode_opers=$(this).attr('id');
             var  data=$(this).data('id');
             var  id_type=$(this).attr('value');
             var cnt=`#${data}nfc${kode_opers}`;
              
             //var id_accounted=$().text();
            var id_accounted=$(`#${data}nfc${kode_opers}`).text();
            var priznak=$(`#${data}${kode_opers}`).text();
            var date=$(`#${data}d${kode_opers}`).text();
            var doc=$(`#${data}fdoc${kode_opers}`).text();
            $('#fn_doc').val(doc);
            $('#fdate').val(date);
            $('#fpriznak').val(priznak);
            $('#fschyot').text(String(id_accounted));
        
     

                
             $.ajax({
                url: "{{route('FondTable.post')}}",
                method:"POST",
                dataType: 'html', 
                data:{
                    "_token": "{{ csrf_token() }}",
                    id:kode_opers,id_type:id_type,

                },
                success:function(fondDatas){


              
                  
                   $('#fondAjax').html(fondDatas);
                },
            });

    
    });
});
    $(document).on('change','[id^=safe_id]',function (){
    

     var  id_number= $(this).attr("id").substr(-2);
     $('#'+id_number.substr(-2,1)+'Somon').addClass("d-none");
     console.log(id_number.substr(-2,1));
     $("#"+$(this).attr('id')).removeClass("border-danger");
      var shaving=$("#shaving"+id_number);
     
      if(this.value>0)
      {
          $("#shaving"+id_number).html("");
          shaving.append("<option >Интихоб</option>");
     
          $.ajax({
              url: "{{route('shkafTable.post')}}",
              type:"POST",
              data:{
                  "_token": "{{ csrf_token() }}",
                  id:this.value
     
              },
              success:function(response){
     
     
                  for (const [key, value] of Object.entries(response)) {
                      var newMsgs='<option  value="'+value.id+'">'+value.shkaf+'</option>';
     
                      shaving.append(newMsgs);
     
                  }
     
              },
          });
      }else{
          $("#shaving"+id_number).html(" <option >Интихоб</option>");
     
      }
     });
     //Safe ajax end
     ///shaving ajax send
     $(document).on('change','[id^=shaving]',function (){
     
     
     var  id_number= $(this).attr("id").substr(-2);
     id_number.substr(-2,1);
     $("#"+$(this).attr('id')).removeClass("border-danger");
     $('#'+id_number.substr(-2,1)+'Somon').addClass("d-none");
      var qator=$("#qator_id"+id_number);
     
      if(this.value>0)
      {
          var safe=$("#safe_id"+id_number+" option:selected").val();
     
          qator.html("");
          qator.append("<option >Интихоб</option>");
     
          $.ajax({
              url: "{{route('qatorTable.post')}}",
              type:"POST",
              data:{
                  "_token": "{{ csrf_token() }}",
                  id_shkaf:this.value,safe_id:safe,
     
              },
              //safe_id
              success:function(response){
     
     
                  for (const [key, value] of Object.entries(response)) {
                      var newMsgs='<option  value="'+value.id+'">'+value.qator+'</option>';
     
                      qator.append(newMsgs);
     
                  }
     
              },
          });
      }else{
          qator.html(" <option >Интихоб</option>");
     
      }
     
     });
     //end ajax send shaving
     ///qator_id ajax send
     $(document).on('change','[id^=cells]',function (){
     var  id_number= $(this).attr("id").substr(-2);
     $('#'+id_number.substr(-2,1)+'Somon').addClass("d-none");
     $("#"+$(this).attr('id')).removeClass("border-danger");
     
     });
     $(document).on('change','[id^=qator_id]',function (){
     $("#"+$(this).attr('id')).removeClass("border-danger");
     var  id_number= $(this).attr("id").substr(-2);
     $('#'+id_number.substr(-2,1)+'Somon').addClass("d-none");
      var cell=$("#cells"+id_number);
      if(this.value>0)
      {
          //вактин$("#safe_id option:selected").val();
     
          var safe=$("#safe_id"+id_number+" option:selected").val();
          var shaving=$("#shaving"+id_number+" option:selected").val();
     
          cell.html("");
          cell.append("<option >Интихоб</option>");
     
          $.ajax({
              url: "{{route('cellsTable.post')}}",
              type:"POST",
              data:{
                  "_token": "{{ csrf_token() }}",
                  id_shkaf:shaving,qator_id:this.value,safe_id:safe,
     
              },
              //safe_id
              success:function(response){
     
     
                  for (const [key, value] of Object.entries(response)) {
                      var newMsgs='<option  value="'+value.id+'">'+value.cell+'</option>';
     
                      cell.append(newMsgs);
     
                  }
     
              },
          });
      }else{
          qator.html(" <option >Интихоб</option>");
     
      }
     
     });
     //end ajax send qator
     //clear counts
     $(document).on('change','[id^=edin_id]',function (){
     
     $("#"+$(this).attr('id')).removeClass("border-danger");
     var  id_number= $(this).attr("id").substr(-2);
     $('#'+id_number.substr(-2,1)+'Somon').addClass("d-none");
     $("#count"+id_number).val("");
     $("#sum"+id_number).html("");
     
     });</script>
{{-- end this sccript   count all Sum   --}}
<script src="js/FondRashod.js"></script>
 <script>

// his sccript   count all Sum   --}}
 
//  ddk").click(function(){




// var id_btn=$(this).val();

    
// //  console.log('.selects'+id_btn);
//  var idv=id_btn.substr(-2,1);

// var  new_btn=parseInt($('#total_chq'+id_btn).val())+1;
// var values=$("#total_chq"+id_btn).val();
// var counts=$("#count"+idv+values).val();
// // console.log("#count"+idv+values);


// console.log(selectValidation('.selects'+idv));

// if(selectValidation('.selects'+idv) && counts>0 && values<=9)
// {
// var   nominal= $('#'+'nominal'+id_number).val();
// var   nominalsss= $('input[id^=count]').val();
// var   edins= $("#edin_id"+id_number).val();


// var val_nominal=$("#nominal"+id_btn).val();
// var val_edin=$("#edin_id"+idv+values).val();
// var val_count=$("#count"+idv+values).val();

// var $safe_id = $("#safe_id"+id_btn+" > option").clone();
// var $edin_id = $("#edin_id"+id_btn+" > option").clone();


// var new_input='<div class="row  mt-2" id="new'+idv+new_btn+'"><div>';

// var edi= '<div class="col-md-2   ">  <div>';
// var select_edin='<select id="edin_id'+idv+new_btn+'"  class="form-select Somon selects edin_id'+id_btn+'  edin_id" name="ed_id'+idv+'[]" > </select>';
// var select_edin= $(select_edin).append($edin_id);
// var edinLabel='<label for="edin_id'+idv+new_btn+'">Единиц	</label>';
// var edins=$(edi).append(edinLabel,select_edin);
// var counts= '  <div class="col-md-1  "><label for="count'+idv+new_btn+'">Кол-во	</label><input      style="width: 05rem;" id="count'+idv+new_btn+'"   type="text"  name="count'+idv+'[]" class="form-control Somon  count"></div>';
//   // ..Хранилище тег
// var saf='<div class="col-md-2 "></div>';
// var safeLabel='<label for="safe_id0'+new_btn+'">Хранилище</label>';
// var safe_Select='<select name="safe_id'+idv+'[]"   id="safe_id'+idv+new_btn+'" style="width: 08rem;" class="form-control  Somon selects'+id_btn+'"></select>   <input     id="nominal'+val_nominal+'"  value="1" disabled  type="hidden"  name="nominal"     >';
// safe_Select=$(safe_Select).append($safe_id);
// var safes=$(saf).append(safeLabel,safe_Select);
// // ..Хранилище тег end
// var shkaf='<div class="col-md-2">  <label for="shaving0">Шкаф	</label><select style="width: 08rem;" name="shaving'+idv+'[]"   id="shaving'+idv+new_btn+'" class="form-control Somon selects'+id_btn+'"><select></div>';
// var ryad='<div class="col-md-2   "><label for="qator_id'+idv+new_btn+'">Ряд	</label><select name="qator_id'+idv+'[]" style="width: 08rem;"    id="qator_id'+idv+new_btn+'" class="form-control Somon selects'+id_btn+'"></select></div>';
// var cell='<div class="col-md-1   "> <label for="cells0'+new_btn+'">Ячейка</label> <select name="cells'+idv+'[]"   id="cells'+idv+new_btn+'" class="form-control  Somon selects'+id_btn+'"></select></div>    <input     id="nominal'+idv+new_btn+'"  value="1" disabled  type="hidden"  name="nominal"     >';



// var new_ip=$(new_input).append(edins,counts,safes,shkaf,ryad,cell);

// $('#new_chq'+id_btn).append(new_ip);



// $('#total_chq'+id_btn).val(new_btn);
// $('#edin_id'+idv+id_btn).append($safe_id);

// return;
// }
// $('.toast').toast('show');
// // });
 
 </script>
 
  <script src="{{asset('js/AddRemoveButton.js')}}"></script>
<script src="/js/Sprjs.js"></script>

