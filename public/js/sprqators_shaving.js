$(document).ready(function(){
    var shaving=  $("#shaving");
   //аджакс Запрос таблица Шкаф 
   $('#safe_id').change(function(){
    
    if(this.value>0)
    {
     $("#shaving").html("");
     shaving.append(" <option >Интихоб</option>");
     
  $.ajax({
     url: "{{route('shkafTable.post')}}",
     type:"POST",
      data:{
     "_token": "{{ csrf_token() }}",
     id:this.value
      
   },
   success:function(response){

      
     for (const [key, value] of Object.entries(response )) {
       var newMsgs='<option  value="'+value.id+'">'+value.shkaf+'</option>';
      
       shaving.append(newMsgs);  
    
         }
     
     },
  });     
     }else{
         $("#shaving").html(" <option >Интихоб</option>");

     }
   });
 
 
 });