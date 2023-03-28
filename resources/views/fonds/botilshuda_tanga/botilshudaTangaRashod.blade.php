<form method="POST" action="{{route('botilshuda_tanga.store')}}">
    @csrf
    <input     value="1"   name="priznak" type="hidden">
    <input            name="kode_oper" type="hidden"   value="{{$kodeOper}}">
    <input            name="farsuda" type="hidden"   value="1" >
    <input type="hidden" name="src" value="4">
  <!-- Modal -->
 
    <div class="modal-dialog  modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Ботилшуда/Расход</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-3">
                    <label for="date">Дата</label>
                    <input  type="datetime-local"readonly="readonly"     style="width: 11rem;"     value="<?php echo date('Y-m-d H:i:s'); ?>"     name="date" class="form-control"    >

                    <input     value="1"    name="priznak" type="hidden"    >
                    <input            name="kode_operRashod" type="hidden"   value="{{$kodeOper}}">
                    <input            name="KorshoyamRashod" type="hidden"   value="3" >
                    <input          name="priznak" type="hidden" value="1"    >
               
                         
                   
                </div>
     
           
              
                <div class="col-md-2">
                    <label for="count01">Номер Документ	</label>
                    <input        type="text"  name="ndoc" class="form-control "  autocomplete="off" required>
                   
                </div>
               <div class="col-md-4 mt-4">
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="src" id="btnradio1" autocomplete="off" value="5" required="">
                    <label class="btn btn-outline-secondary" for="btnradio1">Душанбе</label>
                  
                    <input type="radio" class="btn-check" name="src" id="btnradio2" autocomplete="off" value="6" required="">
                    <label class="btn btn-outline-secondary" for="btnradio2">Нобудкуни</label>
         
                  </div></div> 
                 
                {{-- <label for="" class="offset-md-9 mt-4">  <span class="badge badge-light text-black "><h6><b>Общие сумма :{{$allsum }}</b></h6></span> </label> --}}
 
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
                @foreach($botilsudaRas AS  $ostatkiResults)
                @if($ostatkiResults->summa>0)
                <input type="hidden" name="id[]" value="{{$ostatkiResults->id}}">
                  <tr class="border-bottom" id="t{{$ostatkiResults->id}}">
                    <td> {{ $i}} </td>
                   
                    <?php  $i++ ?>
                    @foreach ($safes as $safe)
                                 
                    @if($ostatkiResults->safe_id===$safe->id) <td> <input type="hidden" name="safe{{$ostatkiResults->id}}" value="{{$safe->id}}">{{$safe->safe}}</td>  @endif
                    @endforeach
                    {{-- <td>{{ $ostatkiResults->safe_id }}</td> --}}
            
                    @foreach ( $shkafs as $shkaf )
           
                    @if($ostatkiResults->shkaf_id===$shkaf->id ) <td><input type="hidden" name="shkaf{{$ostatkiResults->id}}" value="{{$shkaf->id}}">{{ $shkaf->shkaf }}</td>  @endif
                    @endforeach
                    @foreach ( $sprQators as $sprQator )
           
                    @if($ostatkiResults->qator_id===$sprQator->id ) <td><input type="hidden" name="sprQator{{$ostatkiResults->id}}" value="{{$sprQator->id}}">{{ $sprQator->qator }}</td>  @endif
                    @endforeach
                    @foreach ( $sprCells as $sprCell )
           
                    @if($ostatkiResults->cell_id===$sprCell->id) <td><input type="hidden" name="sprCell{{$ostatkiResults->id}}" value="{{$sprCell->id}}">{{ $sprCell->cell }}</td>  @endif
                    @endforeach
                    @foreach ($sprEds as $sprEd )
           
                    @if($ostatkiResults->ed_id===$sprEd->id ) <td><input type="hidden" name="sprEd{{$ostatkiResults->id}}" value="{{$sprEd->id}}" >{{ $sprEd->name }}</td>  @endif
                    @endforeach
              
                    <td> {{ $ostatkiResults->naminal=='razne'?'Разные':$ostatkiResults->naminal}} <input type="hidden"  id="naminal{{$ostatkiResults->id}}"  name="naminal{{$ostatkiResults->id}}" value="{{$ostatkiResults->naminal}}"></td>
                    <td ><label for="" id="sumr{{$ostatkiResults->id}}" class="{{$ostatkiResults->id}}"><input type="hidden" name="ostatkiResults{{$ostatkiResults->id}}" value="{{ $ostatkiResults->summa}}"> {{ $ostatkiResults->summa}}</label> сомони</td>
                    <td><input type="text" class="form-control col-md-4 summaR"  name="Summarashod{{$ostatkiResults->id}}[]" id="{{$ostatkiResults->id}}"></td>
                    
                  </tr>@endif
                 
                @endforeach
        </tbody>
         </table>

            </div>
            <textarea name="comment" id="" cols="50" rows="3" class="form-control mt-1" placeholder="Коммент"></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыт</button>
          <button type="submit" class="btn btn-primary" disabled>Save changes</button>
        </div>
      </div>
    </div>
  </div>
   </form>