@extends('layouts.app')

@section('content')


 

<form method="POST" action="{{ route('FondInsert.post') }}" id="submit" >
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
                  <h5 class="modal-title" id="exampleModalLongTitle"> <div id="content"></div> <div id="textpriznak"></div></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">

                  <div class="row  offset-1">

                      <div class="col-md-3  ">
                          <label for="date">Дата	</label>
                          <input      type="datetime-local"readonly="readonly"     style="width: 11rem;"     value="<?php echo date('Y-m-d H:i:s'); ?>"   required name="date" type="date" aria-describedby="Data" class="form-control"   >

                          <input       id="valuepriznak"     name="priznak" type="hidden"    >
                          <input            name="kode_oper" type="hidden"   value="{{$kodOperf}}" >
                  
                          <input type="hidden" name="kode_oper_obor" value="{{$kodeOperObort }}">
                      </div>
                      <div class="col-md-2  ">

                          <span class=""></span>
                        

                          <div id="srcHome">
                              
                            </div>


                      </div>
                      <div class="col-md-2  offset-1">
                          <label for="count01">Номер Документ	</label>
                          <input        type="text"  name="ndoc" class="form-control " required>
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
                                            <label for="edin_id">Единиц	</label>
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
                                            <input      style="width: 05rem;" id="count01"   type="text"  name="count0[]" class="form-control  Somon  count">

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
                              <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"  value="nepolniySomon0" >
                              <div class="form-check-label"  for="flexSwitchCheckChecked" >Неполный</div>

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
                                  <input      style="width: 05rem;" id="count31"   type="text"  name="count3[]" class="form-control Somon count">

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
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"  value="nepolniySomon3" >
                      <div class="form-check-label"  for="flexSwitchCheckChecked" >Неполный</div>

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
                                  <input      style="width: 05rem;" id="count51"   type="text"  name="count5[]" class="form-control Somon count">

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
                              <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"  value="nepolniySomon5" >
                              <div class="form-check-label"  for="flexSwitchCheckChecked" >Неполный</div>

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
                                  <input      style="width: 05rem;" id="countt1"   type="text"  name="countt[]" class="form-control Somon count">

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
                              <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"  value="nepolniySomont" >
                              <div class="form-check-label"  for="flexSwitchCheckChecked" >Неполный</div>

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
                                  <input      style="width: 05rem;" id="countb1"   type="text"  name="countb[]" class="form-control Somon count">

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
                              <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"  value="nepolniySomonb" >
                              <div class="form-check-label"  for="flexSwitchCheckChecked" >Неполный</div>

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
                                  <input      style="width: 05rem;" id="countc1"   type="text"  name="countc[]" class="form-control Somon count">

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
                              <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"  value="nepolniySomonc" >
                              <div class="form-check-label"  for="flexSwitchCheckChecked" >Неполный</div>

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
                                  <input      style="width: 05rem;" id="countd1"   type="text"  name="countd[]" class="form-control Somon count">

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
                              <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"  value="nepolniySomond" >
                              <div class="form-check-label"  for="flexSwitchCheckChecked" >Неполный</div>

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
                                  <input      style="width: 05rem;" id="counte1"   type="text"  name="counte[] " class="form-control Somon count">

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
                              <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"  value="nepolniySomone" >
                              <div class="form-check-label"  for="flexSwitchCheckChecked" >Неполный</div>

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
                                   <input      style="width: 05rem;" id="countf1"   type="text"  name="countf[]" class="form-control Somon count">
 
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
                               <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"  value="nepolniySomonf" >
                               <div class="form-check-label"  for="flexSwitchCheckChecked" >Неполный</div>
 
                           </div>
                           <div id="sumf1"  class="col-md-3 offset-8 "  style="margin-top:-15px;"> </div>
                           <div  id="nepolniySomonf">   </div>
                          
 
                   </div>

                       <div class="tab-pane fade" id="razne" role="tabpanel" aria-labelledby="razne-tab">
                        <div class="row  mt-2" id="newf">
                              
                             
                               <div class="col-md-1  ">
                                   <label for="countcf1">Сумма	</label>
                                   <input      style="width: 05rem;" id="countf1"   type="text"  name="summarazne" class="form-control Somon count">
 
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
        <input      style="width: 05rem;" id="countg1"   type="text"  name="countg[] " class="form-control Somon count">

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
    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"  value="nepolniySomong" >
    <div class="form-check-label"  for="flexSwitchCheckChecked" >Неполный</div>

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
                                                <input      style="width: 05rem;" id="counth1"   type="text"  name="counth[] " class="form-control Somon count">
              
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
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"  value="nepolniySomonh" >
                                            <div class="form-check-label"  for="flexSwitchCheckChecked" >Неполный</div>
              
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
                                                <input      style="width: 05rem;" id="countj1"   type="text"  name="countj[] " class="form-control Somon count">
              
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
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"  value="nepolniySomonj" >
                                            <div class="form-check-label"  for="flexSwitchCheckChecked" >Неполный</div>
              
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
                                                <input      style="width: 05rem;" id="countk1"   type="text"  name="countk[] " class="form-control Somon count">
              
                                            </div>
                                            <div class="col-md-1 ">
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
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"  value="nepolniySomonk" >
                                            <div class="form-check-label"  for="flexSwitchCheckChecked" >Неполный</div>
              
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
  {{--  Расход Модал--}}

