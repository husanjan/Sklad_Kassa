


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


function  sumcounts()
{
    var arr=document.querySelectorAll('.count');
    var total=0;
    for(var i=0;i<=arr.length;i++)
    {

        if(parseFloat(arr[i].value)){

            total+=parseFloat(arr[i].value);
        }

        $('#countsum').html("<b> Общие сумма:"+ total+" сомони</b>");
    }
}
function add()
{
    var  new_btn=parseInt($('#total_chq').val())+1;

    if(new_btn<=13){


        var new_input='<div class="row offset-1 mt-2" id="new_'+new_btn+'">  <div class="col-md-4  ">     <div class="input-group"> <span class="input-group-text">Номинал '+new_btn+'</span><input  id="summa'+new_btn+'h"  required   type="text"  class="form-control nomcou" name="nominal[]"  > </div></div> <div class="col-md-4 "> <div class="input-group"> <span class="input-group-text">Сумма</span><input   required   type="text"  class="form-control count" name="summa[]"      id="summa'+new_btn+'" > </div></div> </div>';
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
$(document).on('keyup','.count,.nomcou',function (){
 

  var  classes = $('form-control').find('is_invalid').val();
   
    console.log($('input[id^="summacounts"').val());
    var  id = $(this).attr('id');
    $("#"+id.slice(0,-1)).val("");
    var valueField=$(this).attr('id');
    //id nominal
    var nominal=parseFloat($('#'+valueField+'h').val());


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
      


            if(summ%nominal===0 && summ>0)
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
