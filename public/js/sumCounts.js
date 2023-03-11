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
    var   typeFond=0;
  var  typeFondF= $("input[id='farsudaT']").val();
  var   typeFondBOTIL= $("input[id='botilshudaT']").val();
            if(typeFondF==2)
            {
                typeFond=typeFondF;
            }
            if(typeFondBOTIL==3)
            {
                typeFond=typeFondBOTIL;
            }
        if(typeFond<1)
        {
            typeFond= $("input[name='farsuda']").val();
        }
        // alert(typeFond);
      
        //  typeFond= $("input[id='farsudaT']").val();
     ///type money 0/ coin 1    data-type
    //    console.log( $("input[name='farsuda']").val())
    //    $("input[name='farsuda']").each(function(){
    //     console.log($(this).val());
    //          });

  var sum=0;
  var  id_number=$(this).attr("id").substr(-2);
 
      var   nominal= $('#'+'nominal'+id_number.substr(-2,1)+"1").val();
      $('#'+id_number.substr(-2,1)+'Somon').addClass("d-none");
      $("#"+$(this).attr('id')).removeClass("border-danger");
      var   nominalsss= $('input[id^=count0]').val();
      var   edins= $("#edin_id"+id_number).val();
      var edin_id='[id^=edin_id'+ id_number.substr(-2,1)+']';
      var count_id='[id^=count'+ id_number.substr(-2,1)+']';
        //  console.log(nominal);
        //  alert(typeFond)
     
     var AllSum= SumEdinCount('[id^=new'+id_number.substr(-2,1)+']',nominal,id_number.substr(-2,1));
    
      
    $("#sum"+id_number.substr(-2,1)+"1").html(AllSum);
    $('[id^=countSums]').each(function(ind,obj){
        //do stuff;
        if(obj.value!=0)
        {
           // sumCounts.push(obj.value);
          obj.value;
          arrays.push();
        
       
          sum+=parseFloat(obj.value);
              
             
        }
     
       
        
    });
    var   Type= $(this).data('type');
    var htmlSum='<div class="alert alert-primary  mt-2"><div class="btn-group" role="group" aria-label="Basic example"> Общие сумма  '+sum+' Cомони  </div></div>';
               
    $("#AllSumma").html(htmlSum);
    
          $("#AllSummaTangaD").html(htmlSum);
    $.ajax({
        url: "FondAjaxSum",
        type:"GET",
        data:{
            "_token": "{{csrf_token()}}",
            typeFond:typeFond,sum:sum,Type:Type,
     
        },
        success:function(response){
       console.log(response);
        if(response==0)
        {
            $("#submits").prop('disabled', true);
            $('.toast').toast('show');
       
         //   return;
          
        }    
        if(response==1)
        {
            $("#submits").prop('disabled', false);
            $('.toast').toast('hide');
          
            //return;
        }    
        return;
          //console.log(response);
        //    $('#ajaxoborot').html(response);
        },
     });
   
  
  });