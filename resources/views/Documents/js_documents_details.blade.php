<script type="text/javascript">
    feather.replace();

    $('input[name="dt_range"]').daterangepicker({
        "singleDatePicker": true,
        "autoApply": true,
        "alwaysShowCalendars": true,
        "locale": {
            "format": "DD/MM/YYYY",
            "separator": " - ",
            "applyLabel": "Aplicar",
            "cancelLabel": "Cancelar",
            "fromLabel": "Desde",
            "toLabel": "Hasta",
            "customRangeLabel": "Personalizado",
            "weekLabel": "S",
            "daysOfWeek": ["Dom.", "Lun.", "Mar.", "Mie.", "Jue.", "Vie", "Sab."],
            "monthNames": [
                "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
                "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
            ],
            "firstDay": 1
        }
    }, function(startDate, endDate) {
        console.log('Nueva fecha seleccionada: ' + startDate.format('YYYY-MM-DD') + ' a ' + endDate.format('YYYY-MM-DD'));
        //CallFilter(startDate.format('YYYY-MM-DD'), endDate.format('YYYY-MM-DD'));
    });



   
</script>