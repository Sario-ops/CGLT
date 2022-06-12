$(function() {
    $('#modalButton').click(function(){
        $('#modal').modal('show').find('#modalContent').load($(this).attr('value'));
    })
})

$(function() {
    $('#rateButton').click(function(){
        var ele = $('input[name="rating"]');
        for(i = 0; i < ele.length; i++) {

            if(ele[i].checked) {
                $('#resultRating').val(ele[i].value);
            }
        }
        $('#submitRate').trigger('click');
    })
})