{{-- //End Fonds Modal --}}
 {{-- Оборот модалка --}}
<form role="form was-validated"    action="{{ route('oborotInsert.post') }}" method="post">
    <div class="modal fade  bd-example-modal-lg " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('Добавление нового оборот') }}</h5>

                </div>

              
                    @csrf

                    <input type="hidden" name="kod_oper" value="{{$kodeOpero}}">
                    {{-- <input type="hidden" name="kode_oper" value="{{$kodOperf}}"> --}}
                    <div class="row mb-3 mt-3">
                         <div class="container">
                             <div class="alert alert-danger alert-dismissible fade  " id="alerts">
                              <center>   <strong >Введите правильную сумму   !!</strong> .</center>
{{--                                 <button type="button" class="btn-close" data-bs-dismiss="alert"></button>--}}
                             </div>
                         </div>
                        <div class="col-md-3 offset-1">

                            <input    readonly="readonly" id="date" type="date"  value="<?php echo date('Y-m-d'); ?>" class="form-control" name="date"  >
                        </div>
                        <div class="col-md-3 ">
                            <select name="bik"       class="form-control " required>
                    <option value="">БИК выберите</option>
                
                        @foreach($bik AS $biks)
                    <option value="{{$biks->id}}">{{$biks->BIK}} ({{$biks->full_name}})  </option>
                                @endforeach

                            </select>
                       
                        </div>
                        <div class="col-md-3 ">
                            <input type="text" placeholder="Номер документ"  name="n_doc" class="form-control" required  >
                        </div>
                    </div>
                    <input type="hidden"  value="0"  name="priznak"  >
                    <input type="hidden"  value="7"  name="account_id_in"  >
                     
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
                                <button type="button" onclick="add()" class="btn btn-primary" id="adds" disabled> <i class="align-middle" data-feather="plus"></i></button>
                                <button onclick="remove()" type="button"  class="btn btn-bitbucket active"><i class="align-middle" data-feather="trash-2"></i></button>

                            </div>
                        <input type="hidden" value="1" id="total_chq">
                    </div>
                    <div id="new_chq" >

                    </div>
                      {{-- <div class="row offset-1 mt-2" >
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="safe_check"  >
                            <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                          </div>
                      </div> --}}
                        <div class="row offset-1 mt-2 d-none"  id="d-none" >




                            <div class="col-md-2 ">
                                <label for="safe_id51">Хранилище</label>
                                <select name="safe_id"   id="safe_id51" class="form-control selects51 Somon">
                                    <option   selected value="">Выберите</option>
                                    @foreach($safes as $safe)
                                        <option value="{{$safe->id}}">{{$safe->safe}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">  <label for="shaving51">Шкаф	</label>
                                <select name="shkaf_id"   id="shaving51" class="form-control selects51 Somon">


                                </select>
                            </div>
                            <div class="col-md-2   ">
                                <label for="qator_id51">Ряд	</label>
                                <select name="qator_id"   id="qator_id51" class="form-control selects51 Somon">
                                    <option   selected value="">Выберите </option>

                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="cells51">Ячейка</label>
                                <select name="cell_id"   id="cells51" class="form-control selects51 Somon">


                                </select>

                        </div>
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


               
            </div>
        </div>
    </div>
</form>
 {{-- Оборот модалка --}}
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <b><li class="breadcrumb-item active" aria-current="page">Главная /</li></b>
        </ol>
    </nav>
    @if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
    <div class="row">
        <div class="col-2  ">
            <div class="">
                <div class="info-box">
                

                    <div class="info-box-content">
                  
                        <center> <h4>  <a class="list-group-item-action" href="#oborot-Pul"> Оборот</a></h4>  
                        <button type="button" class="btn btn-outline-primary col-6 " data-toggle="modal" data-target="#exampleModalCenter" >Приход </button>
                     </center>
                       
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.info-box -->
    
        </div>
        <div class="col-2  ">
            <div class="info-box">
               

                <div class="info-box-content">
             
                <center> <h4>  <a class="list-group-item-action" href="#korshoyam-Pul"> Коршоям</a></h4>   </center>
                    <div class="btn-group col-auto" role="group" aria-label="Basic example">
                        <button type="button"  onclick="this.form.reset();" class="btn btn-outline-primary"  data-Context="korshoyam" data-toggle="modal" data-target="#rashod"   id="priznaki" value="0">Приход </button>
                        <button type="button" class="btn btn-outline-primary"  data-Context="korshoyam"  data-toggle="modal" data-target="#korshoyam"  id="priznaki" value="1">Расход</button>
      
                    </div>
                   
                 
                </div>
                <!--  .info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
       
        <div class="col-2 ">
            <div class="info-box">
                 

                <div class="info-box-content">
                    <center> <h4>  <a class="list-group-item-action" href="#farsuda-Pul"> Фарсуда</a></h4>   </center>
         


              
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#rashod" data-Context="farsuda"   id="priznaki" value="0">Приход </button>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#farsuda" data-Context="farsuda" id="priznaki" value="1">Расход</button>
      
                    </div>
                   
                 
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-2">
            <div class="info-box">
           

                <div class="info-box-content">
                    <center> <h4>  <a class="list-group-item-action" href="#botilshuda-Pul"> Ботилшуда</a></h4>   </center>
              
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal"  data-Context="botilshuda" data-target="#rashod"   id="priznaki" value="0">Приход </button>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#botilshuda"  data-Context="botilshuda"  id="priznak" value="1">Расход</button>
      
                    </div>
                   
                 
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
    </div>
    {{-- //Click Button Modalka Tanga  --}}
    <div class="row">
        {{-- //Tanga Oborot --}}
        <div class="col-2  ">
          
                <div class="info-box">
                

                    <div class="info-box-content">
                     <center> <h4>  <a class="list-group-item-action" href="#Oborot-Tanga">Танга Оборот</a></h4> 
                        <button type="button" class="btn btn-outline-primary col-6 " data-toggle="modal"  data-target="#ModalkaTangaOborot" >Приход </button>
                     </center>
                       
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            
            <!-- /.info-box -->
    
        </div>
 {{-- // End Tanga Oborot --}}

{{-- Tanga Korshoyam  --}}
        <div class="col-2  ">
            <div class="info-box">
               

                <div class="info-box-content">
         
                <center> <h4>  <a class="list-group-item-action" href="#korshoyam-Tanga">Танга Коршоям  </a></h4> </center>
                    <div class="btn-group col-auto" role="group" aria-label="Basic example">
                        <button type="button"  onclick="this.form.reset();" class="btn btn-outline-primary"  data-Type="Tanga" data-Context="korshoyam" data-toggle="modal" data-target="#rashodTanga"   id="priznaki" value="0">Приход </button>
                        <button type="button" class="btn btn-outline-primary"  data-Context="korshoyam" data-Type="Tanga"   data-toggle="modal" data-target="#rashodTanga"  id="priznaki" value="1">Расход</button>
      
                    </div>
                   
                 
                </div>
                <!--  .info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
{{--End  Tanga Korshoyam  --}}        

{{-- .. Tanga Farsuda  --}}

<div class="col-2 ">
    <div class="info-box">
         

        <div class="info-box-content">
         
            
               <center> <h4>  <a class="list-group-item-action" href="#farsuda-Tanga">Танга Фарсуда  </a></h4> </center>

      
                    <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#rashodTanga"  data-Type="Tanga" data-Context="farsuda"   id="priznaki" value="0">Приход </button>
                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#rashodTanga" data-Type="Tanga" data-Context="farsuda" id="priznaki" value="1">Расход</button>

                    </div>
           
         
                </div>
        <!-- /.info-box-content -->
            </div>
    <!-- /.info-box -->
        </div>
             {{-- Tanga Botilshuda  --}}
             <div class="col-2">
                <div class="info-box">
               
    
                    <div class="info-box-content">
                        <center> <h4>  <a class="list-group-item-action" href="#korshoyam-Tanga">Танга Ботилшуда</a></h4> </center>
                     
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal"  data-Type="Tanga" data-Context="botilshuda" data-target="#rashodTanga"   id="priznaki" value="0">Приход </button>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-Type="Tanga" data-target="#rashodTanga"  data-Context="botilshuda"  id="priznaki" value="1">Расход</button>
                                
                        </div>
                       
                     
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

          {{-- End Tanga Botilshuda    --}}

    </div>    
       {{-- // End Click Button Modalka Tanga  --}}
         {{-- //Modalka rashod Botilshu farsuda korshoyab anad tanga  --}}
  {{-- //Korshoyam --}}
     
          <!-- Modal -->
        <div class="modal fade" id="korshoyam"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            
            @include('fonds.fondunusable.korshoyamRashod')
           
          </div>
         

{{-- korshoyam rashod --}}
  {{-- //farsuda --}}
     
          <!-- Modal -->
          <div class="modal fade" id="farsuda"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            
            @include('fonds.fondwornou.FarsudaRashod')
           
          </div>
         

{{-- farsuda rashod --}}
  {{-- //farsuda --}}
     
          <!-- Modal -->
          <div class="modal fade" id="botilshuda"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            
            @include('fonds.fondcancled.botilshudaRashod')
           
          </div>
         

{{-- farsuda rashod --}}

   {{-- //end zModalka rashod Botilshu farsuda korshoyab anad tanga  --}}




            {{-- Modalka Tanga --}}
            <form      action="{{ route('oborotInsertTanga.post') }}" id="TangaSumbit" method="post">
                <div class="modal fade  bd-example-modal-xl " id="ModalkaTangaOborot" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">{{ __('Добавление нового оборот') }}</h5>
            
                            </div>
            
                          
                                @csrf
            
                                <input type="hidden" name="kod_oper" value="{{$kodeOperObortTanga}}">
                                {{-- <input type="hidden" name="kode_oper" value="{{$kodOper}}"> --}}
                                <div class="row mb-3 mt-3">
                                     <div class="container">
                                         <div class="alert alert-danger alert-dismissible fade  " id="alerts">
                                          <center>   <strong >Введите правильную сумму   !!</strong> .</center>
            {{--                                 <button type="button" class="btn-close" data-bs-dismiss="alert"></button>--}}
                                         </div>
                                     </div>
                                    <div class="col-md-3 offset-1">
            
                                        <input    readonly="readonly" id="date" type="date"  value="<?php echo date('Y-m-d'); ?>" class="form-control" name="date"  >
                                    </div>
                                    <div class="col-md-3 ">
                                        <select name="bik"       class="form-control " required>
                                <option value="">БИК выберите</option>
                            
                                    @foreach($bik AS $biks)
                                <option value="{{$biks->id}}">{{$biks->BIK}} ({{$biks->full_name}})  </option>
                                            @endforeach
            
                                        </select>
                                   
                                    </div>
                                    <div class="col-md-1">

                                        <span class=""></span>
                                      
              
              
              
                                    </div>
                                    <div class="col-md-3 ">
                                        <input type="text" placeholder="Номер документ"  name="n_doc" class="form-control" required  >
                                    </div>
                                </div>
                                <input type="hidden"  value="0"  name="priznak"  >
                                <input type="hidden"  value="7"  name="account_id_in"  >
                              
                                <div class="row  offset-1 mt-2">
                                    <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#OneDiramObor" role="tab" aria-controls="home" aria-selected="true">1 дирам <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="gSomon"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="FiveD-tab" data-toggle="tab" href="#FiveDiramObor" role="tab" aria-controls="FiveD" aria-selected="false">5 дирам <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="hSomon"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#TenDiramObor" role="tab" aria-controls="TenD" aria-selected="false">10 дирам <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="jSomon"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#TwintyDiramObor" role="tab" aria-controls="TwintyD" aria-selected="false">20 дирам <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="jSomon"></i></a>
                                        </li>
                                        
                                        <li class="nav-item">
                                          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#TwintyFiveDiramObor" role="tab" aria-controls="TwintyFiveD" aria-selected="false">25 дирам <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="cSomon"></i></a>
                                      </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#FiftyDiramObor" role="tab" aria-controls="contact" aria-selected="false">50 дирам <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="kSomon"></i></a>
                                        </li>
                                        <li class="nav-item">
                                          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#OneSTang" role="tab" aria-controls="OneS" aria-selected="false">1 сомони <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="0Somon"></i></a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#ThreeSTang" role="tab" aria-controls="ThreeS" aria-selected="false">3 сомони <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="3Somon"></i></a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#FiveSTang" role="tab" aria-controls="FiveS" aria-selected="false">5 сомони <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="5Somon"></i></a>
                                      </li>
                                  
                                    </ul>
                                    <input type="hidden" value="1" id="total_chq">
                                </div>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="OneDiramObor" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row  offset-1 mt-2">
                                            {{-- <div class="col-md-4  mt-2"> --}}
                                                 
                                                    {{-- <span class="input-group-text">Номинал</span> --}}
                     <input   value="0.1"    type="hidden"   class="form-control nomcou  summaTangaOne" aria-describedby="btnGroupAddon" name="nominaOneD"  >
                    
                                            
                    
                    
                    
                                                     {{-- </div> --}}
                    
                                            <div class="col-md-4 mt-2 ">
                                                <div class="input-group">
                                                    <span class="input-group-text">Сумма</span>
                                                    <input       type="text" id="summaTangaOne" class="form-control count  " aria-describedby="btnGroupAddon" name="summaTangaOne"  >
                    
                                                </div>
                    
                                                <div class="input-group-tex t" id="btnGroupAddon" disabled ></div>
                    
                                            </div>
                     
                                       
                                        </div>
                                        <div id="summaTangaOneAddnew" >
                    
                                        </div>
                                    </div>
                                    <div class="tab-pane fade    " id="FiveDiramObor" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row  offset-1 mt-2">
                                        <input   value="0.5"    type="hidden"   class="form-control nomcou  summaTangaFive"   name="nominalFiveD"  >
                    
                                            
                    
                    
                    
                                                     {{-- </div> --}}
                    
                                            <div class="col-md-4 mt-2  ">
                                                <div class="input-group">
                                                    <span class="input-group-text">Сумма</span>
                                                    <input       type="text" id="summaTangaFive" class="form-control"  name="summaTangaFive"  >
                    
                                                </div>
                    
                                            </div>
                    
                                            </div>
                                    </div>
                                    
                                    <div class="tab-pane fade    " id="TenDiramObor" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row  offset-1 mt-2">
                                            <input   value="0.10"    type="hidden"   class="form-control nomcou  summaTangaTenD"   name="nominalTenD"  >
                        
                                                
                        
                        
                        
                                                         {{-- </div> --}}
                        
                                                <div class="col-md-4 mt-2  ">
                                                    <div class="input-group">
                                                        <span class="input-group-text">Сумма</span>
                                                        <input       type="text" id="summaTangaTwinty" class="form-control"  name="summaTangaTenD"  >
                        
                                                    </div>
                        
                                                </div>
                        
                                          </div>
                                    </div>
                                    
                                    <div class="tab-pane fade    " id="TwintyDiramObor" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row  offset-1 mt-2">
                                            <input   value="0.20"    type="hidden"   class="form-control nomcou  summaTangaTwinty"   name="nominalTwentyD"  >
                        
                                                
                        
                        
                        
                                                         {{-- </div> --}}
                        
                                                <div class="col-md-4 mt-2  ">
                                                    <div class="input-group">
                                                        <span class="input-group-text">Сумма</span>
                                                        <input       type="text" id="summaTangaTwinty" class="form-control"  name="summaTangaTwinty"  >
                        
                                                    </div>
                        
                                                </div>
                        
                                          </div>
                                    </div>
                                    <div class="tab-pane fade    " id="TwintyFiveDiramObor" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row  offset-1 mt-2">
                                            <input   value="0.25"    type="hidden"   class="form-control nomcou  summaTangaTwintyFive"   name="nominalTwintyFive"  >
                        
                                                
                        
                        
                        
                                                         {{-- </div> --}}
                        
                                                <div class="col-md-4 mt-2  ">
                                                    <div class="input-group">
                                                        <span class="input-group-text">Сумма</span>
                                                        <input       type="text" id="summaTangaTwintyFive" class="form-control"  name="summaTangaTwintyFive"  >
                        
                                                    </div>
                        
                                                </div>
                        
                                                </div>
                                    </div>
                                    <div class="tab-pane fade    " id="FiftyDiramObor" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row  offset-1 mt-2">
                                            <input   value="0.50"    type="hidden"   class="form-control nomcou  summaTangaFifty"   name="nominalFifty"  >
                        
                                                
                        
                        
                        
                                                         {{-- </div> --}}
                        
                                                <div class="col-md-4 mt-2  ">
                                                    <div class="input-group">
                                                        <span class="input-group-text">Сумма</span>
                                                        <input       type="text" id="summaTangaFifty" class="form-control"  name="summaTangaFifty"  >
                        
                                                    </div>
                        
                                                </div>
                        
                                                </div>
                                    </div>
                                    <div class="tab-pane fade    " id="OneSTang" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row  offset-1 mt-2">
                                            <input   value="1"    type="hidden"   class="form-control nomcou  summaTangaOneS"   name="nominalOneS"  >
                        
                                                
                        
                        
                        
                                                         {{-- </div> --}}
                        
                                                <div class="col-md-4 mt-2  ">
                                                    <div class="input-group">
                                                        <span class="input-group-text">Сумма</span>
                                                        <input       type="text" id="summaTangaOneS" class="form-control"  name="summaTangaOneS"  >
                        
                                                    </div>
                        
                                                </div>
                        
                                                </div>
                                    </div>
                                    <div class="tab-pane fade    " id="ThreeSTang" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row  offset-1 mt-2">
                                            <input   value="3"    type="hidden"   class="form-control nomcou  summaTangaThrees"   name="nominalThrees"  >
                        
                                                
                        
                        
                        
                                                         {{-- </div> --}}
                        
                                                <div class="col-md-4 mt-2  ">
                                                    <div class="input-group">
                                                        <span class="input-group-text">Сумма</span>
                                                        <input       type="text" id="summaTangaThreeS" class="form-control"  name="summaTangaThrees"  >
                        
                                                    </div>
                        
                                                </div>
                        
                                                </div>
                                    </div>
                                    <div class="tab-pane fade    " id="FiveSTang" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row  offset-1 mt-2">
                                            <input   value="5"    type="hidden"   class="form-control nomcou  summaTangaFiveS"   name="nominalFiveS"  >
                        
                                                
                        
                        
                        
                                                         {{-- </div> --}}
                        
                                                <div class="col-md-4 mt-2  ">
                                                    <div class="input-group">
                                                        <span class="input-group-text">Сумма</span>
                                                        <input       type="text" id="summaTangaFiveS" class="form-control"  name="summaTangaFiveS"  >
                        
                                                    </div>
                        
                                                </div>
                        
                                                </div>
                                    </div>
                               
                                
                                </div>
                                <div class="col-md-4 offset-6 mt-2" id="AllSummaTanga"></div>
                                  {{-- <div class="row offset-1 mt-2" >
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="safe_check"  >
                                        <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                                      </div>
                                  </div> --}}
                            
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
                                            <button type="submit" class="btn btn-primary addform" disabled>
                                                {{ __('Добавить') }}
                                            </button>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-light offset-11" data-dismiss="modal">Закрыт</button>
            
                                </div>
            
            
                           
                        </div>
                    </div>
                </div>
            </form>
            {{-- End Modalka Tanga  --}}


 
    <div class="row  mt-3">
     
   

{{--        Oborot table --}}
        <div class="col-12 col-lg-6 " id="oborot-Pul">

            <div class="card ">
                <div class="card-body">
                    <h4>Оборот</h4>

                    <br>
{{--                    Oborot table limit 20 //--}}
                    <table class="table col-md-auto">
                        <tbody><tr class="something">
                            <th  >#</th>
                            <th class="col-md-3">Дата</th>
                            <th>Бик</th>
                            <th>Признак</th>
                            <th>Номер док</th>
                            <th>Номер счета</th>
                            <th>Сумма</th>
                        </tr>
                        @php($count=0)
                        @foreach(json_decode($response->groupBy('kod_oper')->take(20),true) AS  $oborots   )

                            @php($count++)



                        <tr>
                            <input type="hidden"  value="{{array_keys( array_count_values(array_map(function($value){return   $value['priznak'];},$oborots)))[0]}}">
                            <td> <b>{{  $count }}</b>  </td>
                 <td  > {{date("d-m-Y H:i:s", strtotime(  array_keys( array_count_values(array_map(function($value){return   $value['date'];},$oborots)))[0]))}} </td>
                 @foreach($bik AS $biks)

    
         @if($biks->id===array_map(function($value){return   $value['bik'];},$oborots)[0])
             <td class="col-md-2"  >
                 {{ $biks->full_name }} 
                </td>
          @else
          <td></td>
          @endif

     @endforeach
                 @if(array_keys(array_count_values(array_map(function($value){return   $value['priznak'];},$oborots)))[0]==0)
                 <td class="col-md-2 " > Приход </td>
                 @else
                     <td  > Расход</td>
                   
                 @endif
               
                            <td>{{array_keys( array_count_values(array_map(function($value){return   $value['n_doc'];},$oborots)))[0]}} </td>
                            @foreach($sprAccounts AS $sprAccount)


                                @if($sprAccount->id===array_keys(array_count_values(array_map(function($value){return   $value['account_id_in'];},$oborots)))[0])
                                    <td class="col-md-2"  >
                                        {{ $sprAccount->account }} </td>
                                @endif
                            @endforeach
                            <td class="col-md-4 ">

                                <a class=" link-primary       Oborot_id "  href="#" data-toggle="modal" data-target="#AjaxTableOborot"   id="{{array_keys(array_count_values(array_map(function($value){return   $value['kod_oper'];},$oborots)))[0]}} "  value="{{array_keys(array_count_values(array_map(function($value){return   $value['kod_oper'];},$oborots)))[0]}}">
                        <i class="text-dark fa fa-eye"></i>     {{   array_sum(array_map(function($value){return   $value['summa'];}, $oborots)) }}  </a></td>


                        </tr>

                        @endforeach

                        </tbody>
                    </table>
                    <div  >
                        <table class="mt-4 offset-lg-10"><tbody><tr>
                                <td>
                               <a href="#?type_id=oborot_pul">
                                <button class="btn btn-secondary "data-toggle="modal"  data-target=".Oborot_detal" id="oborot_pul">Подробонее</button>
                               </a>
                                </td>

                            </tr></tbody></table>
                    </div>
                </div>
            </div>
        </div>
          <input type="hidden" id="podrobnee">
{{-- detal Oborot --}} 
 
{{-- //style="display: block; padding-right: 17px;" --}}
<div class="modal fade Oborot_detal show" tabindex="-1" role="dialog"       aria-labelledby="myLargeModalLabel" aria-hidden="true"  >
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="card-body">
            <h4>Оборот</h4>
        </div>
        <section class="oborot_pul">
        @include('oborot.pagination')
        </section>  
 
        <div class="modal-footer flex-row">
                     
              
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыт</button>
          
          </div>
    </div>
  </div>
</div>

{{-- detal Oborot --}}
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
                                        {{$sprAccounti->name  }} </td>
                                @endif
                            @endforeach
                            @if(array_keys( array_count_values(array_map(function($value){return   $value['priznak'];},$korshoyam)))[0]==0)
                            <td  id="kor{{array_keys(array_count_values(array_map(function($value){return   $value['kode_oper'];},$korshoyam)))[0]}}">Приход</td>
                            @endif
                            @if(array_keys( array_count_values(array_map(function($value){return   $value['priznak'];},$korshoyam)))[0]==1)
                            <td  id="kor{{array_keys(array_count_values(array_map(function($value){return   $value['kode_oper'];},$korshoyam)))[0]}}">Расход</td>
                            @endif
                           
                       
                                  <td class="col-md-4 ">

                                <a class=" link-primary       Fond_id "  href="#" data-toggle="modal" data-target="#Fonds"   data-id="kor"  id="{{array_keys(array_count_values(array_map(function($value){return   $value['kode_oper'];},$korshoyam)))[0]}} "  value="{{array_keys(array_count_values(array_map(function($value){return   $value['type'];},$korshoyam)))[0]}}">
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
        {{-- detal Korshoyam --}} 
 
{{-- //style="display: block; padding-right: 17px;" --}}
<div class="modal fade korshoyam_detal show" tabindex="-1" role="dialog"       aria-labelledby="myLargeModalLabel" aria-hidden="true"  >
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
          <div class="card-body">
              <h4>Коршоям</h4>
          </div>
          <section class="oborot_pul">
          @include('oborot.pagination')
          </section>  
   
          <div class="modal-footer flex-row">
                       
                
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыт</button>
            
            </div>
      </div>
    </div>
  </div>
  
  {{-- detal Korshoyam --}}
         {{--        Fond table Farsuda --}}
         <div class="col-12 col-lg-6 " id="farsuda-Pul">

            <div class="card  ">
                <div class="card-body">
                    <h4>Фарсуда</h4>

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
                        @php($frcount=1)
                        <?php
                        //         echo "<pre>";
                        //         print_r(json_decode($FondMoney,true));
                        //         echo "</pre>";
                        //  // echo   array_sum(array_map(function($value){return   $value['summa'];}, json_decode($FondMoney,true)[0][0]));
                        //         exit;
                                ?>
                        @foreach(json_decode($FondMoney->take(20),true) as $farsud)
                      
                        <?php 

    //print_r(array_map(function($value){return   $value['summa'];}, $korshoyam));
?>
                           @if(array_keys( array_count_values(array_map(function($value){return   $value['type'];},$farsud)))[0]==2 || array_keys( array_count_values(array_map(function($value){return   $value['src'];},$farsud)))[0]==2)
                        <tr zippy="mdoclist_1" id="mdoclist_1">
                           
                                  <td> <b>{{  $frcount++ }}</b>  </td>
                          
                            <td  id="fard{{array_keys(array_count_values(array_map(function($value){return   $value['kode_oper'];},$farsud)))[0]}}">{{date("d-m-Y H:i:s", strtotime(  array_keys( array_count_values(array_map(function($value){return   $value['date'];},$farsud)))[0]))}}</td>
                            <td  id="farfdoc{{array_keys(array_count_values(array_map(function($value){return   $value['kode_oper'];},$farsud)))[0]}}"> {{   array_keys( array_count_values(array_map(function($value){return   $value['n_doc'];},$farsud)))[0]}} </td>
                                                @foreach($sprAccounts AS $sprAccounti)


                                 @if($sprAccounti->id==array_keys( array_count_values(array_map(function($value){return   $value['src'];},$farsud)))[0])
                                    <td class="col-md-2" id="farnfc{{array_keys(array_count_values(array_map(function($value){return   $value['kode_oper'];},$farsud)))[0]}}">
                                        {{$sprAccounti->name  }} </td>
                                @endif
                            @endforeach
                            @if(array_keys( array_count_values(array_map(function($value){return   $value['priznak'];},$farsud)))[0]==0)
                            <td  id="far{{array_keys(array_count_values(array_map(function($value){return   $value['kode_oper'];},$farsud)))[0]}}">Приход</td>
                            @endif
                            @if(array_keys( array_count_values(array_map(function($value){return   $value['priznak'];},$farsud)))[0]==1)
                            <td  id="far{{array_keys(array_count_values(array_map(function($value){return   $value['kode_oper'];},$farsud)))[0]}}">Расход</td>
                            @endif
                           
                       
                                  <td class="col-md-4 ">

                                <a class=" link-primary       Fond_id "  href="#" data-toggle="modal" data-target="#Fonds" data-id="far"   id="{{array_keys(array_count_values(array_map(function($value){return   $value['kode_oper'];},$farsud)))[0]}} "  value="{{array_keys(array_count_values(array_map(function($value){return   $value['type'];},$farsud)))[0]}}">
                                <i class="text-dark fa fa-eye"></i>   {{   array_sum(array_map(function($value){return   $value['summa'];}, $farsud)) }} </a></td>
                           
                                 </tr>
                                 @endif
                         @endforeach

                        </tbody>
                    </table>
                    <div class="mt-4 offset-lg-10"><table><tbody><tr>
                                <td valign="middle">
                                    
                                    <a href="#?type_id=farsuda_pul">
                                      
                                        <button class="btn btn-secondary "data-toggle="modal"  data-target=".farsuda_detal" id="farsuda_pul">Подробонее</button>
                                       </a>
                                 
                            </tr></tbody></table>
                    </div>
                </div>
            </div>
        </div>
        {{--         Fond Farsuda table end --}}
    {{--        Fond table Ботилшуда --}}
    <div class="col-12 col-lg-6 " id="botilshuda-Pul">

        <div class="card  ">
            <div class="card-body">
                <h4>Ботилшуда</h4>

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
                    @php($btcount=1)
                    <?php
                    //         echo "<pre>";
                    //         print_r(json_decode($FondMoney,true));
                    //         echo "</pre>";
                    //  // echo   array_sum(array_map(function($value){return   $value['summa'];}, json_decode($FondMoney,true)[0][0]));
                    //         exit;
                            ?>
                    @foreach(json_decode($FondMoney->take(20),true) as $korshoyam)
                   
                    <?php 

//print_r(array_map(function($value){return   $value['summa'];}, $korshoyam));
?>
                       @if(array_keys( array_count_values(array_map(function($value){return   $value['type'];},$korshoyam)))[0]==3 || array_keys( array_count_values(array_map(function($value){return   $value['src'];},$korshoyam)))[0]==3)
                    <tr zippy="mdoclist_1" id="mdoclist_1">
                       
                              <td> <b>{{  $btcount++ }}</b>  </td>
                      
                        <td  id="botld{{array_keys(array_count_values(array_map(function($value){return   $value['kode_oper'];},$korshoyam)))[0]}}">{{date("d-m-Y H:i:s", strtotime(  array_keys( array_count_values(array_map(function($value){return   $value['date'];},$korshoyam)))[0]))}}</td>
                        <td  id="botlfdoc{{array_keys(array_count_values(array_map(function($value){return   $value['kode_oper'];},$korshoyam)))[0]}}"> {{   array_keys( array_count_values(array_map(function($value){return   $value['n_doc'];},$korshoyam)))[0]}} </td>
                                            @foreach($sprAccounts AS $sprAccounti)


                             @if($sprAccounti->id==array_keys( array_count_values(array_map(function($value){return   $value['src'];},$korshoyam)))[0])
                                <td class="col-md-2" id="botlnfc{{array_keys(array_count_values(array_map(function($value){return   $value['kode_oper'];},$korshoyam)))[0]}}">
                                    {{$sprAccounti->name  }} </td>
                            @endif
                        @endforeach
                        @if(array_keys( array_count_values(array_map(function($value){return   $value['priznak'];},$korshoyam)))[0]==0)
                        <td  id="botl{{array_keys(array_count_values(array_map(function($value){return   $value['kode_oper'];},$korshoyam)))[0]}}">Приход</td>
                        @endif
                        @if(array_keys( array_count_values(array_map(function($value){return   $value['priznak'];},$korshoyam)))[0]==1)
                        <td  id="botl{{array_keys(array_count_values(array_map(function($value){return   $value['kode_oper'];},$korshoyam)))[0]}}">Расход</td>
                        @endif
                       
                   
                              <td class="col-md-4 ">

                            <a class=" link-primary       Fond_id "  href="#" data-toggle="modal" data-target="#Fonds"  data-id="botl"  id="{{array_keys(array_count_values(array_map(function($value){return   $value['kode_oper'];},$korshoyam)))[0]}} "  value="{{array_keys(array_count_values(array_map(function($value){return   $value['type'];},$korshoyam)))[0]}}">
                            <i class="text-dark fa fa-eye"></i>  {{   array_sum(array_map(function($value){return   $value['summa'];}, $korshoyam)) }} </a></td>
                       
                             </tr>
                             @endif
                     @endforeach

                    </tbody>
                </table>
                <div class="mt-4 offset-lg-10"><table><tbody><tr>
                            <td valign="middle">
                                
                                <button class="btn btn-secondary "data-toggle="modal"  data-target=".botilshuda_detal" id="botilshuda_pul">Подробонее</button>
                            </td>

                        </tr></tbody></table>
                </div>
            </div>
        </div>
    </div>
    {{--         Fond Ботилшуда table end --}}
    </div>
</div>
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
  


{{-- modal Ajax Table Oborot   --}}
<div class="modal fade" id="AjaxTableOborot" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Детализация</h5>

            </div>





            <div class="row mb-3 mt-2">

                <div class="col-md-3 offset-1  ">
                    <label for="dates">Дата	</label>
                    <input     id="dates" disabled type="text" aria-describedby="Data" class="form-control"   >
                </div>
                <div class="col-md-4 offset-1">
                    <label for="biks">БИК	</label>
                    <select   id="biks" aria-describedby="bik"class="form-control was-validated"disabled >

                        <option id="bik"  selected value="">  </option>



                    </select>
                </div>
            </div>
            <div class="row  offset-1">

                <div class="col-md-3  ">
                    <label for="priznak">Признак	</label>
                    <select id="priznak" required   class="form-control" disabled >

                        <option  id="priznaks"> </option>

                    </select>
                </div>
                <div class="col-md-4  ">
                    <label for="schet11">Номер счета 1	</label>
                    <select name="account_id_out" id="schet11"  required  class="form-control schet1" disabled="">
                        <option disabled selected  id="schet1" >Выберите счетов</option>

                    </select>
                </div>
                <div class="col-md-4  ">
                    <div >
                        <label for="schet21">Номер счета 2	</label>

                        <select name="" iid="schet21" class="form-control"  disabled  >
                            <option disabled selected id="schet2">Выберите счетов</option>

                        </select>
                    </div>
                </div>

            </div>

                <div id="ajaxoborot">

                </div>



                <input type="hidden" value="1" id="total_chq">

            <div id="new_chq" >

            </div>
            <div class="row  offset-lg-10 mt-2 ">


                <div class="col-md-5 mt-3">
                    <button type="button"   class="btn btn-light active" id="adds" disabled><div id="countsum"></div> </button>

                </div>
            </div>

            <br>



            <div class="modal-body">

            </div>
            <div class="modal-footer ">
                <div class="row mb-0 ">
                    <div class="col-md-8 justify-content-center">

                    </div>
                </div>
                <button type="button" class="btn btn-light offset-11" data-dismiss="modal">Закрыт</button>

            </div>



        </div>
    </div>
</div>
{{-- modal Ajax Table Oborot   end --}}





{{-- //Tanga  --}}

{{-- //Oborots Tanga  --}}




{{-- modal Ajax Table OborotTanga   --}}
<div class="modal fade" id="AjaxTableOborotTanga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Детализация</h5>

            </div>





            <div class="row mb-3 mt-2">

                <div class="col-md-3 offset-1  ">
                    <label for="dates">Дата	</label>
                    <input     id="Tangadates" disabled type="text" aria-describedby="Data" class="form-control"   >
                </div>
                <div class="col-md-2 ">
                    <label for="Tangabiks">Номер док		</label>
                    <select   id="Tangadocs" aria-describedby="bik"class="form-control was-validated"disabled >

                        <option id="Tangadoc"  selected value=""> Выберите</option>



                    </select>
                </div>
                
                <div class="col-md-4  ">
                    <label for="Tangabiks">БИК	</label>
                    <select   id="Tangabiks" aria-describedby="bik"class="form-control was-validated"disabled >

                        <option id="Tangabik"  selected value=""> Выберите</option>



                    </select>
                </div>
            </div>
            <div class="row  offset-1">

                <div class="col-md-3  ">
                    <label for="Tangapriznak">Признак	</label>
                    <select id="Tangapriznak" required   class="form-control" disabled >

                        <option  id="Tangapriznaks"> </option>

                    </select>
                </div>
                <div class="col-md-4  ">
                    <label for="schet11">Номер счета 1	</label>
                    <select name="account_id_out" id="Tangaschet11"  required  class="form-control schet1"  >
                        <option disabled selected  id="Tangaschets" >Выберите счетов</option>

                    </select>
                </div>
                <div class="col-md-4  ">
                    <div >
                        <label for="Tangaschet21">Номер счета 2	</label>

                        <select name="" id="Tangaschet21" class="form-control"  disabled  >
                            <option disabled selected id="Tangaschet2">Выберите счетов</option>

                        </select>
                    </div>
                </div>

            </div>

                <div id="Tangaajaxoborot">

                </div>



                <input type="hidden" value="1" id="Tangatotal_chq">

            <div id="Tanganew_chq" >

            </div>
            <div class="row  offset-lg-10 mt-2 ">


                <div class="col-md-5 mt-3">
                    <button type="button"   class="btn btn-light active" id="adds" disabled><div id="Tangacountsum"></div> </button>

                </div>
            </div>

            <br>



            <div class="modal-body">

            </div>
            <div class="modal-footer ">
                <div class="row mb-0 ">
                    <div class="col-md-8 justify-content-center">

                    </div>
                </div>
                <button type="button" class="btn btn-light offset-11" data-dismiss="modal">Закрыт</button>

            </div>



        </div>
    </div>
</div>
{{-- end modal Ajax Table Oborot   end --}}
{{-- Modalka Table OborotTanga  --}}
{{--        Oborot table --}}
<div class="container-fluid">
    <div class="shadow-lg p-3 mb-5 bg-body rounded mt-4"> <center><h3><b>ТАНГА</b></h3></center></div>
    <div class="row">
<div class="col-12 col-lg-6" id="Oborot-Tanga">
    
    <div class="card ">
        <div class="card-body">
            <h4>Оборот Танга </h4>

            <br>
{{--                    Oborot table limit 20 //--}}
            <table class="table col-md-auto">
                <tbody><tr class="something">
                    <th  >#</th>
                    <th class="col-md-3">Дата</th>
                    <th >БИК</th>
                    <th >Признак</th>
                    <th>Номер док</th>
                    <th>Номер счета 	</th>
                     <th>Сумма</th>
                </tr>
                @php($count=0)

    
                @foreach(json_decode($OborTanga->take(20),true) AS  $oborotsTanga   )

                    @php($count++)



                <tr>
                    <input type="hidden" id="Tangapr{{array_keys(array_count_values(array_map(function($value){return   $value['kod_oper'];},$oborotsTanga)))[0]}}" value="{{array_keys( array_count_values(array_map(function($value){return   $value['priznak'];},$oborotsTanga)))[0]}}">
                    <td> <b>{{  $count }}</b>  </td>
         <td id="Tangada{{array_keys(array_count_values(array_map(function($value){return   $value['kod_oper'];},$oborotsTanga)))[0]}}"> {{date("d-m-Y H:i:s", strtotime(  array_keys( array_count_values(array_map(function($value){return   $value['date'];},$oborotsTanga)))[0]))}} </td>
         @foreach($bik AS $biks)

    
         @if($biks->id===array_map(function($value){return   $value['bik'];},$oborotsTanga)[0])
             <td class="col-md-2" id="Tangabik{{array_keys(array_count_values(array_map(function($value){return   $value['kod_oper'];},$oborotsTanga)))[0]}}">
                 {{ $biks->full_name }} 
                </td>
          @else
          <td></td>
          @endif

     @endforeach
     
         @if(array_keys(array_count_values(array_map(function($value){return   $value['priznak'];},$oborotsTanga)))[0]==0)
         <td class="col-md-2 " id="TangaPriznak{{array_keys(array_count_values(array_map(function($value){return   $value['kod_oper'];},$oborotsTanga)))[0]}}"> Приход </td>
         @else
             <td id="TangaPriznak{{array_keys(array_count_values(array_map(function($value){return   $value['kod_oper'];},$oborotsTanga)))[0]}}"> Расход</td>
           
         @endif
     
                    <td id="Tangan_doc{{array_keys(array_count_values(array_map(function($value){return   $value['kod_oper'];},$oborotsTanga)))[0]}}">{{array_keys( array_count_values(array_map(function($value){return   $value['n_doc'];},$oborotsTanga)))[0]}} </td>
                    @foreach($sprAccounts AS $sprAccount)


                        @if($sprAccount->id===array_keys(array_count_values(array_map(function($value){return   $value['src'];},$oborotsTanga)))[0])
                            <td class="col-md-2" id="Tangaacn{{array_keys(array_count_values(array_map(function($value){return   $value['kod_oper'];},$oborotsTanga)))[0]}}">
                                {{ $sprAccount->name }} </td>
                        @endif
                    @endforeach
                    <td class="col-md-4 ">

                        <a class=" link-primary   Oborot_idTanga"  href="#" data-toggle="modal" data-target="#AjaxTableOborotTanga"   id="{{array_keys(array_count_values(array_map(function($value){return   $value['kod_oper'];},$oborotsTanga)))[0]}} "  value="{{array_keys(array_count_values(array_map(function($value){return   $value['kod_oper'];},$oborotsTanga)))[0]}}">
                <i class="text-dark fa fa-eye"></i>     {{   array_sum(array_map(function($value){return   $value['summa'];}, $oborotsTanga)) }}  </a></td>


                </tr>

                @endforeach

                </tbody>
            </table>
            <div  >
                <table class="mt-4 offset-lg-10"><tbody><tr>
                        <td  > <button class="btn btn-secondary "data-toggle="modal" data-target="#exampleModalLong">Подробонее</button></td>

                    </tr></tbody></table>
            </div>
        </div>
    </div>
</div>








{{--        Oborot table end --}}

{{-- //Oborots Tanga End --}}

{{-- //Korshoyam tanga  --}}
  {{--        Fond table Коршоям --}}
  <div class="col-12 col-lg-6 " id="korshoyam-Tanga">

    <div class="card">
        <div class="card-body">
            <h4>Танга Коршоям</h4>

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
                <?php
                //         echo "<pre>";
                //         print_r(json_decode($FondMoney,true));
                //         echo "</pre>";
                //  // echo   array_sum(array_map(function($value){return   $value['summa'];}, json_decode($FondMoney,true)[0][0]));
                //         exit;
                        ?>
                @foreach(json_decode($FondMoneyTang->take(20),true) as $korshoyamTanga)
              
                <?php 

//print_r(array_map(function($value){return   $value['summa'];}, $korshoyam));
?>
                                  
                   @if(array_keys( array_count_values(array_map(function($value){return   $value['type'];},$korshoyamTanga)))[0]==1 || array_keys( array_count_values(array_map(function($value){return   $value['src'];},$korshoyamTanga)))[0]==1)
                <tr  >
                   
                          <td> <b>{{  $krcount++ }}</b>  </td>
                  
                    <td  id="Tangakord{{array_keys(array_count_values(array_map(function($value){return   $value['kode_oper'];},$korshoyamTanga)))[0]}}">{{date("d-m-Y H:i:s", strtotime(  array_keys( array_count_values(array_map(function($value){return   $value['date'];},$korshoyamTanga)))[0]))}}</td>
                    <td  id="Tangakorfdoc{{array_keys(array_count_values(array_map(function($value){return   $value['kode_oper'];},$korshoyamTanga)))[0]}}"> {{   array_keys( array_count_values(array_map(function($value){return   $value['n_doc'];},$korshoyamTanga)))[0]}} </td>
                                        @foreach($sprAccounts AS $sprAccounti)


                         @if($sprAccounti->id==array_keys( array_count_values(array_map(function($value){return   $value['src'];},$korshoyamTanga)))[0])
                            <td class="col-md-2" id="Tangakornfc{{array_keys(array_count_values(array_map(function($value){return   $value['kode_oper'];},$korshoyamTanga)))[0]}}">
                                {{$sprAccounti->name  }} </td>
                        @endif
                    @endforeach
                    @if(array_keys( array_count_values(array_map(function($value){return   $value['priznak'];},$korshoyamTanga)))[0]==0)
                    <td  id="Tangakor{{array_keys(array_count_values(array_map(function($value){return   $value['kode_oper'];},$korshoyamTanga)))[0]}}">Приход</td>
                    @endif
                    @if(array_keys( array_count_values(array_map(function($value){return   $value['priznak'];},$korshoyamTanga)))[0]==1)
                    <td  id="Tangakor{{array_keys(array_count_values(array_map(function($value){return   $value['kode_oper'];},$korshoyamTanga)))[0]}}">Расход</td>
                    @endif
                   
               
                          <td class="col-md-4 ">

                        <a class=" link-primary       Fond_idTanga "  href="#" data-toggle="modal" data-target="#FondsTanga"   data-id="Tangakor"  id="{{array_keys(array_count_values(array_map(function($value){return   $value['kode_oper'];},$korshoyamTanga)))[0]}} "  value="{{array_keys(array_count_values(array_map(function($value){return   $value['type'];},$korshoyamTanga)))[0]}}">
                        <i class="text-dark fa fa-eye"></i>   {{   array_sum(array_map(function($value){return   $value['summa'];}, $korshoyamTanga)) }}  </a></td>
                       
                        
                         </tr>
                         @endif
                 @endforeach

                </tbody>
            </table>
            <div class="mt-4 offset-lg-10"><table><tbody><tr>
                        <td valign="middle"><button class="btn btn-secondary" data-toggle="modal" data-target=".bd-example-modal-lg " data-target="#exampleModalLong">Подробонее</button></td>

                    </tr></tbody></table>
            </div>
        </div>
    </div>



    
</div>
{{--         Fond Коршоям table end --}}

 {{--        Fond table Farsuda --}}
 <div class="col-12 col-lg-6 " id="farsuda-Tanga">

    <div class="card  ">
        <div class="card-body">
            <h4>Танга Фарсуда</h4>

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
                @php($frcount=1)
                <?php
                //         echo "<pre>";
                //         print_r(json_decode($FondMoney,true));
                //         echo "</pre>";
                //  // echo   array_sum(array_map(function($value){return   $value['summa'];}, json_decode($FondMoney,true)[0][0]));
                //         exit;
                        ?>
                @foreach(json_decode($FondMoneyTang->take(20),true) as $farsudTanga)
              
                <?php 

//print_r(array_map(function($value){return   $value['summa'];}, $korshoyam));
?>
                   @if(array_keys( array_count_values(array_map(function($value){return   $value['type'];},$farsudTanga)))[0]==2 || array_keys( array_count_values(array_map(function($value){return   $value['src'];},$farsudTanga)))[0]==2)
                <tr zippy="mdoclist_1" id="mdoclist_1">
                   
                          <td> <b>{{  $frcount++ }}</b>  </td>
                  
                    <td  id="Tangafard{{array_keys(array_count_values(array_map(function($value){return   $value['kode_oper'];},$farsudTanga)))[0]}}">{{date("d-m-Y H:i:s", strtotime(  array_keys( array_count_values(array_map(function($value){return   $value['date'];},$farsudTanga)))[0]))}}</td>
                    <td  id="Tangafarfdoc{{array_keys(array_count_values(array_map(function($value){return   $value['kode_oper'];},$farsudTanga)))[0]}}"> {{   array_keys( array_count_values(array_map(function($value){return   $value['n_doc'];},$farsudTanga)))[0]}} </td>
                                        @foreach($sprAccounts AS $sprAccounti)


                         @if($sprAccounti->id==array_keys( array_count_values(array_map(function($value){return   $value['src'];},$farsudTanga)))[0])
                            <td class="col-md-2" id="Tangafarnfc{{array_keys(array_count_values(array_map(function($value){return   $value['kode_oper'];},$farsudTanga)))[0]}}">
                                {{$sprAccounti->name  }} </td>
                        @endif
                    @endforeach
                    @if(array_keys( array_count_values(array_map(function($value){return   $value['priznak'];},$farsudTanga)))[0]==0)
                    <td  id="Tangafar{{array_keys(array_count_values(array_map(function($value){return   $value['kode_oper'];},$farsudTanga)))[0]}}">Приход</td>
                    @endif
                    @if(array_keys( array_count_values(array_map(function($value){return   $value['priznak'];},$farsudTanga)))[0]==1)
                    <td  id="Tangafar{{array_keys(array_count_values(array_map(function($value){return   $value['kode_oper'];},$farsudTanga)))[0]}}">Расход</td>
                    @endif
                   
               
                          <td class="col-md-4 ">

                        <a class=" link-primary       Fond_idTanga "  href="#" data-toggle="modal" data-target="#FondsTanga" data-id="Tangafar"   id="{{array_keys(array_count_values(array_map(function($value){return   $value['kode_oper'];},$farsudTanga)))[0]}} "  value="{{array_keys(array_count_values(array_map(function($value){return   $value['type'];},$farsudTanga)))[0]}}">
                        <i class="text-dark fa fa-eye"></i>   {{   array_sum(array_map(function($value){return   $value['summa'];}, $farsudTanga)) }} </a></td>
                   
                         </tr>
                         @endif
                 @endforeach

                </tbody>
            </table>
            <div class="mt-4 offset-lg-10"><table><tbody><tr>
                        <td valign="middle"><button class="btn btn-secondary" data-toggle="modal" data-target=".bd-example-modal-lg " data-target="#exampleModalLong">Подробонее</button></td>

                    </tr></tbody></table>
            </div>
        </div>
    </div>
</div>
{{--         Fond Farsuda table end --}}
{{--        Fond table Ботилшуда --}}
<div class="col-12 col-lg-6 " id="botilshuda-Tanga">

<div class="card  ">
    <div class="card-body">
        <h4>Танга Ботилшуда</h4>

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
            @php($btcount=1)
            <?php
            //         echo "<pre>";
            //         print_r(json_decode($FondMoney,true));
            //         echo "</pre>";
            //  // echo   array_sum(array_map(function($value){return   $value['summa'];}, json_decode($FondMoney,true)[0][0]));
            //         exit;
                    ?>
            @foreach(json_decode($FondMoneyTang->take(20),true) as $BotilshudaTanga)
           
            <?php 

//print_r(array_map(function($value){return   $value['summa'];}, $korshoyam));
?>
               @if(array_keys( array_count_values(array_map(function($value){return   $value['type'];},$BotilshudaTanga)))[0]==3 || array_keys( array_count_values(array_map(function($value){return   $value['src'];},$BotilshudaTanga)))[0]==3)
            <tr zippy="mdoclist_1" id="mdoclist_1">
               
                      <td> <b>{{  $btcount++ }}</b>  </td>
              
                <td  id="Tangabotld{{array_keys(array_count_values(array_map(function($value){return   $value['kode_oper'];},$BotilshudaTanga)))[0]}}">{{date("d-m-Y H:i:s", strtotime(  array_keys( array_count_values(array_map(function($value){return   $value['date'];},$BotilshudaTanga)))[0]))}}</td>
                <td  id="Tangabotlfdoc{{array_keys(array_count_values(array_map(function($value){return   $value['kode_oper'];},$BotilshudaTanga)))[0]}}"> {{   array_keys( array_count_values(array_map(function($value){return   $value['n_doc'];},$BotilshudaTanga)))[0]}} </td>
                                    @foreach($sprAccounts AS $sprAccounti)


                     @if($sprAccounti->id==array_keys( array_count_values(array_map(function($value){return   $value['src'];},$BotilshudaTanga)))[0])
                        <td class="col-md-2" id="Tangabotlnfc{{array_keys(array_count_values(array_map(function($value){return   $value['kode_oper'];},$BotilshudaTanga)))[0]}}">
                    {{$sprAccounti->name  }} </td>
                    @endif
                @endforeach
                @if(array_keys( array_count_values(array_map(function($value){return   $value['priznak'];},$BotilshudaTanga)))[0]==0)
                <td  id="botl{{array_keys(array_count_values(array_map(function($value){return   $value['kode_oper'];},$BotilshudaTanga)))[0]}}">Приход</td>
                @endif
                @if(array_keys( array_count_values(array_map(function($value){return   $value['priznak'];},$BotilshudaTanga)))[0]==1)
                <td  id="Tangabotl{{array_keys(array_count_values(array_map(function($value){return   $value['kode_oper'];},$BotilshudaTanga)))[0]}}">Расход</td>
                @endif
               
           
                      <td class="col-md-4 ">

                    <a class=" link-primary       Fond_idTanga"  href="#" data-toggle="modal" data-target="#FondsTanga"  data-id="Tangabotl"  id="{{array_keys(array_count_values(array_map(function($value){return   $value['kode_oper'];},$BotilshudaTanga)))[0]}} "  value="{{array_keys(array_count_values(array_map(function($value){return   $value['type'];},$BotilshudaTanga)))[0]}}">
                    <i class="text-dark fa fa-eye"></i>  {{   array_sum(array_map(function($value){return   $value['summa'];}, $BotilshudaTanga)) }} </a></td>
               
                     </tr>
                     @endif
             @endforeach

            </tbody>
        </table>
        <div class="mt-4 offset-lg-10"><table><tbody><tr>
                    <td valign="middle"><button class="btn btn-secondary" data-toggle="modal" data-target=".bd-example-modal-lg " data-target="#exampleModalLong">Подробонее</button></td>

                </tr></tbody></table>
        </div>
    </div>
</div>
</div>
{{--         Fond Ботилшуда table end --}}


</div>

{{-- //Fond end  Tanga    --}}
</div>
{{--modal 1 Коршоям Детализация--}}
<div class="modal fade bd-example-modal-lg" tabindex="-1" id="FondsTanga" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                        <input     id="Tangafdate" disabled type="text" aria-describedby="Data" class="form-control"   >
                    </div>
                   
                    <div class="col-md-3">
                        <label for="Tangafn_doc">Номер документ	</label>
                        <input     id="Tangafn_doc" disabled type="text" aria-describedby="Data" class="form-control"   >
                    </div>
                    <div class="col-md-2 ">
                  
                        <label for="Tangafschyot1">Счет 	</label>
                        <select name="account_id_out" id="Tangafschyot1"  required  class="form-control schet1" disabled="">
                            <option   selected  id="Tangafschyot" >Выберите счетов</option>
    
                        </select>
                    </div>
                    <div class="col-md-2 ">
                        <label for="Tangafpriznak">Признак	</label>
                        <input     id="Tangafpriznak" disabled type="text" aria-describedby="Data" class="form-control"   >
                    </div>
                </div>
                
                <div id="TangafondAjax">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Закрыт</button>
                {{-- <button type="button" class="btn btn-secondary" >Печать</button> --}}
            </div>
        </div>
    </div>
</div>
{{--modal1 end Коршоям  Tanga Детализация--}}

<form method="POST" action="{{ route('InsertTanga.post') }}" id="calcForms" >
    @csrf
  <div class="modal fade " id="rashodTanga" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                  <h5 class="modal-title" id="exampleModalLongTitle"> <div id="textpriznakTanga"></div></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">

                  <div class="row  offset-1">

                      <div class="col-md-3  ">
                          <label for="date">Дата	</label>
                          <input  type="datetime-local"readonly="readonly"     style="width: 11rem;"     value="<?php echo date('Y-m-d H:i:s'); ?>"     name="date" class="form-control"    >

                          <input       id="valuepriznakTanga"     name="priznak" type="hidden"    >
                          <input            name="kode_oper" type="hidden"   value="{{$kodOperTanga}}">
                          {{-- <input            name="farsuda" type="hidden"   value="1" > --}}

                      </div>
                      <div class="col-md-2  mt-1">

                          
                      
                          <input type="hidden" name="kode_oper_obor" value="{{$kodeOperObortTanga}}">
                            
                              <div id="src">
                              
                                  
                                  
                                 
                              </div>
                          {{-- <select name="src"   id="accounted" class="form-control" required>
                              <option disabled selected value="">Выберите </option>
                              @foreach($sprAccounts AS $accounts)
                                  <option value="{{$accounts->id}}">{{$accounts->account}}</option>
                              @endforeach
                          </select> --}}
                          <div id="accounts"></div>
                          
                          <div id="srcHomeTanga" class=" mt-4">
                                            
                        </div>

                      </div>
                    
                      <div class="col-md-2  offset-1">
                          <label for="count01">Номер Документ	</label>
                          <input        type="text"  name="ndoc" class="form-control "  autocomplete="off" required>
                      </div>
                      <div class="col-md-4" id="AllSummaTangaD"></div>
                      
                  </div>
                  
                  
                             
                  <div>
                      <div>
                        
                          <div>
                              <div>
                                  <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
                                      <li class="nav-item">
                                          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#OneDTanga" role="tab" aria-controls="home" aria-selected="true">1 дирам <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="gSomon"></i></a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="nav-link" id="FiveD-tab" data-toggle="tab" href="#FiveDTanga" role="tab" aria-controls="FiveD" aria-selected="false">5 дирам <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="hSomon"></i></a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#TenDiram" role="tab" aria-controls="TenD" aria-selected="false">10 дирам <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="jSomon"></i></a>
                                    </li>
                                      <li class="nav-item">
                                          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#TwintyDTanga" role="tab" aria-controls="TwintyD" aria-selected="false">20 дирам <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="jSomon"></i></a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#TwintyFiveDTanga" role="tab" aria-controls="TwintyFiveD" aria-selected="false">25 дирам <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="cSomon"></i></a>
                                    </li>
                                      <li class="nav-item">
                                          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#FiftyDTanga" role="tab" aria-controls="contact" aria-selected="false">50 дирам <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="kSomon"></i></a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#OneSTanga" role="tab" aria-controls="OneS" aria-selected="false">1 сомони <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="0Somon"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#ThreeSTanga" role="tab" aria-controls="ThreeS" aria-selected="false">3 сомони <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="3Somon"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#FiveSTanga" role="tab" aria-controls="FiveS" aria-selected="false">5 сомони <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="5Somon"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="razne-tab" data-toggle="tab" href="#razneTanga" role="tab" aria-controls="razne" aria-selected="false">Разные <i class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="rrazne"></i></a>
                                    </li>
                                  </ul>
                                  <div class="tab-content" id="myTabContent">
                                    {{-- //Twenty 20 diram tanga  --}}
                                    <div class="tab-pane fade " id="TwintyDTanga" role="tabpanel" aria-labelledby="TwintyDTanga-tab">  

                                        <div class="row  mt-2" id="neww">
                                            <input     id="nominalw1"  value="0.20"    type="hidden"  name="nominalw[]"     >
                                            <div class="col-md-2   ">
                                                <label for="edin_id">Единиц	</label>
                                                <select id="edin_idw1" class="form-select selectsw1 Somon edin_id" name="ed_idw[]"  >
                                                    <option value="">Интихоб</option>
                                                    @foreach($sprEds as $sprEd)
                                                        <option value="{{$sprEd->id}} " data-id="{{$sprEd->kol}}" >{{$sprEd->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
              
                                            </div>
                                            <div class="col-md-1  ">
                                                <label for="countcw1">Кол-во	</label>
                                                <input      style="width: 05rem;" id="countw1"   type="text"  name="countw[] " class="form-control Somon count">
              
                                            </div>
                                            <div class="col-md-1 ">
                                                <label for="safe_idw1">Хранилище</label>
                                                <select name="safe_idw[]"   id="safe_idw1" class="form-control selectsw1 Somon">
                                                    <option   selected value="">Выберите</option>
                                                    @foreach($safes as $safe)
                                                        <option value="{{$safe->id}}">{{$safe->safe}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-1">  <label for="shavingw1">Шкаф	</label>
                                                <select name="shavingw[]"   id="shavingw1" class="form-control selectsw1 Somon">
              
              
                                                </select>
                                            </div>
                                            <div class="col-md-1   ">
                                                <label for="qator_idh1">Ряд	</label>
                                                <select name="qator_idw[]"   id="qator_idw1" class="form-control selectsw1 Somon">
                                                    <option   selected value="">Выберите </option>
              
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="cellsw1">Ячейка</label>
                                                <select name="cellsw[]"   id="cellsw1" class="form-control selectsw1 Somon">
              
              
                                                </select>
                                            </div>
                                            <div class="col-md-3 mt-4">
                                                <button type="button"   class="btn btn-primary active" id="addw"    value="w1" > <i class="align-middle" data-feather="plus"></i></button>
                                                <button   id="removew" value="w1" type="button"  class="btn btn-bitbucket active"><i class="align-middle" data-feather="trash-2"></i></button>
                                                <input type="hidden" value="1" id="total_chqw1">
                                            </div>
                                        </div>
              
              
                                        <div id="new_chqw1"></div>
                                      
                                        <div class="form-check form-switch  col-md-4 mt-4">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"  value="nepolniySomonw" >
                                            <div class="form-check-label"  for="flexSwitchCheckChecked" >Неполный</div>
              
                                        </div>
                                        <div id="sumw1" class="col-md-3 offset-8 "  style="margin-top:-10px;" > </div>
                                        <div  id="nepolniySomonw">   </div>
                                      </div>


    {{-- //End Twenty 20 diram tanga  --}}

                                      <div class="tab-pane fade show active" id="OneDTanga" role="tabpanel" aria-labelledby="home-tab">
{{--                                              1 dirami --}}
                  {{-- //q one diram                               --}}
<div class="row  mt-2" id="newq">
    <input     id="nominalq1"  value="0.1"    type="hidden"  name="nominalq[]"     >
    <div class="col-md-2   ">
        <label for="edin_id">Единиц	</label>
        <select id="edin_idq1" class="form-select selectsd1 Somon edin_id" name="ed_idq[]"  >
            <option value="">Интихоб</option>
            @foreach($sprEds as $sprEd)
                <option value="{{$sprEd->id}} " data-id="{{$sprEd->kol}}" >{{$sprEd->name}}  </option>
            @endforeach
        </select>

    </div>
    <div class="col-md-1  ">
        <label for="countcq1">Кол-во	</label>
        <input      style="width: 05rem;" id="countq1"   type="text"  name="countq[] " class="form-control Somon count">

    </div>
    <div class="col-md-1 ">
        <label for="safe_ide1">Хранилище</label>
        <select name="safe_idq[]"   id="safe_idq1" class="form-control selectsq1 Somon">
            <option   selected value="">Выберите</option>
            @foreach($safes as $safe)
                <option value="{{$safe->id}}">{{$safe->safe}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-1">  <label for="shavingq1">Шкаф	</label>
        <select name="shavingq[]"   id="shavingq1" class="form-control selectsq1 Somon">


        </select>
    </div>
    <div class="col-md-1   ">
        <label for="qator_idg1">Ряд	</label>
        <select name="qator_idq[]"   id="qator_idq1" class="form-control selectsq1 Somon">
            <option   selected value="">Выберите </option>

        </select>
    </div>
    <div class="col-md-2">
        <label for="cellsq1">Ячейка</label>
        <select name="cellsq[]"   id="cellsq1" class="form-control selectsq1 Somon">


        </select>
    </div>
    <div class="col-md-3 mt-4">
        <button type="button"   class="btn btn-primary active" id="addq"    value="q1" > <i class="align-middle" data-feather="plus"></i></button>
        <button   id="removeq" value="q1" type="button"  class="btn btn-bitbucket active"><i class="align-middle" data-feather="trash-2"></i></button>
        <input type="hidden" value="1" id="total_chqq1">
    </div>
</div>


<div id="new_chqq1"></div>

<div class="form-check form-switch  col-md-4 mt-4">
    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"  value="nepolniySomonq" >
    <div class="form-check-label"  for="flexSwitchCheckChecked" >Неполный</div>

</div>
<div id="sumq1" class="col-md-3 offset-8 "  style="margin-top:-10px;" > </div>
<div  id="nepolniySomonq">   </div> 
{{-- End One diram --}}
</div>

{{--                                           end    1 dirami --}}
{{-- //25 diram --}}
<div class="tab-pane fade " id="TwintyFiveDTanga" role="tabpanel" aria-labelledby="TwintyFiveD-tab"> 

          <div class="row  mt-2" id="newy">
            <input id="nominaly1" value="0.25" type="hidden" name="nominaly[]">
            <div class="col-md-2   ">
                <label for="edin_id">Единиц	</label>
                <select id="edin_idy1" class="form-select selectse1 Somon edin_id" name="ed_idy[]">
                    <option value="">Интихоб</option>
                    @foreach($sprEds as $sprEd)
                    <option value="{{$sprEd->id}} " data-id="{{$sprEd->kol}}" >{{$sprEd->name}}  </option>
                        @endforeach
                                                    
                </select>

            </div>
            <div class="col-md-1  ">
                <label for="counte1">Кол-во	</label>
                <input style="width: 05rem;" id="county1" type="text" name="county[]" class="form-control Somon count">

            </div>
            <div class="col-md-1 ">
                <label for="safe_idy1">Хранилище</label>
                <select name="safe_idy[]" id="safe_idy1" class="form-control selectse1 Somon">
                    <option selected="" value="">Выберите</option>
                    @foreach($safes as $safe)
                    <option value="{{$safe->id}}">{{$safe->safe}}</option>
                @endforeach                                      
                </select>
            </div>
            <div class="col-md-1">  <label for="shavingy1">Шкаф	</label>
                <select name="shavingy[]" id="shavingy1" class="form-control selectse1 Somon">


                </select>
            </div>
            <div class="col-md-1   ">
                <label for="qator_idy1">Ряд	</label>
                <select name="qator_idy[]" id="qator_idy1" class="form-control selectse1 Somon">
                    <option selected="" value="">Выберите </option>

                </select>
            </div>
            <div class="col-md-2">
                <label for="cellsy1">Ячейка</label>
                <select name="cellsy[]" id="cellsy1" class="form-control selectse1 Somon">


                </select>
            </div>
            <div class="col-md-3 mt-4">
                <button type="button" class="btn btn-primary active" id="addy" value="y1"> <svg   width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus align-middle"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></button>
                <button id="removey" value="y1" type="button" class="btn btn-bitbucket active"><svg  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 align-middle"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>
                <input type="hidden" value="1" id="total_chqy1">
            </div>
        </div>


        <div id="new_chqy1"></div>
      
        <div class="form-check form-switch  col-md-4 mt-4">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" value="nepolniySomony">
            <div class="form-check-label" for="flexSwitchCheckChecked">Неполный</div>

        </div>
        <div id="sumy1" class="col-md-3 offset-8 " style="margin-top:-10px;"></div>
        <div id="nepolniySomony">   </div>

   


    

</div>


{{-- End 25  diram --}}
{{-- // 0.10 diram --}}
<div class="tab-pane fade " id="TenDiram" role="tabpanel" aria-labelledby="TenDiram-tab"> 

    <div class="row  mt-2" id="new7">
      <input id="nominal71" value="0.10" type="hidden" name="nominal7[]">
      <div class="col-md-2   ">
          <label for="edin_id">Единиц	</label>
          <select id="edin_id71" class="form-select selectse7 Somon edin_id" name="ed_id7[]">
              <option value="">Интихоб</option>
              @foreach($sprEds as $sprEd)
              <option value="{{$sprEd->id}} " data-id="{{$sprEd->kol}}" >{{$sprEd->name}}  </option>
                @endforeach
                                              
          </select>

      </div>
      <div class="col-md-1  ">
          <label for="count7">Кол-во	</label>
          <input style="width: 05rem;" id="count71" type="text" name="count7[]" class="form-control Somon count">

      </div>
      <div class="col-md-1 ">
          <label for="safe_id71">Хранилище</label>
          <select name="safe_id7[]" id="safe_id71" class="form-control selectse7 Somon">
              <option selected="" value="">Выберите</option>
              @foreach($safes as $safe)
              <option value="{{$safe->id}}">{{$safe->safe}}</option>
          @endforeach                                      
          </select>
      </div>
      <div class="col-md-1">  <label for="shaving71">Шкаф	</label>
          <select name="shaving7[]" id="shaving71" class="form-control selectse7 Somon">


          </select>
      </div>
      <div class="col-md-1   ">
          <label for="qator_id71">Ряд	</label>
          <select name="qator_id7[]" id="qator_id71" class="form-control selectse7 Somon">
              <option selected="" value="">Выберите </option>

          </select>
      </div>
      <div class="col-md-2">
          <label for="cells71">Ячейка</label>
          <select name="cells7[]" id="cells71" class="form-control selectse7 Somon">


          </select>
      </div>
      <div class="col-md-3 mt-4">
          <button type="button" class="btn btn-primary active" id="add7" value="71"> <svg   width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus align-middle"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></button>
          <button id="remove7" value="71" type="button" class="btn btn-bitbucket active"><svg  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 align-middle"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>
          <input type="hidden" value="1" id="total_chq71">
      </div>
  </div>


  <div id="new_chq71"></div>

  <div class="form-check form-switch  col-md-4 mt-4">
      <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" value="nepolniySomon7">
      <div class="form-check-label" for="flexSwitchCheckChecked">Неполный</div>

  </div>
  <div id="sum71" class="col-md-3 offset-8 " style="margin-top:-10px;"></div>
  <div id="nepolniySomon7">   </div>






</div>


{{-- End 0.10  diram --}}


{{-- //1 Somoni --}}
<div class="tab-pane fade " id="OneSTanga" role="tabpanel" aria-labelledby="OneS-tab"> 

    
    

        <div class="row  mt-2     " id="newu">





            <input id="nominalu1" value="1" class="nominal" type="hidden" name="nominalu[]">


             <div class="col-md-2   ">
                 <label for="edin_idu">Единиц	</label>
                 <select id="edin_idu1" class="form-select selectsu1 Somon edin_id" name="ed_idu[]">
                     <option value="">Интихоб</option>
                     @foreach($sprEds as $sprEd)
                     <option value="{{$sprEd->id}} " data-id="{{$sprEd->kol}}" >{{$sprEd->name}}  </option>
                 @endforeach
               </select>

             </div>
             <div class="col-md-1  ">
                 <label for="countu1">Кол-во	</label>
                 <input style="width: 05rem;" id="countu1" type="text" name="countu[]" class="form-control  Somon  count">

             </div>
             <div class="col-md-2 ">
                 <label for="safe_idu1">Хранилище</label>
                 <select name="safe_idu[]" style="width: 08rem;" id="safe_idu1" class="form-control selectsu1  Somon">
                     <option selected="" value="">Выберите</option>
                     
                     @foreach($safes as $safe)
                     <option value="{{$safe->id}}">{{$safe->safe}}</option>
                 @endforeach  
            </select>
             </div>
             <div class="col-md-2" style="width: 08rem;">  <label for="shavingu1">Шкаф	</label>
                 <select name="shavingu[]" id="shavingu1" class="form-control selectsu1  Somon">
                     <option selected="" value="">Выберите </option>

                 </select>
             </div>
             <div class="col-md-2   ">
                 <label for="qator_idu1">Ряд	</label>
                 <select name="qator_idu[]" style="width: 08rem;" id="qator_idu1" class="form-control selectsu1  Somon">
                     <option selected="" value="">Выберите </option>

                 </select>
             </div>
             <div class="col-md-1">
                 <label for="cells01">Ячейка</label>
                 <select name="cellsu[]" id="cellsu1" class="form-control selectsu1  Somon">
                     <option selected="" value="">Выберите </option>

                 </select>
             </div>


            <div class="col-md-2 mt-4">
                <button type="button" class="btn btn-primary  " id="addu" value="u1"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus align-middle"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></button>
                <button id="removu" value="u1" type="button" class="btn btn-bitbucket active"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 align-middle"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>
                <input type="hidden" value="1" id="total_chq01">
            </div>
        </div>



        <div id="new_chqu1"></div>
<div class="form-check form-switch  col-md-4 mt-4">
   <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" value="nepolniySomonu">
   <div class="form-check-label" for="flexSwitchCheckChecked">Неполный</div>

</div>
<div id="sumu1" class="col-md-3 offset-8   " style="margin-top:-10px;"></div>
    <div id="nepolniySomonu">



    </div>


     
    
    </div>
    
    
    {{-- End 1 Somoni --}}

    {{-- //3 Somoni --}}
<div class="tab-pane fade " id="ThreeSTanga" role="tabpanel" aria-labelledby="ThreeS-tab"> 

   <div class="row  mt-2" id="newi1">
            <input id="nominali1" value="3" type="hidden" name="nominali[]">
            <div class="col-md-2   ">
                <label for="edin_id">Единиц	</label>
                <select id="edin_idi1" class="form-select selects31 Somon edin_id" name="ed_idi[]">
                    <option value="">Интихоб</option>
                    @foreach($sprEds as $sprEd)
                    <option value="{{$sprEd->id}} " data-id="{{$sprEd->kol}}" >{{$sprEd->name}}  </option>
                @endforeach
                 
           
                                                      </select>

            </div>
            <div class="col-md-1  ">
                <label for="count31">Кол-во	</label>
                <input style="width: 05rem;" id="counti1" type="text" name="counti[]" class="form-control Somon count">

            </div>
            <div class="col-md-1 ">
                <label for="safe_id31">Хранилище</label>
                <select name="safe_idi[]" id="safe_idi1" class="form-control selectsi1 Somon">
                    <option selected="" value="">Выберите</option>
                    @foreach($safes as $safe)
                    <option value="{{$safe->id}}">{{$safe->safe}}</option>
                      @endforeach  
            </select>
            </div>
            <div class="col-md-1">  <label for="shavingi1">Шкаф	</label>
                <select name="shavingi[]" id="shavingi1" class="form-control selectsi1 Somon">

                    <option selected="" value="">Выберите </option>
                </select>
            </div>
            <div class="col-md-1   ">
                <label for="qator_id3[]">Ряд	</label>
                <select name="qator_idi[]" id="qator_idi1" class="form-control selectsi1 Somon">
                    <option selected="" value="">Выберите </option>

                </select>
            </div>
            <div class="col-md-2">
                <label for="cellsi1">Ячейка</label>
                <select name="cellsi[]" id="cellsi1" class="form-control selectsi1 Somon">


                </select>
            </div>
            <div class="col-md-3 mt-4">
                <button type="button" class="btn btn-primary active" id="addi" value="i1"> <svg   width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus align-middle"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></button>
                <button id="removei" value="i1" type="button" class="btn btn-bitbucket active"><svg   width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 align-middle"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>
                <input type="hidden" value="1" id="total_chqi1">
            </div>
        </div>
           <div id="new_chqi1"></div>
<div class="form-check form-switch  col-md-4 mt-4">
    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" value="nepolniySomoni">
    <div class="form-check-label" for="flexSwitchCheckChecked">Неполный</div>

</div>
<div id="sumi1" class="col-md-3 offset-8   " style="margin-top:-10px;"></div>
<div id="nepolniySomoni">    </div>


   
    
    </div>
    
    
    {{-- End 3 Somoni --}}
        {{-- // Somoni --}}
<div class="tab-pane fade " id="FiveSTanga" role="tabpanel" aria-labelledby="FiveS-tab"> 

       <div class="row  mt-2" id="newo1">
            <input id="nominalo1" value="5" type="hidden" name="nominalo[]">
            <div class="col-md-2   ">
                <label for="edin_ido1">Единиц	</label>
                <select id="edin_ido1" class="form-select selectso1 Somon edin_id" name="ed_ido[]">
                    <option value="">Интихоб</option>
                    @foreach($sprEds as $sprEd)
                    <option value="{{$sprEd->id}} " data-id="{{$sprEd->kol}}" >{{$sprEd->name}}  </option>
                @endforeach
                
           
        </select>

            </div>
            <div class="col-md-1  ">
                <label for="counto1">Кол-во	</label>
                <input style="width: 05rem;" id="counto1" type="text" name="counto[]" class="form-control Somon count">

            </div>
            <div class="col-md-1 ">
                <label for="safe_ido1">Хранилище</label>
                <select name="safe_ido[]" id="safe_ido1" class="form-control selectso1 Somon">
                    <option selected="" value="">Выберите</option>
                    @foreach($safes as $safe)
                    <option value="{{$safe->id}}">{{$safe->safe}}</option>
                @endforeach  
                                                             
             </select>
            </div>
            <div class="col-md-1">  <label for="shavingo1">Шкаф	</label>
                <select name="shavingo[]" id="shavingo1" class="form-control selectso1 Somon">


                </select>
            </div>
            <div class="col-md-1   ">
                <label for="qator_ido1">Ряд	</label>
                <select name="qator_ido[]" id="qator_ido1" class="form-control selectso1 Somon">
                    <option selected="" value="">Выберите </option>

                </select>
            </div>
            <div class="col-md-2">   
                <label for="cellso1">Ячейка</label>
                <select name="cellso[]" id="cellso1" class="form-control selectso1 Somon">


                </select>
            </div>
            <div class="col-md-3 mt-4">
                <button type="button" class="btn btn-primary active" id="addo" value="o1"> <svg   width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus align-middle"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></button>
                <button id="removo" value="o1" type="button" class="btn btn-bitbucket active"><svg   width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 align-middle"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>
                <input type="hidden" value="1" id="total_chqo1">
            </div>
        </div>


        <div id="new_chqo1"></div>

        <div class="form-check form-switch  col-md-4 mt-4">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" value="nepolniySomono">
            <div class="form-check-label" for="flexSwitchCheckChecked">Неполный</div>

        </div>
        <div id="nepolniySomono">   </div>
        <div id="sumo1" class="col-md-4 offset-8"></div>


     

    </div>
    
    
    {{-- End 1 Somoni --}}



{{-- razne --}}
<div class="tab-pane fade " id="razneTanga" role="tabpanel" aria-labelledby="razne-tab">
    <div class="row  mt-2" id="new6">
          
         
           <div class="col-md-1  ">
               <label for="countc61">Сумма	</label>
               <input style="width: 05rem;" id="countSumsrazSomon" type="text" name="summarazne" class="form-control Somon count">

           </div>
           <div class="col-md-1 ">
               <label for="safe_id61">Хранилище</label>
               <select name="safe_idrazned" id="safe_id61" class="form-control selectsf1 Somon">
                   <option selected="" value="">Выберите</option>
                   @foreach($safes as $safe)
                   <option value="{{$safe->id}}">{{$safe->safe}}</option>
               @endforeach
                                                      </select>
           </div>
           <div class="col-md-1">  <label for="shaving61">Шкаф	</label>
               <select name="shavingrazne" id="shaving61" class="form-control shaving61 Somon">


               </select>
           </div>
           <div class="col-md-1   ">
               <label for="qator_idr1">Ряд	</label>
               <select name="qator_idrazne" id="qator_id61" class="form-control shaving61 Somon">
                   <option selected="" value="">Выберите </option>

               </select>
           </div>
           <div class="col-md-2">
               <label for="cellsf1">Ячейка</label>
               <select name="cellsrazne" id="cells61" class="form-control shaving61 Somon">
                   <option selected="" value="">Выберите </option>

               </select>
           </div>
       
       </div>


   
   
 
      

   </div>
{{-- nepolnoe end --}}

 <div class="tab-pane fade " id="FiveDTanga" role="tabpanel" aria-labelledby="FiveD-tab"> 
                                        
                                        <div class="row  mt-2" id="newp">
                                            <input     id="nominalp1"  value="0.05"    type="hidden"  name="nominalp[]"     >
                                            <div class="col-md-2   ">
                                                <label for="edin_idp">Единиц	</label>
                                                <select id="edin_idp1" class="form-select selectsp1 Somon edin_id" name="ed_idp[]"  >
                                                    <option value="">Интихоб</option>
                                                    @foreach($sprEds as $sprEd)
                                                        <option value="{{$sprEd->id}} " data-id="{{$sprEd->kol}}" >{{$sprEd->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
              
                                            </div>
                                            <div class="col-md-1  ">
                                                <label for="counth1">Кол-во	</label>
                                                <input      style="width: 05rem;" id="countp1"   type="text"  name="countp[] " class="form-control Somon count">
              
                                            </div>
                                            <div class="col-md-1 ">
                                                <label for="safe_idh1">Хранилище</label>
                                                <select name="safe_idp[]"   id="safe_idp1" class="form-control selectsp1 Somon">
                                                    <option   selected value="">Выберите</option>
                                                    @foreach($safes as $safe)
                                                        <option value="{{$safe->id}}">{{$safe->safe}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-1">  <label for="shavingp1">Шкаф	</label>
                                                <select name="shavingp[]"   id="shavingp1" class="form-control selectsp1 Somon">
              
              
                                                </select>
                                            </div>
                                            <div class="col-md-1   ">
                                                <label for="qator_ide1">Ряд	</label>
                                                <select name="qator_idp[]"   id="qator_idp1" class="form-control selectsp1 Somon">
                                                    <option   selected value="">Выберите </option>
              
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="cellsp1">Ячейка</label>
                                                <select name="cellsp[]"   id="cellsp1" class="form-control selectsp1 Somon">
              
              
                                                </select>
                                            </div>
                                            <div class="col-md-3 mt-4">
                                                <button type="button"   class="btn btn-primary active" id="addp"    value="p1" > <i class="align-middle" data-feather="plus"></i></button>
                                                <button   id="removep" value="p1" type="button"  class="btn btn-bitbucket active"><i class="align-middle" data-feather="trash-2"></i></button>
                                                <input type="hidden" value="1" id="total_chqp1">
                                            </div>
                                        </div>
              
              
                                        <div id="new_chqp1"></div>
                                      
                                        <div class="form-check form-switch  col-md-4 mt-4">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"  value="nepolniySomonp" >
                                            <div class="form-check-label"  for="flexSwitchCheckChecked" >Неполный</div>
              
                                        </div>
                                        <div id="sump1" class="col-md-3 offset-8 "  style="margin-top:-10px;" > </div>
                                        <div  id="nepolniySomonp">   </div>
                                    </div>
                                      
                                    


                                      {{-- Fifty 50 diram --}}
                                      <div class="tab-pane fade " id="FiftyDTanga" role="tabpanel" aria-labelledby="FiftyD-tab"> 
                                        <div class="row  mt-2" id="new4">
                                            <input     id="nominal41"  value="0.50"    type="hidden"  name="nominal4[]"     >
                                            <div class="col-md-2   ">
                                                <label for="edin_id">Единиц	</label>
                                                <select id="edin_id41" class="form-select selects41 Somon edin_id" name="ed_id4[]"  >
                                                    <option value="">Интихоб</option>
                                                    @foreach($sprEds as $sprEd)
                                                        <option value="{{$sprEd->id}} " data-id="{{$sprEd->kol}}" >{{$sprEd->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
              
                                            </div>
                                            <div class="col-md-1  ">
                                                <label for="countc41">Кол-во	</label>
                                                <input      style="width: 05rem;" id="count41"   type="text"  name="count4[] " class="form-control Somon count">
              
                                            </div>
                                            <div class="col-md-1 ">
                                                <label for="safe_ide1">Хранилище</label>
                                                <select name="safe_id4[]"   id="safe_id41" class="form-control selects41 Somon">
                                                    <option   selected value="">Выберите</option>
                                                    @foreach($safes as $safe)
                                                        <option value="{{$safe->id}}">{{$safe->safe}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-1">  <label for="shaving41">Шкаф	</label>
                                                <select name="shaving4[]"   id="shaving41" class="form-control selects41 Somon">
              
              
                                                </select>
                                            </div>
                                            <div class="col-md-1   ">
                                                <label for="qator_id41">Ряд	</label>
                                                <select name="qator_id4[]"   id="qator_id41" class="form-control selects41 Somon">
                                                    <option   selected value="">Выберите </option>
              
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="cells41">Ячейка</label>
                                                <select name="cells4[]"   id="cells41" class="form-control selects41 Somon">
              
              
                                                </select>
                                            </div>
                                            <div class="col-md-3 mt-4">
                                                <button type="button"   class="btn btn-primary active" id="add4"    value="41" > <i class="align-middle" data-feather="plus"></i></button>
                                                <button   id="remove4" value="41" type="button"  class="btn btn-bitbucket active"><i class="align-middle" data-feather="trash-2"></i></button>
                                                <input type="hidden" value="1" id="total_chq41">
                                            </div>
                                        </div>
              
              
                                        <div id="new_chq41"></div>
                                      
                                        <div class="form-check form-switch  col-md-4 mt-4">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"  value="nepolniySomon4" >
                                            <div class="form-check-label"  for="flexSwitchCheckChecked" >Неполный</div>
              
                                        </div>
                                        <div id="sum41" class="col-md-3 offset-8 "  style="margin-top:-10px;" > </div>
                                        <div  id="nepolniySomon4">   </div>    
                                    </div>

                                  </div>
                              </div>
                          </div>
                      </div>
                      
                      </div>
                      
                  <textarea name="comment" id="" cols="50" rows="3" class="form-control mt-5" placeholder="Коммент"></textarea>
                  <button   type="submit" id="submits"   class="btn btn-success mt-2  offset-10">Submit</button>
              </div>

          </div>
      </div>
  </div>
</form>
{{-- //Fonds Korshoyam botilshuda farsuda  --}}



{{-- //End Tanga  --}}






 




@endsection
 
<script src="{{asset('js/app.js')}}"></script>
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

{{-- end this sccript   count all Sum   --}}
<script src='{{asset('js/OborotTanga.js')}}'></script>
<script src="{{asset('js/OborotJs.js')}}"></script>
 
<script>
 

$(document).ready(function() {
    //Id detalizasiya type 
      $('#oborot_pul,#korshoyam_pul,#farsuda_pul,#botilshuda_pul').on('click',function()
      {
    
        $('#podrobnee').val($(this).attr('id'));
     //   console.log( $('#podrobnee').val());
        
      });
      
    $('body').on('click', '.pagination a', function(e) {
   
         e.preventDefault();
        //  console.log($(this).parent('div'));
          

            var url = $(this).attr('href');
            getArticles(url,$('#podrobnee').val());
            window.history.pushState("", "", url);
        });

        function getArticles(url,id) {
       
            $('#load a').css('color', '#dfecf6');
            $('#load').append('<center><img style="position: absolute;   top: 0; z-index: 100000;" src="loading.gif" /></center>');
          
            $.ajax({
                url : url
            }).done(function (data) {
                
                $('.'+id).html(data);
            }).fail(function () {
                alert('Articles could not be loaded.');
            });
        }
  
 
//Oborots 
$(".Oborot_id").click(function(){



var  id=$(this).attr('id');
    
var accounted1= $(`#ac${id}`).text();
var accounted2= $(`#acn${id}`).text();
var date=$(`#da${id}`).text();
var priznak=$(`#priznak${id}`).text();

  
   $("#priznaks").text(priznak);
  
var bik=$(`#bik${id}`).text();
 
$('#bik').text(bik);
$('#schet1').text( 'Оборот' );
$('#schet2').text(accounted2);
$("#dates").val(date);

$.ajax({
   url: "{{route('OborotTable.post')}}",
   type:"POST",
   data:{
       "_token": "{{ csrf_token() }}",
       id:id,date:date,

   },
   success:function(response){




     // console.log(response);
      $('#ajaxoborot').html(response);
   },
});


});
        //   tanga obroots
 $(".Oborot_idTanga").click(function(){

          
var  id=$(this).attr('id');
  
var accounted1= $(`#Tangaac${id}`).text();
var accounted2= $(`#Tangaacn${id}`).text();
var n_doc= $(`#Tangan_doc${id}`).text();
var date=$(`#Tangada${id}`).text();
var priznak=$(`#TangaPriznak${id}`).text();
//    $("#Tangadoc").text('Расход');
 
$("#Tangapriznaks").text(priznak);
// if(priznak==1)
// {
//    $("#Tangapriznaks").text(priznak);
// }else{
//    $("#Tangapriznaks").text('Расход');
// }
var bik=$(`#Tangabik${id}`).text();
 
$('#Tangabik').text(bik);
$('#Tangaschets').text( 'Оборот');
$('#Tangaschet2').text(accounted2);
$("#Tangadates").val(date);
$("#Tangadoc").text(n_doc);
$.ajax({
   url: "{{route('OborotTangaTable.post')}}",
   type:"POST",
   data:{
       "_token": "{{ csrf_token() }}",
       id:id,date:date,

   },
   success:function(response){
    $('#Tangaajaxoborot').html(response);
   },
});


});


// End tanga obroots
        //fondes Tanga korshoyam farsuda botilshuda 
        $(".Fond_idTanga").click(function(){
            $('#fpriznak').val('');
             var  kode_opers=$(this).attr('id');
             var  data=$(this).data('id');
             var  id_type=$(this).attr('value');
             var cnt=`#${data}nfc${kode_opers}`;
              
             //var id_accounted=$().text();
            var id_accounted=$(`#${data}nfc${kode_opers}`).text();
            var priznak=$(`#${data}${kode_opers}`).text();
           // Tangakord1
            var date=$(`#${data}d${kode_opers}`).text();
            var doc=$(`#${data}fdoc${kode_opers}`).text();
      
            
        
            $('#Tangafn_doc').val(doc);
            $('#Tangafdate').val(date);
            $('#Tangafpriznak').val(priznak);
            $('#Tangafschyot').text(String(id_accounted));
        
        
                
             $.ajax({
                url: "{{route('FondTableTanga.post')}}",
                method:"POST",
                dataType: 'html', 
                data:{
                    "_token": "{{ csrf_token() }}",
                    id:kode_opers,id_type:id_type,

                },
                success:function(fondDataTanga){


                 

                  
                   $('#TangafondAjax').html(fondDataTanga);
                },
            });

        });
   

    // end Botilshuda korshoyam farsuda tanga js  

                //fondes korshoyam farsuda botilshuda
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
</script>



 <script>
   $(document).on('click','#priznaki',function(){
   
    document.getElementById("TangaSumbit").reset();
    document.getElementById("submit").reset();
    $('[id^=sum]').html('');
    $('[id^=AllSumma]').html('');
    $('#srcHome').html('');
    $('#srcHomeTanga').html('');
   
          //console.log($(this).data('context'));
          var textpriznak='#textpriznak';
          $(textpriznak).html("");
          $('#type').val('');
          
           var id='#srcHome';
           $('#valuepriznak').val($(this).val());
           $('#valuepriznakTanga').val($(this).val());
           if($(this).data('type')=='Tanga')
           {
            id='#srcHomeTanga';
              textpriznak='#textpriznakTanga';
           }
          if($(this).data('context')=='korshoyam')
          {
         
            $('#type').val(1)
            $(textpriznak).html('Коршоям/'+$(this).text()+'<input name="farsuda" type="hidden"  value="1" >');
            
            if($(this).val()==0)
            {
                $(id).html('<input type="hidden" name="src" value="4"> ');
               
                // console.log($(this).val());
          
                return
            }
            // if($(this).val()==1)
            // {
              
            //     $(id).html('<div class="btn-group"> <input type="radio" class="btn-check" name="src" id="option1" autocomplete="off" value="7" required=""><label class="btn btn-outline-secondary" for="option1">Оборот</label> <input type="radio" class="btn-check" name="src" id="option2" value="2" autocomplete="off" required=""><label class="btn btn-outline-secondary" for="option2">Фарсуда</label> </div>');
            //     // console.log($(this).val());
              
            //                return 
            // }
          }
          if($(this).data('context')=='farsuda')
          {
         
            $(textpriznak).html('Фарсуда /'+$(this).text()+' <input name="farsuda" type="hidden"  value="2" >');
            $('#type').val(2)
            if($(this).val()==0)
            {
                $(id).html('<input type="hidden" name="src" value="4"> ');
                // $(id).html('<div class="btn-group"> <input type="radio" class="btn-check" name="src" id="option1" autocomplete="off" required="" value="7"><label class="btn btn-outline-secondary" for="option1">Оборот</label> <input type="radio" required="" class="btn-check" name="src" id="option2" value="1" autocomplete="off"><label class="btn btn-outline-secondary" for="option2">Коршоям</label> </div>');
                
            }
            // if($(this).val()==1)
            // {
            //     $(id).html('<input type="hidden" name="src" value="3">');
                 
      
            //     // console.log($(this).val());
            //     return
            // }
          }
          if($(this).data('context')=='botilshuda')
          {
            
            $(textpriznak).html('Ботилшуда / '+$(this).text()+'<input name="farsuda" type="hidden"  value="3">');
            $('#type').val(3)
            if($(this).val()==0)
            {
                $(id).html('<input type="hidden" name="src" value="2">');
              
        
                // console.log($(this).val());
                return
            }
            // if($(this).val()==1)
            // {
            //     $(id).html('<div class="btn-group"> <input type="radio" class="btn-check" name="src" id="option1" autocomplete="off" required="" value="7"><label class="btn btn-outline-secondary" for="option1">Душанбе</label> <input type="radio" required="" class="btn-check" name="src" id="option2" value="1" autocomplete="off"><label class="btn btn-outline-secondary" for="option2">Нобудкуни</label> </div>');
               
            //     // console.log($(this).val());
            //     return
            // }

          }

   });

     //Safe ajax
    //    $(document).on('change','#accounted',function(){
               
    //           $('#accounts').html('<input type="hidden" name="accounts" value="'+$("#accounted option:selected").text()+'">')
               
    //    });
     $(document).on('change','[id^=safe_id]',function (){
     

var  id_number= $(this).attr("id").substr(-2);
$('#'+id_number.substr(-2,1)+'Somon').addClass("d-none");
console.log(id_number.substr(-2,1));
$("#"+$(this).attr('id')).removeClass("border-danger");
 var shaving=$("#shaving"+id_number);
 $("#shaving"+id_number).html("");

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
 qator.html("");
 if(this.value>0)
 {
     var safe=$("#safe_id"+id_number+" option:selected").val();

    
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
 cell.html("");
 if(this.value>0)
 {
     //вактин$("#safe_id option:selected").val();

     var safe=$("#safe_id"+id_number+" option:selected").val();
     var shaving=$("#shaving"+id_number+" option:selected").val();

   
     cell.append("<option>Интихоб</option>");

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
     qator.html("<option >Интихоб</option>");

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

});
 


 </script>
  <script src="{{asset('js/AddRemoveButton.js')}}"></script>
<script src="/js/Sprjs.js"></script>