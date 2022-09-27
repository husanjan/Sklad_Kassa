function listOfshkafWithParams(safe_id, resultElementID, selectedShkaf){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        url: "/listofshkafwithparams",
        data: {safe_id:safe_id},
        success: function (data) {
            $(resultElementID).empty().append('<option value="">Интихоб</option>');

            if(data.length > 0){
                $.each(data, function (index, element) {
                    $(resultElementID).append('<option value="' + element.id + '">' + element.shkaf + '</option>');
                });
                $(resultElementID + ' option[value="' + selectedShkaf + '"]').attr('selected', true).trigger("chosen:updated");
                $(resultElementID).chosen({ width: "100%" });
                $(resultElementID).prop('disabled', false).trigger("chosen:updated");
            }
            else{
                $(resultElementID).prop('disabled', true).trigger("chosen:updated");
            }
        },
        error: function (data) {
            console.log(data);
        }
    });
}

