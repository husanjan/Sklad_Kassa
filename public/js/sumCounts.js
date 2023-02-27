$(document).ready(function(){

    $(document).on("keyup",'input[id^=countSumsnepolniySomon]', function(){

        // alert($(this).val())
        // alert($(this).data('id'))
           let nomin=0;
                   if($('#nominal'+$(this).data('id')+'1').val()>=1)
                   {
                      nomin=$('#nominal'+$(this).data('id')+'1').val();
                   }
                   if($('#nominal'+$(this).data('id')+'1').val()<1)
                   {
                      nomin=$('#nominal'+$(this).data('id')+'1').val()*100;
                   }

         if($(this).val()%nomin===0)
         {
            $('#countSumsnepolniySomon'+$(this).data('id')).removeClass( "is-invalid");
      
            $(".addform").prop("disabled",true);
            return 
         }
        //  console.log('#countSumsnepolniySomon'+$(this).data('id'))
         $('#countSumsnepolniySomon'+$(this).data('id')).addClass( "is-invalid");
    });
    var $hello= $('[id=countSums]');

    $hello.bind("change load", function(){
       // alert('hey');
    });
});
function Summ()
{
    $('[id^=countSums]').each(function(ind,obj){
        //do stuff;
        console.log(obj) ;
        
    });
}
 
var resultSum=0;
function getSum(total, num) {
    return total + Math.round(num);
}

function  SumEdinCount(row_id,nominal,id)
{
   var sumedins=[];
 
   $(row_id).each(function(){

   
       var   count= $(this).find('.count').val(); // This is the jquery object of the input, do what you will
       var   edin= $(this).find('.edin_id').find(':selected').data('id'); // This is the jquery object of the input, do what you will
     
   
       if(edin>0)
       {
           sumedins.push(edin*count);
       }
           

   });
   //<label id="countSums" onfocus="myFunction(this)">'+sumedins.reduce(getSum, 0)*nominal+'</label>
       
   return   '<div class="alert alert-primary  mt-2"> Cумма '+sumedins.reduce(getSum, 0)*nominal+'       Cомони </div></div> <input type="hidden" readonly="readonly" class="form-control" name="summacounts'+id+'" id="countSums" data-nominal="'+nominal+'"  value="'+sumedins.reduce(getSum, 0)*nominal+'">';

}
 
function add(accumulator, a) {
    return accumulator + a;
  }
  var   sumCounts = 0;
  var arrays=[];

  $(document).on("keyup",'input[id^=count]', function(){
     var   typeFond= $("input[name='farsuda']").val();
    
    var sum=0;
  var     id_number=$(this).attr("id").substr(-2);
 
      var   nominal= $('#'+'nominal'+id_number.substr(-2,1)+"1").val();
      $('#'+id_number.substr(-2,1)+'Somon').addClass("d-none");
      $("#"+$(this).attr('id')).removeClass("border-danger");
      var   nominalsss= $('input[id^=count0]').val();
      var   edins= $("#edin_id"+id_number).val();
      var edin_id='[id^=edin_id'+ id_number.substr(-2,1)+']';
      var count_id='[id^=count'+ id_number.substr(-2,1)+']';
        //  console.log(nominal);

     
     var AllSum= SumEdinCount('[id^=new'+id_number.substr(-2,1)+']',nominal,id_number.substr(-2,1));
    
      
    $("#sum"+id_number.substr(-2,1)+"1").html(AllSum);
    $('[id^=countSums]').each(function(ind,obj){
        //do stuff;
        if(obj.value!=0)
        {
           // sumCounts.push(obj.value);
          obj.value;
          arrays.push();
        //   alert($(obj).data('nominal'));
       
          sum+=parseFloat(obj.value);
              
             
        }
     
       
        
    });
    $.ajax({
        url: "FondAjaxSum",
        type:"GET",
        data:{
            "_token": "{{csrf_token()}}",
            typeFond:typeFond,sum:sum,
     
        },
        success:function(response){
     
         
     
     
          // console.log(response);
        //    $('#ajaxoborot').html(response);
        },
     });
    var htmlSum='<div class="alert alert-primary  mt-2"><div class="btn-group" role="group" aria-label="Basic example"> Общие сумма  '+sum+' Cомони  </div></div>';
               
    $("#AllSumma").html(htmlSum);
    
          $("#AllSummaTangaD").html(htmlSum);
  
  });