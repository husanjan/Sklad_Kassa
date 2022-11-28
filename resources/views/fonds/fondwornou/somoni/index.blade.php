
@section('content')
<div class="row  mt-2" id="OneSomon">
    <input     id="nominal01"  value="1" disabled  type="hidden"  name="nominal01[]"     >
    <div class="col-md-2   ">
        <label for="edin_id">Единиц	</label>
        <select id="edin_id01" class="form-select selects01" name="ed_id01"  >
            <option value="">Интихоб</option>
            @foreach($sprEds as $sprEd)
                <option value="{{$sprEd->kol}} " >{{$sprEd->name}}
                </option>
            @endforeach
        </select>

    </div>
    <div class="col-md-1  ">
        <label for="count01">Кол-во	</label>
        <input      style="width: 05rem;" id="count01"   type="text"  name="count01" class="form-control">

    </div>
    <div class="col-md-1 ">
        <label for="safe_id01">Хранилище</label>
        <select name="safe_id01 " required id="safe_id01" class="form-control selects01">
            <option disabled selected value="">Выберите</option>
            @foreach($safes as $safe)
                <option value="{{$safe->id}}">{{$safe->safe}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-1">  <label for="shaving01">Шкаф	</label>
        <select name="shaving01"   id="shaving01" class="form-control selects01">


        </select>
    </div>
    <div class="col-md-1   ">
        <label for="qator_id01">Ряд	</label>
        <select name="qator_id01"   id="qator_id01" class="form-control selects01">
            <option disabled selected value="">Выберите </option>

        </select>
    </div>
    <div class="col-md-2">
        <label for="cells01">Ячейка</label>
        <select name="cells01"   id="cells01" class="form-control selects01">


        </select>
    </div>
    <div class="col-md-3 mt-4">
        <button type="button"   class="btn btn-primary active" id="add"    value="01" > <i class="align-middle" data-feather="plus"></i></button>
        <button   id="remove" value="01" type="button"  class="btn btn-bitbucket active"><i class="align-middle" data-feather="trash-2"></i></button>
        <input type="hidden" value="1" id="total_chq01">
    </div>
</div>
@stop

