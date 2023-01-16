@extends('layouts.app')

@section('content')
 
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Главная</a></li>
      <li class="breadcrumb-item " aria-current="page">Остатки</li>
      <li class="breadcrumb-item active"><a href="#">Хранилище</a></li>
 
    </ol>
  </nav>
   <div class="container">
    <div class="row    mt-2">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                @foreach ($SprSafes as $SprSafe)
                    
            
 <button class="nav-link  {{ $SprSafe->safe==1? 'active':''}}" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-{{$SprSafe->id}}" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
    Хранилище  {{$SprSafe->safe}}</button>
             
            @endforeach
  </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            @foreach ( $SprSafes as $SprSafe)
         
            <div class="tab-pane fade show {{ $SprSafe->safe==1? 'active':''}}"  id="nav-{{$SprSafe->id}}" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row  mt-2" id="new{{$SprSafe->id}}">
                  <div class="col-md-1">  <label for="shavingq1">Шкаф	</label>
                        <select  id="{{$SprSafe->id}}" class="form-control shaving{{$SprSafe->id}}">
                            <option selected value="">Выберите </option>
                                @foreach ($shkafs as $shkaf)
                                @if($shkaf->safe_id==$SprSafe->id)
                                <option  value="{{$shkaf->id}}">{{$shkaf->shkaf}}</option>
                                @endif
                              
                                @endforeach
                          
                           
                           
                
                        </select>
                    </div>
                    <div class="col-md-1   ">
                        <label for="">Ряд	</label>
                        <select   id="{{$SprSafe->id}}" class="form-control  qator{{$SprSafe->id}}">
                            <option selected value="">Выберите </option>
                            @foreach ($sprQators as $sprQator)
                            @if($sprQator->safe_id==$SprSafe->id)
                            <option  value="{{$sprQator->id}}">{{$sprQator->qator}}</option>
                            @endif
                          
                            @endforeach
                      
                
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="cellsq">Ячейка</label>
                        <select name="cellsq[]" id="{{$SprSafe->id}}" class="form-control   cells{{$SprSafe->id}}">
                            <option selected value="">Выберите </option>
                            @foreach ($sprCells as $sprCell)
                            @if($sprCell->safe_id==$SprSafe->id)
                            <option  value="{{$sprCell->id}}">{{$sprCell->cell}}</option>
                            @endif
                            @endforeach
                
                        </select>
                    </div>
                    <div class="col-md-3 mt-4">
        
       
                    </div>
                </div>
                <div class="card mt-1" style="width: auto;">
                    <div class="card-body">
                        @foreach ($AllOstatki as $AllOstatks)
                        @if($AllOstatks->safe_id===$SprSafe->id AND $AllOstatks->summa>0)
                           {{-- {{$AllOstatks->summa}} --}}
                           <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Шкаф</th>
                                <th scope="col">Ряд</th>
                                <th scope="col">Ячейка</th>
                                <th scope="col">Купюра</th>
                                <th scope="col">Номинал</th>
                                <th scope="col">Сумма</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                             
                              </tr>
                              <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                               
                              </tr>
                              <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                              
                              </tr>
                            </tbody>
                          </table>
                           @endif
                        @endforeach
                    </div>
                  </div>
            
            </div>
         
        
            @endforeach
 
          </div>
      
    </div>
   </div>
@endsection
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/ajax.min.js')}}"></script>
<script>
 $( document ).ready(function() {

    $('select').on('change', function() {
     alert($('.shaving'+ $(this).attr('id')).val());
     alert($('.qator'+ $(this).attr('id')).val());
     alert($('.cells'+ $(this).attr('id')).val());   
      alert($('.cells'+ $(this).attr('id')).val());
   });
       

    //     $.ajax({
    //      url: "{{route('shkafTable.post')}}",
    //      type:"POST",
    //      data:{
    //          "_token": "{{ csrf_token() }}",
    //          id:this.value

    //      },
    //      success:function(response){


    //          for (const [key, value] of Object.entries(response)) {
    //              var newMsgs='<option  value="'+value.id+'">'+value.shkaf+'</option>';

    //              shaving.append(newMsgs);

    //          }

    //      },
    //  });


 
 
});
 
 
 
</script>