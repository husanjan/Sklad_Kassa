$(".Fond_id").click(function(){
    $('#fpriznak').val('');
     var  kode_opers=$(this).attr('id');
     var  data=$(this).data('id');
     var  id_type=$(this).attr('value');
     var cnt=`#${data}nfc${kode_opers}`;
      
     //var id_accounted=$().text();
    var id_accounted=$(`#${data}nfc${kode_opers}`).text();
    var priznak=$(`#${data}${kode_opers}`).text();
    var date=$(`#${data}d${kode_opers}`).text();
    var doc=$(`#${data}fdoc${kode_opers}`).text();
    $('#fn_doc').val(doc);
    $('#fdate').val(date);
    $('#fpriznak').val(priznak);
    $('#fschyot').text(String(id_accounted));


        
     $.ajax({
        url: "{{route('FondTable.post')}}",
        method:"POST",
        dataType: 'html', 
        data:{
            "_token": "{{ csrf_token() }}",
            id:kode_opers,id_type:id_type,

        },
        success:function(fondData){


   

          
           $('#fondAjax').html(fondData);
        },
    });
});