function  sumcounts()
{
    var arr=document.querySelectorAll('.count');
    var total=0;
    // for(var i=0;i<=arr.length;i++)
    // {

    //     // if(parseIN(arr[i].value)){

    //     //     total+=parseFloat(arr[i].value);
    //     // }

    //     $('#countsum').html("<b> Общие сумма:"+ total+" сомони</b>");
    // }
    //   alert$(%('#oborot').val())
 
    $('.countOborot').each(function(element,index){
        //if statement here 
        // use $(this) to reference the current div in the loop
        //you can try something like...
                   if(parseInt(index.value))
                   {
                    total+=parseInt(index.value);
                    // console.log(index.value);
                   }
                //   alert(total);
                 //  $('#countsum').html("<b> Общие сумма:"+ total+" сомони</b>");    
    
    
     });
    // Array.from(arr).forEach((element, index) => {
    //     // conditional logic here.. access element
    //     // console.log(element.value);
    //     total+=parseFloat(element.value);
    //   });
      
}
function addOborot(id){
  
    var  new_btn=parseInt($('#total_oborot').val())+1;

    if(new_btn<=13){
        
       
        
        
       
        
      var selection=  '<select   class="form-select" id="summa'+new_btn+'h"   name="nominal[]" autofocus required>'+
        '<option value="">Интихоб</option> <option value="0.01">1 дирам </option> <option value="0.05">5 дирам</option><option value="20">20 дирам</option><option value="50">50 дирам</option><option value="1">1 сомони</option><option value="3">3 сомони</option><option value="5">5 сомони</option><option value="10">10 сомони</option> <option value="20">20 сомони</option><option value="50">50 сомони</option><option value="100">100 сомони</option><option value="200">200 сомони</option><option value="500">500 сомони</option>   </select>'
        
       var new_input='<div class="row offset-1 mt-2" id="new_'+new_btn+'">  <div class="col-md-4  ">     <div class="input-group"> <span class="input-group-text">Номинал '+new_btn+'</span>  '+selection+'</div></div> <div class="col-md-4 "> <div class="input-group"> <span class="input-group-text">Сумма</span><input   required   type="text"  class="form-control countOborot" name="summa[]"      id="summa'+new_btn+'" > </div></div> </div>';
 
         if(id==9898)
         {
            new_input='<div class="row offset-1 mt-2" id="new_'+new_btn+'">     <div class="col-md-4 "> <div class="input-group"> <span class="input-group-text">Сумма</span><input   required   type="text"  class="form-control count" name="summa[]"      id="summa'+new_btn+'" > </div></div> </div>';
  
         }
             $('#new_oborot').append(new_input);
        $('#total_oborot').val(new_btn);
        //(false);

        arrinput.push({id:'summa'+new_btn,index:new_btn});

        sumcounts();

    }
}
function removeOborot(){
    
    var last_chq_no = $('#total_oborot').val();

    if(last_chq_no>1){

        $('#new_'+last_chq_no).remove();
        $($(this).attr('id')).remove();

        $('#total_oborot').val(last_chq_no-1);
        $('#countsum').html("");
        disabledTrue();
        sumcounts();

    }
}
function disabledFalse(status=true)
{
    if(status)
    {
      //  $("#alerts").addClass("show");
    }

    $("#adds").prop("disabled",true);
    $('#countsum').html("");
    $(".addform").prop("disabled",true);
}
function disabledTrue()
{

    $("#alerts").removeClass("show");



    $("#adds").prop("disabled", false);

    $(".addform").prop("disabled",false);
}
//add cunftion create element input  nominal and summa
var arrinput= [{id:'summas',index:1}];




