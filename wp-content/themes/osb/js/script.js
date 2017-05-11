jQuery(document).ready(function($){




    /**********AJAX**********/

    var ville;

    $('input[name="ville"]').on('click', function(){
        ville = $(this).val();
        console.log(ville);

        jQuery.ajax({
            type:"POST",
            url: ajaxurl,
            data: {
                action: "mon_action",
                //ville: ville,
            },
            success:function(response){
                $('#testAjax').html(response);
            },
        });

    });

});



