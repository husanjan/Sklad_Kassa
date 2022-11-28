 //button priznak
 $(document).on("click",'#priznak',function(){
    //  alert($(this).val());
    $("#textpriznak").text($(this).text());
    $("#valuepriznak").val($(this).val());
     var src= '<input type="hidden" name="src" value="7">';
     var src1far= '<input type="hidden" name="src" value="3">';
     var src1= '<label for="schet">Счет	</label> <div class="btn-group"> <input type="radio" class="btn-check" name="src" id="option1" autocomplete="off"  value="7" required /><label class="btn btn-outline-secondary" for="option1">Оборот</label> <input type="radio" class="btn-check" name="src" id="option2"  value="2" autocomplete="off" required /><label class="btn btn-outline-secondary" for="option2">Фарсуда</label> </div>';
     var srcfar= '<label for="schet">Счет	</label> <div class="btn-group"> <input type="radio" class="btn-check" name="src" id="option1" autocomplete="off"  required value="7" /><label class="btn btn-outline-secondary" for="option1">Оборот</label> <input type="radio" required class="btn-check" name="src" id="option2"  value="1" autocomplete="off" /><label class="btn btn-outline-secondary" for="option2">Коршоям</label> </div>';
     
     var srcbot1= '<label for="schet">Счет	</label> <div class="btn-group"> <input type="radio" class="btn-check" name="src" id="option1" autocomplete="off"  required value="7" /><label class="btn btn-outline-secondary" for="option1">Душанбе</label> <input type="radio" required class="btn-check" name="src" id="option2"  value="1" autocomplete="off" /><label class="btn btn-outline-secondary" for="option2">Нобудкуни</label> </div>';

       if($(this).val()==0)
       {
          $('#src').html(src);
          $('#srcfar').html(srcfar);
        return; 
       }
   
       $('#srcbot').html(srcbot1);
         $('#src').html(src1);
         $('#srcfar').html(src1far);
    });
//submit click Button
$(document).on("click",'#flexSwitchCheckChecked',function(){
var $safe_id = $("#safe_id01 > option").clone();
      var row=' <div class="row offset-1" id="new'+$(this).val().substr(-1)+'"></div>';

      var suminput='  <div class="col-md-1  ">  <label for="count0s">Сумма	</label>   <input      style="width: 05rem;"    id="countSums'+$(this).val()+'" data-id="'+$(this).val().substr(-1)+'"  type="text"  name="summcou'+$(this).val().substr(-1)+'" class="form-control Somon "> </div>';
      var safe_label='  <label for="safe_id0s">Хранилище</label>';
      var shkaf_label='  <label for="shaving0s">Шкаф</label>';
      var ryad_label='  <label for="qator_id0s">Ряд</label>';
      var cells_label='  <label for="cells'+$(this).val().substr(-1)+'s">Ячейка</label>';
      var safe_select='<select name="safe_id'+$(this).val()+'s"   id="safe_id'+$(this).val().substr(-1)+'s" class="form-control selects0s Somon"></select>';
      var shaving_select='<select name="shaving'+$(this).val()+'s"   id="shaving'+$(this).val().substr(-1)+'s" class="form-control selects'+$(this).val().substr(-1)+'1 Somon"> <option   selected value="">Выберите </option></select>';
      var qator_id_select='<select name="qator_id'+$(this).val()+'s"   id="qator_id'+$(this).val().substr(-1)+'s" class="form-control selects01 Somon"> <option   selected value="">Выберите </option></select>';
      var cells_select='<select name="cells'+$(this).val()+'s"   id="cells'+$(this).val().substr(-1)+'s" class="form-control selects01 Somon"> <option   selected value="">Выберите </option></select>';
      var divsize='<div class="col-md-2"></div>';
      var select_edin= $(safe_select).append($safe_id);
      var edin=$(divsize).append(safe_label,select_edin);
      var shkaf=$(divsize).append(shkaf_label,shaving_select);
      var ryad=$(divsize).append(ryad_label,qator_id_select);
      var cells=$(divsize).append(cells_label,cells_select);
      var all=$(row).append(suminput,edin,shkaf,ryad,cells);

    if($(this).prop('checked'))
    {
        $('#'+$(this).val()).html(all);
        return;
    }
              $('#'+$(this).val()).html('');
});