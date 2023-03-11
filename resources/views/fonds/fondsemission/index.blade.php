@extends('layouts.app')

@section('content')

 <div class="container-fluid">
    <?php isset($_GET['page'])?$data=$_GET['page']:$data=1?>
    <div class="row">

        <div class="col-lg-2 margin-tb ml-2">

            <div class="pull-left">
                <h2>Эмиссионный фонд </h2>
            </div>

       
         
            <div class="btn-group" role="group" aria-label="Basic example">
                <a class="btn btn-primary" href="{{ route('fondemission.create',"id=0") }}"><i class="align-middle" data-feather="edit-3"></i>Приход  счета</a>
                <a class="btn btn-success" href="{{ route('fondemission.create',"id=1") }}"><i class="align-middle" data-feather="edit-3"></i>Расход  счета</a>
  
    
              </div>
{{--                            <div class="pull-right">--}}
{{--                                <a class="btn btn-success" href="{{ route('fondemission.show', $data) }}?page={{$data}}"><i class="align-middle" data-feather="edit-3"></i> Создание нового счета</a>--}}
{{--                            <button class="btn btn-danger" id="pdf" onclick="ExportToExcel()">OK</button>--}}
{{--                            </div>--}}
        </div>
        <div class=" mt-4">

        
         
       
            
{{--                            <div class="pull-right">--}}
{{--                                <a class="btn btn-success" href="{{ route('fondemission.show', $data) }}?page={{$data}}"><i class="align-middle" data-feather="edit-3"></i> Создание нового счета</a>--}}
{{--                            <button class="btn btn-danger" id="pdf" onclick="ExportToExcel()">OK</button>--}}
{{--                            </div>--}}
        </div>
        
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @php($count=0)

{{--                    <--Таблица Эмиссонный --}}

      
       
   <div id="tab" class="card col-md-6 ml-2">
    <a class="   offset-md-10" target="_blank"   href="{{ route('fondemission.show', date('d-m-Y').time()) }}?page={{$data}}"  > Просмотр_PDF</a>
    {!! $FondEmisions->links() !!}
    <table class="table table-bordered  "  id="tab">

        <tr>
            <th>#</th>
            <th>Дата</th>
            <th>Номинал</th>
            {{-- <th>Эдиницы</th> --}}
            {{-- <th>Количество</th> --}}
            <th>Серия</th>
            <th>Номер</th>
            <th>Сумма</th>
            <th>Хранилище</th>
            <th>Шкаф/Cтилаж</th>
            <th>Ряд</th>
            <th>Ячейка</th>
            {{-- <th> </th> --}}
        </tr>
        @if(!empty($FondEmisions))
        @foreach($FondEmisions As $key=>$fondEmisions)

            <tr>
                <td width="10"><b>{{  ($FondEmisions->currentpage()-1)*$FondEmisions->perpage()+$key+1 }}</b></td>
              <td width="20"> {{date('d.m.Y',strtotime($fondEmisions->date))}}  </td>
              <td width="10"> {{ $fondEmisions->naminal}}  </td>
              {{-- <td width="5">

                  @foreach($sprEds AS $sprEd)
                  @if($fondEmisions->ed_id==$sprEd->id)
                      {{$sprEd->name}}
                  @endif
                  @endforeach
              </td> --}}
              {{-- <td width="2"> {{ $fondEmisions->kol}}  </td> --}}
              <td width="10"> {{ $fondEmisions->serial}}  </td>
                <td width="30">
                     <?php  $num=7-strlen($fondEmisions->nn); ?>
                         @for($i=1; $i<=$num;$i++){{"0"}}@endfor{{$fondEmisions->nn}}
                </td>
                <td width="20"> {{$fondEmisions->summa}}  </td>

                <td width="1">
                    @foreach($safes AS $safe)
                        @if($fondEmisions->safe_id==$safe->id)
                            {{$safe->safe}}
                        @endif
                    @endforeach

                </td>
                <td width="2">

                    @foreach($shkafs AS $shkaf)
                        @if($fondEmisions->shkaf_id==$shkaf->id)
                            {{$shkaf->shkaf}}
                        @endif
                    @endforeach

                </td>
                <td width="2">

                    @foreach($sprQators AS $sprQator)
                        @if($fondEmisions->qator_id==$sprQator->id)
                            {{$sprQator->qator}}
                        @endif
                    @endforeach
                </td>
                <td width="2">

                    @foreach($sprCells AS $sprCell)
                        @if($fondEmisions->cell_id==$sprCell->id)
                            {{$sprCell->cell}}
                        @endif
                    @endforeach

                </td>
             {{-- <td id="delete">

                    {!! Form::open(['method' => 'DELETE','route' => ['fondemission.destroy', $fondEmisions->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td> --}}
        </tr>
        @endforeach
        @endif

    </table>
     <div class="col-md-12">
        {!! $FondEmisions->links() !!}
     </div>
   </div>
   
 </div>

@endsection
<script src="{{asset('js/ajax.min.js')}}"></script>
<script>
    //This is Function ExportToExcel convertation to Excel
    function ExportToExcel()
    {
         $("td#delete").each(function (){
             if($(this).html()==="")$(this).parent().remove();
         });
        // h.parentNode.removeChild(h);
        var htmltable=document.getElementById('tab');
             console.log(htmltable);
         var html=htmltable.outerHTML;

        //indow.open('data:application/vnd.ms-excel,'+encodeURIComponent(html));
        var result = 'data:application/vnd.ms-excel,' + encodeURIComponent(html);
        var link = document.createElement("a");
        document.body.appendChild(link);
        link.download = "download.xls"; //You need to change file_name here.
        link.href = result;
        link.click();
    }
</script>

