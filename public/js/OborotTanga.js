$( document ).ready(function() {
    // $('input[id^="summa"]').each(function()
    // {
    // alert("gg");
    // });
    $(document).on('keyup','input[id^="summaTanga"]',function (){
        //console.log($(this).attr('id'));
       // console.log($('.'+$(this).attr('id')).val()*10);
       let CountTanga=[];
       var nominal=$('.'+$(this).attr('id')).val()*10;
      var sum=$(this).val()*10;
    //    if(sum===0.1)
    //    {
    //     sum*10;
    //    }
        
        
       if(sum%nominal==0 && $(this).val()>0)
       {
        
        $('#'+$(this).attr('id')).removeClass("border-danger");
        // $('.'+$(this).attr('id')).val()*
        // CountTanga+=parseFloat($(this).val());
        // console.log(CountTanga);
    
            $('input[id^="summaTanga"]').each(function(){
                if(parseFloat($(this).val())>0)
                {
                    CountTanga.push(parseFloat($(this).val()));
                }
             
            });
            //console.log(CountTanga.reduce((a, b) => a + b, 0));
            $('#AllSummaTanga').html('<div class="alert alert-primary  mt-2"><div class="btn-group" role="group" aria-label="Basic example"> Общие сумма <input type="hidden" name="AllSumma" value="'+CountTanga.reduce((a, b) => a + b, 0)+'"> '+CountTanga.reduce((a, b) => a + b, 0)+' Cомони  </div></div>')
            // console.log(CountTanga);
        $("#"+$(this).attr('id')+"Add").attr("disabled", false);
        $(".addform").attr("disabled", false);
        return; 
       }else{
      //console.log("f");
      //$('input[id="summaTangaOneAdd"]').prop('disabled', false);
      $('#'+$(this).attr('id')).addClass("border-danger");
    //       $(id_error+'Somon').removeClass("d-none");
      $(".addform").attr("disabled", true);
       }
       
        
    });
    $("button").click(function(){
    
    
    var  new_btn=parseInt($('#summaTangaOneAdd'+'total').val())+1;
    // console.log(new_btn);
}); 
});

// $( document ).ready(function() {
//     // $('input[id^="summa"]').each(function()
//     // {
//     // alert("gg");
//     // });
//     $(document).on('keyup','input[id^="Tangasumma"]',function (){
//         //console.log($(this).attr('id'));
//        // console.log($('.'+$(this).attr('id')).val()*10);
//        let CountTanga=[];
//        var nominal=$('.'+$(this).attr('id')).val()*10;
//       var sum=$(this).val()*10;
//     //    if(sum===0.1)
//     //    {
//     //     sum*10;
//     //    }
        
        
//        if(sum%nominal==0)
//        {
        
//         $('#'+$(this).attr('id')).removeClass("border-danger");
//         // $('.'+$(this).attr('id')).val()*
//         // CountTanga+=parseFloat($(this).val());
//         // console.log(CountTanga);
    
//             $('input[id^="TangaSumma"]').each(function(){
//                 if(parseFloat($(this).val())>0)
//                 {
//                     CountTanga.push(parseFloat($(this).val()));
//                 }
             
//             });
//             //console.log(CountTanga.reduce((a, b) => a + b, 0));
//             $('#AllSummaTanga').html('<div class="alert alert-primary  mt-2"><div class="btn-group" role="group" aria-label="Basic example"> Общие сумма  '+CountTanga.reduce((a, b) => a + b, 0)+' Cомони  </div></div>')
//             // console.log(CountTanga);
//         $("#"+$(this).attr('id')+"Add").attr("disabled", false);
//         $(".addform").attr("disabled", false);
//         return; 
//        }else{
//       //console.log("f");
//       //$('input[id="summaTangaOneAdd"]').prop('disabled', false);
//       $('#'+$(this).attr('id')).addClass("border-danger");
//     //       $(id_error+'Somon').removeClass("d-none");
//       $(".addform").attr("disabled", true);
//        }
       
        
//     });
//     $("button").click(function(){
    
    
//     var  new_btn=parseInt($('#summaTangaOneAdd'+'total').val())+1;
//     // console.log(new_btn);
// }); 
// });