function add(id)
{
    var  new_btn=parseInt($('#total_chq').val())+1;
    
    if(new_btn<=13){
        var new_input='<div class="row offset-1 mt-2" id="new_'+new_btn+'">  <div class="col-md-4  ">     <div class="input-group"> <span class="input-group-text">Номинал '+new_btn+'</span><input  id="summa'+new_btn+'h"  required   type="text"  class="form-control nomcou" name="nominal[]"  > </div></div> <div class="col-md-4 "> <div class="input-group"> <span class="input-group-text">Сумма</span><input   required   type="text"  class="form-control count" name="summa[]"      id="summa'+new_btn+'" > </div></div> </div>';
 
         if(id==9898)
         {
            new_input='<div class="row offset-1 mt-2" id="new_'+new_btn+'">     <div class="col-md-4 "> <div class="input-group"> <span class="input-group-text">Сумма</span><input   required   type="text"  class="form-control count" name="summa[]"      id="summa'+new_btn+'" > </div></div> </div>';
  
         }
              $('#new_chq').append(new_input);
        $('#total_chq').val(new_btn);
        //(false);

        arrinput.push({id:'summa'+new_btn,index:new_btn});

        sumcounts();

    }

}
 
var total=0;
///onkey up input summa nominal
var summincrement=0;
var nominalincrement=0;

function nomininc()
{
    var row=$('.nomcou');
    var length=row.filter(function (){
        if(this.value>0)
        {
            return !!this.value.length;
        }
    }).length;
    if(length>0){
        return  length;
    }
}
function countinc()
{
    var row=$('.count');
    var length=row.filter(function (){
        if(this.value>0)
        {
            return !!this.value.length;
        }

    }).length;
    if(length>0){
        return  length;
    }

}
   var numsum=0;
$(document).on('keyup','.countOborot,.nomcou',function (){
  var   total=0;
    $('.countOborot').each(function(element,index){
        //if statement here 
        // use $(this) to reference the current div in the loop
        //you can try something like...
                   if(parseInt(index.value))
                   {
                    total+=parseInt(index.value);
                            
                   }
                //   alert(total);
             
    
    
     });
    //    console.log(total);
     $("#countsumOborot").html("<b> Общие сумма:"+ total+" сомони</b>");    
  var  classes = $('form-control').find('is_invalid').val();
     // alert($(this).val());
    
    var  id = $(this).attr('id');
    $("#"+id.slice(0,-1)).val("");
    var valueField=$(this).attr('id');
    //id nominal
    var nominal=parseFloat($('#'+valueField+'h').val());
 
    let NomOfAll=nominal;
    if(nominal<1)
    {
        NomOfAll=nominal*10;
    }
    //   alert($('#oborot').val())
   // countinc();
        var check=$(this).val()%$('#oborot').val()==0;
        if(check==false)
        {
        
            return;
        }
 

    // console.log(NomOfAll);
    if($(this).val()>0 && nomininc()==countinc()){
        var summ=parseFloat($(this).val());

        //nominal value
        //var nominal= parseInt(nominal.substr(nominal.indexOf('.')+1));
        //console.log(nominal);
        //value summ
         
        $('input[name^="summa"]').each(function()
        {


            var nominal1=$(this).val();
            var sum_id='#'+$(this).attr('id');
            var nom_id='#'+$(this).attr('id')+'h';
            var class_id=$(this).attr('class');
        
           
            if(nominal<1)
            {
                NomOfAll= nominal*10;
            }
            console.log(NomOfAll);
            if(summ%NomOfAll===0 && summ>0)
            {




                $('#'+id).removeClass( "is-invalid");
                $('#'+id+'h').removeClass( "is-invalid");

                disabledTrue();
                sumcounts();


            }else{

                if(sum_id=='#'+id)
                {
                    disabledFalse();
                    
                    $(sum_id).addClass( "is-invalid");
                    $(sum_id+'h').addClass( "is-invalid");

                    $(".addform").prop("disabled",true);

                }


            }
            disabledFalse();

                 
        });

    }else{
        disabledFalse();
        // var id=$(this).attr('id');

        $("#"+id.slice(0,-1)).val("");
    }

    $(arrinput).each(function (e,i) {

        if($("#"+i.id).val()<1 || $("#"+i.id+'h').val()<1)
        {

         disabledFalse();

        }else{
            sumcounts();
        }

    });
});

//delete input  nominal and summ
function remove(){

    var last_chq_no = $('#total_chq').val();

    if(last_chq_no>1){

        $('#new_'+last_chq_no).remove();
        $($(this).attr('id')).remove();

        $('#total_chq').val(last_chq_no-1);
        $('#countsum').html("");
        disabledTrue();
        sumcounts();

    }
}
