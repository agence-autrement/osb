/**********AJAX**********/
jQuery(document).ready(function($) {

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
                var fullDate = year1 + "-" + cleanMonth + "-" + cleanDay;
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

    var ville;
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
}); /* end of as page load scripts */