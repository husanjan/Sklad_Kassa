<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8">
    <link href=" {{asset('css/styles.css')}}" rel="stylesheet">
    <style>
        table{
            width: 100%;
            border-collapse: collapse;
            border: 1px solid lightgrey;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid lightgrey;
            border-radius: 10px;
            border-collapse: collapse;
        }
        *{ font-size: 10px;line-height: 18px}
        table th{padding: 5px;font-weight: bold}
        table td{padding: 5px}
        .contract th{padding: 3px 0;vertical-align: top;text-align: left;font-size: 13px;line-height: 15px}
        .list thead .list tbody {border:20px solid #000}
        .list thead th{padding: 4px 0;border: 1px solid #000;vertical-align: middle;text-align: center}
        .list thead th{padding: 4px 0;border: 1px solid #000;vertical-align: middle;font-size: 11px;line-height: 13px}
         /*.list tbody td{padding: 0 2px;border:1px solid #000;vertical-align: middle;font-size: 14px;line-height: 13px}*/
        body { font-family: DejaVu Sans, sans-serif; }
    </style>
</head>
<body>
<center>
    <table class="table table-bordered list"  style=" " >

        <tr>
            <th>#</th>
            <th>Дата</th>
            <th>Номинал</th>
            <th>Эдиницы</th>
            <th>Количество</th>
            <th>Серия</th>
            <th>Номер</th>
            <th>Сумма</th>
            <th>Хранилище</th>
            <th>Шкаф/Cтилаж</th>
            <th>Ряд</th>
            <th>Ячейка</th>

        </tr>
        @if(!empty($FondEmisions))
            @foreach($FondEmisions As $key=>$fondEmisions)

                <tr>
                    <td><b>{{  ($FondEmisions->currentpage()-1)*$FondEmisions->perpage()+$key+1 }}</b></td>
                    <td> {{date('d.m.Y',strtotime($fondEmisions->date))}}  </td>
                    <td> {{ $fondEmisions->naminal}}  </td>
                    <td>

                        @foreach($sprEds AS $sprEd)
                            @if($fondEmisions->ed_id==$sprEd->id)
                                {{$sprEd->name}}
                            @endif
                        @endforeach
                    </td>
                    <td> {{ $fondEmisions->kol}}  </td>
                    <td> {{ $fondEmisions->serial}}  </td>
                    <td>
                        <?php  $num=7-strlen($fondEmisions->nn); ?>
                        @for($i=1; $i<=$num;$i++){{"0"}}@endfor{{$fondEmisions->nn}}
                    </td>
                    <td> {{ $fondEmisions->summa}}  </td>

                    <td>
                        @foreach($safes AS $safe)
                            @if($fondEmisions->safe_id==$safe->id)
                                {{$safe->safe}}
                            @endif
                        @endforeach

                    </td>
                    <td>

                        @foreach($shkafs AS $shkaf)
                            @if($fondEmisions->shkaf_id==$shkaf->id)
                                {{$shkaf->shkaf}}
                            @endif
                        @endforeach

                    </td>
                    <td>

                        @foreach($sprQators AS $sprQator)
                            @if($fondEmisions->qator_id==$sprQator->id)
                                {{$sprQator->qator}}
                            @endif
                        @endforeach
                    </td>
                    <td>

                        @foreach($sprCells AS $sprCell)
                            @if($fondEmisions->cell_id==$sprCell->id)
                                {{$sprCell->cell}}
                            @endif
                        @endforeach

                    </td>



                </tr>
            @endforeach
        @endif

    </table>

</center>

</body>
</html>
