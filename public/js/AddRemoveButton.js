
   
$(document).ready(function(){

    //remove button
    
    $("#remove,#remove3,#remove5,#removet,#removeb,#removec,#remove4,#removep,#removed,#removee,#removef,#removeg,#removeh,#removej,#removek,#removeq,#removew,#removo,#removey,#removeu,#removei,#remove7").click(function(){
     var id_btn=$(this).val();
    
     var   nominal= $('#'+'nominal'+id_btn).val();
     var idv=id_btn.substr(-2,1);
    
     var last_chq_no = $('#total_chq'+id_btn).val();
      console.log(last_chq_no);
     if(last_chq_no>1){
    
         $('#new'+id_btn.substr(0,1)+last_chq_no).remove();
         $('#total_chq'+id_btn).val(last_chq_no-1);
    
         var sum= SumEdinCount('[id^=new'+idv+']',nominal);
         $("#sum"+id_btn).html(sum);
    
    
     }
    
    });
    //add button
    
    
    function selectValidation(id_select) {
     var selectIsValid = true;
     $(id_select).each(function() {
         if (isNaN(parseFloat($(this).val()))) {
             selectIsValid = false;
             return; // skip remaining checks
         }
     });
     return selectIsValid;
    }
    $("#add,#add3,#add5,#addt,#addb,#addc,#addd,#adde,#addf,#addg,#addh,#addj,#addk,#addq,#addw,#addy,#addu,#addi,#addo,#addp,#add4,#add7").click(function(){
    
    
    
    
     var id_btn=$(this).val();
    
         
     //  console.log('.selects'+id_btn);
      var idv=id_btn.substr(-2,1);
     
     var  new_btn=parseInt($('#total_chq'+id_btn).val())+1;
     var values=$("#total_chq"+id_btn).val();
     var counts=$("#count"+idv+values).val();
      console.log('.selects'+idv);
    
    
    
    
     if(selectValidation('.selects'+id_btn) && counts>0 && values<=9)
     {
     var   nominal= $('#'+'nominal'+id_number).val();
     var   nominalsss= $('input[id^=count]').val();
     var   edins= $("#edin_id"+id_number).val();
    
    
     var val_nominal=$("#nominal"+id_btn).val();
     var val_edin=$("#edin_id"+idv+values).val();
     var val_count=$("#count"+idv+values).val();
    
     var $safe_id = $("#safe_id"+id_btn+" > option").clone();
     var $edin_id = $("#edin_id"+id_btn+" > option").clone();
    
    
     var new_input='<div class="row  mt-2" id="new'+idv+new_btn+'"><div>';
    
     var edi= '<div class="col-md-2   ">  <div>';
     var select_edin='<select id="edin_id'+idv+new_btn+'"  class="form-select Somon selects edin_id'+id_btn+'  edin_id" name="ed_id'+idv+'[]" > </select>';
     var select_edin= $(select_edin).append($edin_id);
     var edinLabel='<label for="edin_id'+idv+new_btn+'">Единиц	</label>';
     var edins=$(edi).append(edinLabel,select_edin);
     var counts= '  <div class="col-md-1  "><label for="count'+idv+new_btn+'">Кол-во	</label><input      style="width: 05rem;" id="count'+idv+new_btn+'"   type="text"  name="count'+idv+'[]" class="form-control Somon  count"></div>';
       // ..Хранилище тег
     var saf='<div class="col-md-2 "></div>';
     var safeLabel='<label for="safe_id0'+new_btn+'">Хранилище</label>';
     var safe_Select='   <select name="safe_id'+idv+'[]"   id="safe_id'+idv+new_btn+'" style="width: 08rem;" class="form-control  Somon selects'+id_btn+'"></select>   <input     id="nominal'+val_nominal+'"  value="1" disabled  type="hidden"  name="nominal"     >';
     safe_Select=$(safe_Select).append($safe_id);
     var safes=$(saf).append(safeLabel,safe_Select);
     // ..Хранилище тег end
     var shkaf=' <input     id="summ'+idv+new_btn+'"    type="hidden"  name="summacounts'+idv+'[]" > <div class="col-md-2">  <label for="shaving0">Шкаф	</label><select style="width: 08rem;" name="shaving'+idv+'[]"   id="shaving'+idv+new_btn+'" class="form-control Somon selects'+id_btn+'"><select></div>';
     var ryad='<div class="col-md-2   "><label for="qator_id'+idv+new_btn+'">Ряд	</label><select name="qator_id'+idv+'[]" style="width: 08rem;"    id="qator_id'+idv+new_btn+'" class="form-control Somon selects'+id_btn+'"></select></div>';
     var cell='<div class="col-md-1   "> <label for="cells0'+new_btn+'">Ячейка</label> <select name="cells'+idv+'[]"   id="cells'+idv+new_btn+'" class="form-control  Somon selects'+id_btn+'"></select></div>    <input     id="nominal'+idv+new_btn+'"  value="1" disabled  type="hidden"  name="nominal"     >';
    
    
    
     var new_ip=$(new_input).append(edins,counts,safes,shkaf,ryad,cell);
    
     $('#new_chq'+id_btn).append(new_ip);
    
    
    
     $('#total_chq'+id_btn).val(new_btn);
     $('#edin_id'+idv+id_btn).append($safe_id);
    
     return;
    }
     $('.toast').toast('show');
    });
    
    // clear  input section button
    $("#clear").click(function(){
    
    var  id= $(this).val().substr(-2);
    
     // $('#'+'nominal'+id).val("");
     $('#'+'count'+id).val("");
     $('#'+'sum'+id).html("");
     $('#'+'shaving'+id).html("");
     $('#'+'shaving'+id).html("");
     $('#'+'qator_id'+id).html("");
     $('#'+'cells'+id).html("");
    });
    // clear  input section button end
    //submit button posle send
    $('form').submit(function (){
     $(this).find("button[type='submit']").prop('disabled',true);
    });
    
    //submit button posle send
    var id_number='';
    
    
    
    
    
    
    
    });