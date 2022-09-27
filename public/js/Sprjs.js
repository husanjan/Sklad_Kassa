$(document).ready(function(){
    var shaving=$("#shaving");
    //аджакс Запрос таблица Шкаф
    $('#safe_id').change(function(){

        if(this.value>0)
        {
            $("#shaving").html("");
            shaving.append("<option >Интихоб</option>");

            $.ajax({
                url: "{{route('shkafTable.post')}}",
                type:"POST",
                data:{
                    "_token": "{{ csrf_token() }}",
                    id:this.value

                },
            success:function(response){


                    for (const [key, value] of Object.entries(response)) {
                        var newMsgs='<option  value="'+value.id+'">'+value.shkaf+'</option>';

                        shaving.append(newMsgs);

                    }

                },
            });
        }else{
            $("#shaving").html(" <option >Интихоб</option>");

        }
    });

    ///


    $('#shaving').change(function(){
        var qator=$("#qator_id");

        if(this.value>0)
        {
            $("#safe_id option:selected").val();

            qator.html("");
            qator.append("<option >Интихоб</option>");

            $.ajax({
                url: "{{route('qatorTable.post')}}",
                type:"POST",
                data:{
                    "_token": "{{ csrf_token() }}",
                    id_shkaf:this.value,safe_id:$("#safe_id option:selected").val(),

                },
                //safe_id
                success:function(response){


                    for (const [key, value] of Object.entries(response)) {
                        var newMsgs='<option  value="'+value.id+'">'+value.qator+'</option>';

                        qator.append(newMsgs);

                    }

                },
            });
        }else{
            qator.html(" <option >Интихоб</option>");

        }
    });

    $('#qator_id').change(function(){
        var cell=$("#cells");
        if(this.value>0)
        {
            $("#safe_id option:selected").val();

            cell.html("");
            cell.append("<option >Интихоб</option>");

            $.ajax({
                url: "{{route('cellsTable.post')}}",
                type:"POST",
                data:{
                    "_token": "{{ csrf_token() }}",
                    id_shkaf:$("#shaving option:selected").val(),qator_id:this.value,safe_id:$("#safe_id option:selected").val(),

                },
                //safe_id
                success:function(response){

                    console.log(response);
                    for (const [key, value] of Object.entries(response)) {
                        var newMsgs='<option  value="'+value.id+'">'+value.cell+'</option>';

                        cell.append(newMsgs);

                    }

                },
            });
        }else{
            qator.html(" <option >Интихоб</option>");

        }
    });
});
