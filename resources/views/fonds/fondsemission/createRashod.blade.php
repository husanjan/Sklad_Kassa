@extends('layouts.app')

@section('content')

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
 </head>

    <div class="container">
        
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Расход эмиссионный фонд') }}</div>

                    <div class="card-body">


                        <div class="row">
                            <div class="col-sm-10">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-content custom-form-container">
{{--                                        autocomplete="off"--}}
                                        <form role="form"   autocomplete="off" action="{{route('fondemission.edit',1)}}"  method="PUT">
                                            @csrf


                                            <div class="row mb-3">
                                              
                                                    <label for="edin_id" class="col-md-4 col-form-label text-md-end">{{ __('Един') }}</label>
                                                    <div class="col-md-3">
    
                                                        <select id="edin_id" class="form-select" name="ed_id" autofocus >
                                                            <option value="">Интихоб</option>
                                                            @foreach($sprEds as $sprEd)
    
                                                                <option value="{{$sprEd->id}}"  kol="{{$sprEd->kol}}">{{$sprEd->name}}
    
    
                                                                </option>
                                                            @endforeach
    
    
                                                        </select>
                                                    </div>
                                            </div>

                                            <div class="row mb-12">
                                                <label for="nomil" class="col-md-4 col-form-label text-md-end">{{ __('Количество') }}</label>
                                                <div class="col-md-8">
                                                    <input id="count" type="text" class="form-control" name="count">
                                                </div>
                                            </div>        
                                            <div class="row mb-12 mt-2">
                                                <label for="nomil" class="col-md-4 col-form-label text-md-end">{{ __('Номинал') }}</label>
                                                <div class="col-md-8">
                                                    <input id="naminal" type="text" class="form-control" name="naminal">
                                                </div>
                                            </div>    
                                            <div class="row mb-12  mt-2">
                                                <label for="count" class="col-md-4 col-form-label text-md-end">{{ __('Серия') }}</label>
                                                <div class="col-md-8 ">
                                                    <input id="Serial" type="text" lang="en" class="form-control" name="Serial" required>
                                                
                                                </div>

                                            </div>         
                                            <br>
                                            <div class="row mb-12">
                                                <label for="Nomer" class="col-md-4 col-form-label text-md-end">{{ __('Номер') }}</label>
                                                <div class="col-md-8">
                                                    <input id="numbers" type="number" class="form-control" name="Nomer" maxlength="7" min="7" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                                                    
                                                   
                                                </div>

                                            </div>         <br>



                                            <div class="row mb-12">
                                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Комментраии ') }}</label>
                                                <div class="col-md-8">
                                                    <textarea id="comment" type="text" class="form-control text" name="comment"></textarea>
                                                </div>
                                            </div>
                                            <br>

                                            <div class="row mb-0">
                                                <div class="col-md-8 offset-md-4">
                                                    <button type="submit"  id="submit" class="btn btn-primary" disabled>
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
    <div id="alert" style="margin-top:-450px;position: relative;">
   
    </div>
  
@endsection

 
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/ajax.min.js')}}"></script>

<script type="text/javascript">

    $(document).ready(function(){

       
        $('select').on('change', function() {
            $(':input[type="submit"]').prop('disabled', true);
        });
        $("#numbers,#Serial,#naminal,#count").keyup(function(){
           
           var serial=$('#Serial').val();
           var naminal=$('#naminal').val();
           var number=$("#numbers").val();
           var count=$("#count").val(); 
          /// var edin=$("#edin_id").attr('kol');
           var edin = $('#edin_id option:selected').attr('kol');
        
        if(serial.length==2 && number.length==7 && naminal.length<=3 &&  naminal.length>0 &&  count.length>0)
        {
           
        
        var token = $('meta[name="csrf-token"]').attr('content');
           $.ajax({ 

            header:{
          'X-CSRF-TOKEN': token
        },
                    url: "{{route('emissionAjaxR.post','priznak=1')}}",
                    type:"GET",
                    data:{
                        "_token": "{{ csrf_token() }}",
                        serial:serial,number:number,naminal:naminal,edin:parseFloat(edin),count:parseFloat(count),

                    },
                    success:function(response){
                        // alert(response);
                        // return;
                             if(parseFloat(response)==1)
                             {
                                $("#alert").html("");
                                $(':input[type="submit"]').prop('disabled', false);
                                // alert(number.length);
                               return;
                             }
                             $(':input[type="submit"]').prop('disabled', true);
                           $("#alert").html(response);
                           return;
                    },
                });
               return;
            }
            $(':input[type="submit"]').prop('disabled', true);
            return;
           
           

      });
 

    });

 




</script>
 
