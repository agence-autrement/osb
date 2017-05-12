/**********AJAX**********/
jQuery(document).ready(function($) {

    var ville;
    var date;

    $('input[name="ville"]').on('click', function(){
        ville = $(this).val();
        jQuery.ajax({
            type:"POST",
            url: ajaxtest,
            dataType: 'html',
            data: {
                action: "mon_action",
                ville: ville,
            },
            success:function(response){
                $('#resultAjax').html(response);
            },
        });
    });


    $('input[name="date"]').change(function(){
        date = $(this).val();
        jQuery.ajax({
            type:"POST",
            url: ajaxtest,
            dataType: 'html',
            data: {
                action: "mon_action_date",
                date: date,
            },
            success:function(response){
                $('#resultAjax').html(response);
            },
        });
    });
}); /* end of as page load scripts */