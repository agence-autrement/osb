jQuery(document).ready(function($) {

    //Datepicker//

    $('.btn_gauche').on('click', function(){
        value = '.'+$(this).val();
        $('.droite_select div').css('display', 'none');
        $(value).css('display','inline');
        $(value).addClass('active');
    });

    $('#close').on('click', function(){
        $('.datepicker').removeClass('active');
        $(this).css('display','inline');
    });

    /**********AJAX**********/

    var ville;
    var theme;
    var type;
    var filter;
    var values;


    $( function() {
        $( "#datepicker" ).datepicker({
            altField: "#datepicker",
            closeText: 'Fermer',
            prevText: 'Précédent',
            nextText: 'Suivant',
            currentText: 'Aujourd\'hui',
            monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
            monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
            dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
            dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
            dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
            weekHeader: 'Sem.',
            dateFormat: 'yy-mm-dd',
            firstDay: 1,

            onSelect: function(){
                var day1 = $("#datepicker").datepicker('getDate').getDate();
                var cleanDay = ('0' + day1).slice(-2);
                var month1 = $("#datepicker").datepicker('getDate').getMonth() + 1;
                var cleanMonth = ('0' + month1).slice(-2);
                var year1 = $("#datepicker").datepicker('getDate').getFullYear();
                var fullDate = year1+cleanMonth+cleanDay;
                jQuery.ajax({
                    type:"POST",
                    url: ajaxtest,
                    dataType: 'html',
                    data: {
                        action: "mon_action_date",
                        date: fullDate,
                    },
                    success:function(response){
                        $('#resultAjax').html(response);
                    },
                });
            }
        });
    });

    $('button[type="submit"]').on('click', function(){
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


    $('.theme').on('click', function(){
        theme = $(this).val();
        jQuery.ajax({
            type:"POST",
            url: ajaxtest,
            dataType: 'html',
            data: {
                action: "mon_action_theme",
                theme: theme,
            },
            success:function(response){
                $('#resultAjax').html(response);
            },
        });
    });

    $('.type_calendar').on('click', function(){
        type = $(this).val();
        jQuery.ajax({
            type:"POST",
            url: ajaxtest,
            dataType: 'html',
            data: {
                action: "mon_action_type",
                type: type,
            },
            success:function(response){
                $('#resultAjax').html(response);
            },
        });
    });


    /***MULTIFILTRE AJAX***/

    $('.filtreSelector ul li button').on('click', function(){

        $(this).toggleClass('active');
        values = $(this).val();
        jQuery.ajax({
            type:"POST",
            url: ajaxtest,
            dataType: 'html',
            data: {
                action: "multiFilter",
                values: values,
            },
            success:function(response){
                $('.resultat').html(response);
            },
        });
    });
}); /* end of as page load scripts */