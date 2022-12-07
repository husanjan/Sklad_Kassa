{!! $response->links() !!}   
<div id="load" style="position: relative;">
<table class="table col-md-auto">
    <tbody><tr class="something">
        <th>#</th>
        <th class="col-md-3">Дата</th>
        <th>Бик</th>
        <th>Признак</th>
        <th>Номер док</th>
        <th>Номер счета</th>
        <th>Сумма</th>
    </tr>
    @php($count=0)
           @foreach(json_decode($response->groupBy('kod_oper'),true) AS  $key=>$oborots)

        @php($count++)



    <tr>
        <input type="hidden" id="pr{{array_keys(array_count_values(array_map(function($value){return   $value['kod_oper'];},$oborots)))[0]}}" value="{{array_keys( array_count_values(array_map(function($value){return   $value['priznak'];},$oborots)))[0]}}">
         <td><b>{{ $response->firstItem() + $loop->index; }}</b></td>   
<td id="da{{array_keys(array_count_values(array_map(function($value){return   $value['kod_oper'];},$oborots)))[0]}}"> {{date("d-m-Y H:i:s", strtotime(  array_keys( array_count_values(array_map(function($value){return   $value['date'];},$oborots)))[0]))}} </td>
@foreach($bik AS $biks)


@if($biks->id===array_map(function($value){return   $value['bik'];},$oborots)[0])
<td class="col-md-2" id="bik{{array_keys(array_count_values(array_map(function($value){return   $value['kod_oper'];},$oborots)))[0]}}">
{{ $biks->full_name }} 
</td>
@else
<td></td>
@endif

@endforeach
@if(array_keys(array_count_values(array_map(function($value){return   $value['priznak'];},$oborots)))[0]==0)
<td class="col-md-2 " id="priznak{{array_keys(array_count_values(array_map(function($value){return   $value['kod_oper'];},$oborots)))[0]}}"> Приход </td>
@else
 <td id="priznak{{array_keys(array_count_values(array_map(function($value){return   $value['kod_oper'];},$oborots)))[0]}}"> Расход</td>

@endif

        <td>{{array_keys( array_count_values(array_map(function($value){return   $value['n_doc'];},$oborots)))[0]}} </td>
        @foreach($sprAccounts AS $sprAccount)


            @if($sprAccount->id===array_keys(array_count_values(array_map(function($value){return   $value['account_id_in'];},$oborots)))[0])
                <td class="col-md-2" id="acn{{array_keys(array_count_values(array_map(function($value){return   $value['kod_oper'];},$oborots)))[0]}}">
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
</div>
<div class="oborotpul">
    {!! $response->links() !!}   
</div>