<form method="POST" action="{{route('fondunusable.store')}}">
  @csrf
  <input     value="1"   name="priznak" type="hidden">
  <input            name="kode_oper" type="hidden"   value="{{$kodeOper}}">
  <input            name="farsuda" type="hidden"   value="1" >
  <input type="hidden" name="src" value="4">
<!-- Modal -->
 
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
              {{-- <label for="" class="offset-md-9 mt-4">  <span class="badge badge-light text-black "><h6><b>Общие сумма :  {{ $allsumkorshoyam }}</b></h6></span> </label> --}}
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
            {{-- {{ dd($korshoyamRashod ) }} --}}
              @foreach( $korshoyamRashod AS  $korshoyamRashods)
              @if($korshoyamRashods->summa>0)
              <input type="hidden" name="id[]" value="{{$korshoyamRashods->id}}">
                <tr class="border-bottom" id="t{{$korshoyamRashods->id}}">
                  <td> {{ $i}} </td>
                 
                  <?php  $i++ ?>
                  @foreach ($safes as $safe)
                               
                  @if($korshoyamRashods->safe_id===$safe->id) <td> <input type="hidden" name="safe{{$korshoyamRashods->id}}" value="{{$safe->id}}">{{$safe->safe}}</td>  @endif
                  @endforeach
                  {{-- <td>{{ $ostatkiResults->safe_id }}</td> --}}
          
                  @foreach ( $shkafs as $shkaf)
         
                  @if($korshoyamRashods->shkaf_id===$shkaf->id) <td><input type="hidden" name="shkaf{{$korshoyamRashods->id}}" value="{{$shkaf->id}}">{{ $shkaf->shkaf }}</td>  @endif
                  @endforeach
                  @foreach ( $sprQators as $sprQator)
         
                  @if($korshoyamRashods->qator_id===$sprQator->id) <td><input type="hidden" name="sprQator{{$korshoyamRashods->id}}" value="{{$sprQator->id}}">{{ $sprQator->qator }}</td>  @endif
                  @endforeach
                  @foreach ( $sprCells as $sprCell )
         
                  @if($korshoyamRashods->cell_id===$sprCell->id) <td><input type="hidden" name="sprCell{{$korshoyamRashods->id}}" value="{{$sprCell->id}}">{{ $sprCell->cell }}</td>  @endif
                  @endforeach
                  @foreach ($sprEds as $sprEd )
         
                  @if($korshoyamRashods->ed_id===$sprEd->id) <td><input type="hidden" name="sprEd{{$korshoyamRashods->id}}" value="{{$sprEd->id}}" >{{ $sprEd->name }}</td>  @endif
                  @endforeach
            
                  <td> {{ $korshoyamRashods->naminal=='razne'?'Разные':$korshoyamRashods->naminal}} <input type="hidden"  id="naminal{{$korshoyamRashods->id}}"  name="naminal{{$korshoyamRashods->id}}" value="{{$korshoyamRashods->naminal}}"></td>
                  <td ><label for="" id="sumr{{$korshoyamRashods->id}}" class="{{$korshoyamRashods->id}}"><input type="hidden" name="ostatkiResults{{$korshoyamRashods->id}}" value="{{ $korshoyamRashods->summa}}"> {{$korshoyamRashods}}</label> сомони</td>
                  <td><input type="text" class="form-control col-md-4 summaR"  name="Summarashod{{$korshoyamRashods->id}}[]" id="{{$korshoyamRashods->id}}"></td>
                  
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
 </form>