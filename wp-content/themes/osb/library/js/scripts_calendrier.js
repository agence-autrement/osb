jQuery(document).ready(function($) {

    //Datepicker//

    $('.btn_gauche').on('click', function(){
        value = '.'+$(this).val();
        $('.droite_select div').css('display', 'none');
        $(value).css('display','inline');
        $(value).addClass('active');

        $('#selector').addClass('full');
        $('.gauche_select').addClass('full');
        $('#resultAjax').addClass('full');
    });

    $('#close').on('click', function(){
        $('.datepicker').removeClass('active');
        $(this).css('display','inline');
    });

    $('.show_filters').on('click', function(){
       $(this).toggleClass('active_filtre');
       $('#search_test').toggleClass('active');
    });

    /**********AJAX**********/

    var ville;
    var theme;
    var type;
    var filter;


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

    $('button.btn_droite.dpt').on('click', function(){
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

    $('.select_filter').on('change', function(e){
        e.preventDefault();
        filter = $('#search_test').serialize();
        jQuery.ajax({
            type:"POST",
            url: ajaxtest,
            data:{
              action: "multiFilter",
              filter : filter,
            },
            success:function(response){
                $('.resultat').html(response);
            },
        });
    });

    $('#clear_filters').on('click', function(){
        $('select').not($('#date_calendrier')).find('option').prop("selected", false);
        $('#date_filter').val('');
        filter = $('#search_test').serialize();
        jQuery.ajax({
            type:"POST",
            url: ajaxtest,
            data:{
                action: "multiFilter",
                filter : filter,
            },
            success:function(response){
                $('.resultat').html(response);
            },
        });
    });

    $( "#datepickerMulti" ).datepicker({

        altField: "#datepicker",
        closeText: 'Fermer',
        prevText: 'Précédent',
        nextText: 'Suivant',
        currentText: 'Aujourd\'hui',
        monthNames: ['Jan.', 'Fév.', 'Mars', 'Avr.', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
        monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
        dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
        dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
        dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
        weekHeader: 'Sem.',
        dateFormat: 'yy-mm-dd',
        firstDay: 1,

        onSelect: function(){
            var day1 = $("#datepickerMulti").datepicker('getDate').getDate();
            var cleanDay = ('0' + day1).slice(-2);
            var month1 = $("#datepickerMulti").datepicker('getDate').getMonth() + 1;
            var cleanMonth = ('0' + month1).slice(-2);
            var year1 = $("#datepickerMulti").datepicker('getDate').getFullYear();
            var fullDate = year1+cleanMonth+cleanDay;
            $('#date_filter').val(fullDate);
            $("#date_calendrier").change(function(event,fullDate)
            {
                $("#date_calendrier option[value='"+fullDate+"']").attr("selected", "selected");
            });

            $("#date_calendrier").trigger("change", [ fullDate ]);
        }
    });

    $('#plus_de_filtre').on('click', function(){
       $('#search_test').toggleClass('developped');
    });

}); /* end of as page load scripts */