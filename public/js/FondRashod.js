$(document).ready(function(){
    //   name="naminal{{$ostatkiResults->id}}" 
    
 function validate()
 {
    const arrayValidate = [];
    const arrayValidateFalse = [];
    var selectIsValid = true;
    $('.summaR').each(function(key, element) {
        let id=$(this).attr("id");
    // alert(id);
        // console.log($(this).val());
    const edin=1000;
    // // alert(parseFloat($(this).val())*edin)
       
    var nominal=parseFloat($('#naminal'+$(this).attr('id')).val());
   
      if($(this).val())
     {
        //  && $('#sumr'+id).text()>=$(this).val()
  
            if(!parseFloat($(this).val())/edin/nominal%1==0) 
            {
          //  console.log(parseFloat($(this).val())/edin/nominal%1==0);

          arrayValidate[$(this).attr('id')] = parseFloat($(this).val())/edin/nominal%1==0;
            // arrayValidate.push(parseFloat($(this).val())/edin/nominal%1==0);
              return;
            }
    } 
         
      
   
       });
     return arrayValidate;
 }
 function CheckedValidate(array)
 {
     var Validat=true;
    array.forEach(function(item,index){
        if(item==false)
        {
            Validat=item;
            $(':input[type="submit"]').prop('disabled',true);
          return;
            
        }
       
          
     }); 
     return Validat;
 }
$(".summaR").keyup(function(){

   //console.log(parseFloat($(this).val())/1000/parseFloat($('#naminal'+$(this).attr('id')).val())%1==0);
   const edin=1000;
  // alert(parseFloat($(this).val())*edin)
   var nominal=parseFloat($('#naminal'+$(this).attr('id')).val());
    //   console.log(validate().length);
    
    let id=$(this).attr("id");
    if(parseFloat($(this).val())>=parseInt($('#sumr'+id).text()))
    {
        $(':input[type="submit"]').prop('disabled', true);
        $('#t'+id).addClass('border-danger');
        return;
    }
        //   console.log($('#sumr'+id).text()>=parseFloat($(this).val()));    
       if(validate().length<1)
       {
        $('#t'+ id).removeClass('border-danger');
        $(':input[type="submit"]').prop('disabled',true);
        return ;
       }
     validate().forEach(function(item,index){
        if(item==false)
        {
            // console.log(index);
            $('#t'+index).addClass('border-danger');
            $(':input[type="submit"]').prop('disabled',true);
        }
        if(item==true)
        {
            // console.log(index);
            $('#t'+index).removeClass('border-danger');
        }
          
     }); 
 
        var checkeddArray=CheckedValidate(validate());
        if(checkeddArray)
        {
            $(':input[type="submit"]').prop('disabled',false);
        }
     if($(this).val()<1)
     {
       
        $('#t'+ $(this).attr('id')).removeClass('border-danger');
        // alert($(this).val())

     }
// if(parseFloat($(this).val())/edin/nominal%1==0)
// {


// function selectValidation(id_select){
 
//  var selectIsValid = true;
// $('.summaR').each(function() {
    
//     let id=$(this).attr("id");
//     // alert(id);
//    if(parseFloat($(this).val())>0)
//     {
//        if(parseInt(parseFloat($(this).val())/edin)<1)
//        {
//         $('#t'+id).addClass('border-danger');
//         selectIsValid=false;
//         return;
//        } 
// //     var results=parseFloat($(this).val())/edin/parseFloat($('#naminal'+$(this).attr('id')).val())%1==0;
// //    }
// //     var values= $('#sumr'+$(this).attr('id')).text();
    
      
//     // console.log(parseInt(parseFloat($(this).val())/edin));
//     // if(parseInt(parseFloat($(this).val())/edin)==0)
//     // {
//     //     // console.log(parseInt(parseFloat($(this).val())/edin));
//     //     return "fff";
//     // }
   
//     // if(parseFloat($(this).val())>0 && parseFloat($(this).val())/edin/parseFloat($('#naminal'+$(this).attr('id')).val())%1==0 && results)
//     // {
//     //     console.log('d');
//     // }

//     //      incr++;
      
//     //     if(values>=parseFloat($(this).val())&& parseFloat($(this).val())>0)
//     //     {
//     //         decriment++;
//     //         // console.log(values);
//     //         if(incr==decriment)
//     //      {
//     //          selectIsValid=true;
//     //          $(':input[type="submit"]').prop('disabled',true);
//     //           return;
//     //   }
//     //     }

           
 
//     //     }else{
//     //         selectIsValid=false;
//     //         $(':input[type="submit"]').prop('disabled',false);
//     //         return;
//     //     }
//             }
//    });
//          return selectIsValid;

      
// }
 
// //  console.log(selectValidation());
// let id=$(this).attr("id");

//     if(selectValidation())
//     {
//         $(':input[type="submit"]').prop('disabled', false);
//     }else{
//         $(':input[type="submit"]').prop('disabled', true);
//        return;
//     }


// if($('#sumr'+id).text()>=parseFloat($(this).val()) && parseFloat($(this).val())>0)
// {
//       $('#t'+id).removeClass('border-danger');
//      // $('#t'+id).addClass('border-success');
//       return;

// }else{
// //  $('#t'+id).removeClass('border-success');
//       $('#t'+id).addClass('border-danger');  
//       $(':input[type="submit"]').prop('disabled', true);
//       return;
// }
// //     if(selectValidation()==false){
// //     $('#t'+id).removeClass('border-danger');  
// //     $('#t'+id).removeClass('border-success');
// //             return 
// //    }
// }else{
//     if($(this).val()<1)
//     {
  
//  function valid(){

//      var  selectIsValids=false;
    
//     $('.summaR').each(function() {
//         //let id=$(this).attr("id");
//     // alert(id);
//    const edin=1000;
//     // // alert(parseFloat($(this).val())*edin)
       
//     var nominal=parseFloat($('#naminal'+$(this).attr('id')).val());
//     //console.log($(this).val());
//     if(parseFloat($(this).val())>0)
//     {
//         if(parseFloat($(this).val())/edin/nominal%1==0)
//         {
//             // $(':input[type="submit"]').prop('disabled', false);
//             selectIsValids=true;
//             return;
//             //console.log(parseFloat($(this).val())/edin/nominal%1==0);
//         }
//     }
   
       
//        });
//       return  selectIsValids;
// }
//          console.log( valid());
// }    
//                 // valid();
// $(':input[type="submit"]').prop('disabled', true);
// }
//end validate checked nomnal summa rashod summa
});

});