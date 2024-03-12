$(document).ready(function () {


    $("#add_row").on("click", function () {
        var name = $("#name").val();
        var sku = $("#sku").val();

        $.ajax({
            url: '?s=add_row&a=1',
            method: 'post',
            dataType: 'json',
            data: {name: name, sku: sku},
            success: function (data) {
                $('#response').text(data.text);
                if (data.status =='ok')
                {
                    $('#response').removeClass('alert-warning');
                    $('#response').addClass('alert-success');
                    $('#all_products tr:last').after(data.row);
                }
                if(data.status == 'error')
                {
                    $('#response').removeClass('alert-success');
                    $('#response').addClass('alert-warning');
                }

            }
        });
    });



    $(document).on('click', ".one_product" , function() {
        var id = $(this).attr('id');

        $.ajax({
            url: '?s=remove_row&a=1',
            method: 'post',
            dataType: 'json',
            data: {id: id},
            success: function (data) {
                if (data.status =='ok')
                {
                    $('#'+id).remove();
                }
            }
        });
    });
});


