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
        <input type="hidden" id="prOB{{array_keys(array_count_values(array_map(function($value){return   $value['kod_oper'];},$oborots)))[0]}}" value="{{array_keys( array_count_values(array_map(function($value){return   $value['priznak'];},$oborots)))[0]}}">
         <td><b>{{ $response->firstItem() + $loop->index; }}</b></td>   
<td id="daOB{{array_keys(array_count_values(array_map(function($value){return   $value['kod_oper'];},$oborots)))[0]}}"> {{date("d-m-Y H:i:s", strtotime(  array_keys( array_count_values(array_map(function($value){return   $value['date'];},$oborots)))[0]))}} </td>
@foreach($bik AS $biks)


@if($biks->id==array_map(function($value){return   ($value['Bik']>0)?$value['Bik']:'';},$oborots)[0])
<td class="col-md-2" id="bikOB{{array_keys(array_count_values(array_map(function($value){return   $value['kod_oper'];},$oborots)))[0]}}">
{{ $biks->full_name }} 
</td>
    
        @endif
 
@endforeach
@if(array_map(function($value){return   ($value['Bik']>0)?$value['Bik']:'bik';},$oborots)[0]=='bik')
<td></td>
@endif
@if(array_keys(array_count_values(array_map(function($value){return   $value['priznak'];},$oborots)))[0]==0)
<td class="col-md-2 " id="priznakOB{{array_keys(array_count_values(array_map(function($value){return   $value['kod_oper'];},$oborots)))[0]}}"> Приход </td>
@else
 <td id="priznakOB{{array_keys(array_count_values(array_map(function($value){return   $value['kod_oper'];},$oborots)))[0]}}"> Расход</td>

@endif

        <td>{{array_keys( array_count_values(array_map(function($value){return   $value['n_doc'];},$oborots)))[0]}} </td>
        @foreach($sprAccounts AS $sprAccount)


            @if($sprAccount->id===array_keys(array_count_values(array_map(function($value){return  ( $value['account_id_out']>0)? $value['account_id_out']:'';},$oborots)))[0])
                <td  id="acnOB{{array_keys(array_count_values(array_map(function($value){return   $value['kod_oper'];},$oborots)))[0]}}">
                    {{ $sprAccount->account }} </td>
            @endif
        @endforeach
        @if(array_keys(array_count_values(array_map(function($value){return  ( $value['account_id_out']>0)? $value['account_id_out']:'Bik';},$oborots)))[0]=='Bik')
        <td   >
             </td>
    @endif
        <td class=" ">

            <a class=" link-primary       Oborot_id"  href="#" data-toggle="modal" data-target="#AjaxTableOborot"   id="{{array_keys(array_count_values(array_map(function($value){return   $value['kod_oper'];},$oborots)))[0]}} "  value="{{array_keys(array_count_values(array_map(function($value){return   $value['kod_oper'];},$oborots)))[0]}}">
    <i class="text-dark fa fa-eye"></i>     {{   array_sum(array_map(function($value){return   $value['summa'];}, $oborots)) }}  </a></td>


    </tr>

    @endforeach

    </tbody>
</table>
</div>
<div class="oborotpul">
    {!! $response->links() !!}   
</div>