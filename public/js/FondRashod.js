$(document).ready(function(){
    //   name="naminal{{$ostatkiResults->id}}" 
 
$(".summaR").keyup(function(){
// console.log();
   //console.log(parseFloat($(this).val())/1000/parseFloat($('#naminal'+$(this).attr('id')).val())%1==0);
if(parseFloat($(this).val())/1000/parseFloat($('#naminal'+$(this).attr('id')).val())%1==0)
{


function selectValidation(id_select) {
 var selectIsValid = null;
 var incr=0;
 var decriment=0;
 
$('.summaR').each(function() {

    var values= $('#sumr'+$(this).attr('id')).text();
    if(parseFloat($(this).val())>0 && parseFloat($(this).val())/1000/parseFloat($('#naminal'+$(this).attr('id')).val())%1==0)
    {
    

         incr++;
      
        if(values>=parseFloat($(this).val())&& parseFloat($(this).val())>0)
        {
            decriment++;
            // console.log(values);
            if(incr==decriment)
    {
             selectIsValid=true;
             $(':input[type="submit"]').prop('disabled',true);
              return;
      }
        }

           
 
        }

        });


return     selectIsValid;
}


let id=$(this).attr("id");

    if(selectValidation())
    {
        $(':input[type="submit"]').prop('disabled', false);
    }else{
        $(':input[type="submit"]').prop('disabled', true);
       return;
    }


if($('#sumr'+id).text()>=parseFloat($(this).val()) && parseFloat($(this).val())>0)
{
      $('#t'+id).removeClass('border-danger');
     // $('#t'+id).addClass('border-success');
      return;

}else{
//  $('#t'+id).removeClass('border-success');
      $('#t'+id).addClass('border-danger');  
      $(':input[type="submit"]').prop('disabled', true);
      return;
}
//     if(selectValidation()==false){
//     $('#t'+id).removeClass('border-danger');  
//     $('#t'+id).removeClass('border-success');
//             return 
//    }
}else{
 
$(':input[type="submit"]').prop('disabled', true);
}
//end validate checked nomnal summa rashod summa
});

});