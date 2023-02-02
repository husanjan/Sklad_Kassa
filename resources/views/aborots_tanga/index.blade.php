@extends('layouts.app')

@section('content')
<form    action="{{ route('oborot_tanga.store') }}" method="post">
    <div class="modal fade  bd-example-modal-xl " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('Добавление нового оборот') }}</h5>

                </div>

              
                    @csrf

                    <input type="hidden" name="kod_oper" value="{{$kodeOper}}">
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
                        <div class="col-md-3 ">
                            <input type="text" placeholder="Номер документ"  name="n_doc" class="form-control" required  >
                        </div>
                    </div>
                    <input type="hidden"  value="0"  name="priznak"  >
                    <input type="hidden"  value="4"  name="account_id_in"  >
                  
                    <div class="row  offset-1 mt-2">
                        <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#OneD" role="tab" aria-controls="home" aria-selected="true">1 дирам <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="gSomon"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="FiveD-tab" data-toggle="tab" href="#FiveD" role="tab" aria-controls="FiveD" aria-selected="false">5 дирам <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="hSomon"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#TenD" role="tab" aria-controls="TenD" aria-selected="false">10 дирам <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="jSomon"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#TwintyD" role="tab" aria-controls="TwintyD" aria-selected="false">20 дирам <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="jSomon"></i></a>
                            </li>
                            
                            <li class="nav-item">
                              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#TwintyFiveD" role="tab" aria-controls="TwintyFiveD" aria-selected="false">25 дирам <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="cSomon"></i></a>
                          </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#FiftyD" role="tab" aria-controls="contact" aria-selected="false">50 дирам <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="kSomon"></i></a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#OneS" role="tab" aria-controls="OneS" aria-selected="false">1 сомони <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="0Somon"></i></a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#ThreeS" role="tab" aria-controls="ThreeS" aria-selected="false">3 сомони <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="3Somon"></i></a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#FiveS" role="tab" aria-controls="FiveS" aria-selected="false">5 сомони <i  class="d-none fa-sharp fa-solid fa-circle-exclamation text-danger" id="5Somon"></i></a>
                          </li>
                      
                        </ul>
                        <input type="hidden" value="1" id="total_chq">
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="OneD" role="tabpanel" aria-labelledby="home-tab">
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
        
        
                                    {{-- <div class="col-md-4 mt-3">
                                        <button type="button" onclick="addTanga()" class="btn btn-primary "  id="summaTangaOneAdd"> <i class="align-middle" data-feather="plus"></i></button>
                                        <button onclick="remove()" type="button"  class="btn btn-bitbucket active"><i class="align-middle" data-feather="trash-2"></i></button>
        
                                    </div> --}}
                              {{-- //  <input type="hidden" value="1" id="summaTangaOneAddtotal"> --}}
                           
                            </div>
                            <div id="summaTangaOneAddnew" >
        
                            </div>
                        </div>
                        <div class="tab-pane fade    " id="FiveD" role="tabpanel" aria-labelledby="home-tab">
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
                        
                        <div class="tab-pane fade    " id="TenD" role="tabpanel" aria-labelledby="home-tab">
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
                        
                        <div class="tab-pane fade    " id="TwintyD" role="tabpanel" aria-labelledby="home-tab">
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
                        <div class="tab-pane fade    " id="TwintyFiveD" role="tabpanel" aria-labelledby="home-tab">
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
                        <div class="tab-pane fade    " id="FiftyD" role="tabpanel" aria-labelledby="home-tab">
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
                        <div class="tab-pane fade    " id="OneS" role="tabpanel" aria-labelledby="home-tab">
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
                        <div class="tab-pane fade    " id="ThreeS" role="tabpanel" aria-labelledby="home-tab">
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
                        <div class="tab-pane fade    " id="FiveS" role="tabpanel" aria-labelledby="home-tab">
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
                    <div class="col-md-4 offset-6 mt-2" id="AllSumma"></div>
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
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
    <div class="row">
        <div class="col-lg-12 margin-tb ">
            <div class="pull-left">
                <h2>Оборот</h2>
            </div>
            <div class="pull-right offset-2">
                <button type="button" class="btn btn-success  " data-toggle="modal" data-target="#exampleModalCenter">
                    <i class="align-middle" data-feather="plus"></i> Создание нового оборот
                </button>
            </div>
        </div>
    </div>


    <div class="col-12 col-lg-8 d-flex  justify-content-center offset-2">

        <div class="card ">
            <div class="card-body">
    <table class="table ">
        <tr>
            <th>#</th>
            <th>БИК</th>
            <th>Номер документы</th>
            <th>Номер счета </th>
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
                           @if($oborot->bik==$biks->id)
                               {{$biks->bik}}   <br> {{$biks->full_name}}
                           @endif
                       @endforeach


                   </td>
                   <td>

                       {{$oborot->n_doc}}
                       {{-- @foreach($sprAccounts AS $sprAccount)
                           @if($oborot->account_id_out==$sprAccount->id)
                               {{$sprAccount->account}}   <br> {{$sprAccount->name}}
                           @endif
                       @endforeach --}}

                   </td>
                   <td>
                       @foreach($sprAccounts AS $sprAccount)
                           @if($oborot->src==$sprAccount->id)
                               {{$sprAccount->account}}   <br> {{$sprAccount->name}}
                           @endif
                       @endforeach
                   </td>
                   <td>{{$oborot->naminal}}</td>
                   <td>{{$oborot->summa}}</td>
                   <td>

                       @if($oborot->priznak===1)
                       {{"Расход"}} 
                       @endif
                           @if($oborot->priznak==0)
                            {{"Приход"}}
                           @endif
                    </td>
                   <td>{{$oborot->comment}}</td>


             <td>


                 {!! Form::open(['method' => 'DELETE','route' => ['oborot_spr.destroy', $oborot->id],'style'=>'display:inline']) !!}
                 {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
                 {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

    </table>
            </div>
        </div>
    </div>
@endsection

<script src='{{asset('js/ajax.min.js')}}'></script>
 
<script>
    $( document ).ready(function() {
        // $('input[id^="summa"]').each(function()
        // {
        // alert("gg");
        // });
        $(document).on('keyup','input[id^="summaTanga"]',function (){
            //console.log($(this).attr('id'));
           // console.log($('.'+$(this).attr('id')).val()*10);
           let CountTanga=[];
           var nominal=$('.'+$(this).attr('id')).val()*10;
          var sum=$(this).val()*10;
        //    if(sum===0.1)
        //    {
        //     sum*10;
        //    }
            
            
           if(sum%nominal==0)
           {
            
            $('#'+$(this).attr('id')).removeClass("border-danger");
            // $('.'+$(this).attr('id')).val()*
            // CountTanga+=parseFloat($(this).val());
            // console.log(CountTanga);
        
                $('input[id^="summaTanga"]').each(function(){
                    if(parseFloat($(this).val())>0)
                    {
                        CountTanga.push(parseFloat($(this).val()));
                    }
                 
                });
                //console.log(CountTanga.reduce((a, b) => a + b, 0));
                $('#AllSumma').html('<div class="alert alert-primary  mt-2"><div class="btn-group" role="group" aria-label="Basic example"> Общие сумма  '+CountTanga.reduce((a, b) => a + b, 0)+' Cомони  </div></div>')
                // console.log(CountTanga);
            $("#"+$(this).attr('id')+"Add").attr("disabled", false);
            $(".addform").attr("disabled", false);
            return; 
           }else{
          //console.log("f");
          //$('input[id="summaTangaOneAdd"]').prop('disabled', false);
          $('#'+$(this).attr('id')).addClass("border-danger");
        //       $(id_error+'Somon').removeClass("d-none");
          $(".addform").attr("disabled", true);
           }
           
            
        });
        $("button").click(function(){
        
        
        var  new_btn=parseInt($('#summaTangaOneAdd'+'total').val())+1;
        // console.log(new_btn);
    }); 
});
  
</script>
