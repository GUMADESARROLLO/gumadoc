<script type="text/javascript">
    feather.replace();

    $('input[name="dt_range"]').daterangepicker({
        "autoApply": true,
        ranges: {
            'Hoy': [moment(), moment()],
            'Últm. 7 Días': [moment().subtract(6, 'days'), moment()],
            'Últm. 30 Días': [moment().subtract(29, 'days'), moment()],              
            'Este Mes': [moment().startOf('month'), moment()],
            'Mes Anterior': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
            "3 Meses": [moment().subtract(3, 'month'), moment()],
            "6 Meses": [moment().subtract(6, 'month'), moment()],
            
            '1 Año': [moment().subtract(1, 'year'), moment()],
            // '2 Años': [moment().subtract(2, 'year'), moment()],
            // '3 Años': [moment().subtract(3, 'year'), moment()]
        },
        "showCustomRangeLabel": false,
        "alwaysShowCalendars": true,
        "startDate": moment().startOf('month').format('D MMM. YYYY'),
        "endDate": moment().format('D MMM. YYYY'),
        opens: 'left',
        locale: {
            //format: "DD/MM/YYYY",
            format: "D MMM. YYYY",   
            separator: " - ",
            applyLabel: "Aplicar",
            cancelLabel: "Cancelar",
            fromLabel: "Desde",
            toLabel: "Hasta",
            customRangeLabel: "Personalizado",
            weekLabel: "S",
            daysOfWeek: ["Dom.", "Lun.", "Mar.", "Mie.", "Jue.", "Vie", "Sab."],
            monthNames: [
                "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
                "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
            ],
            firstDay: 1
        }
    }, function(start, end, label) {
        console.log('Nuevo rango seleccionado: ' + start.format('YYYY-MM-DD') + ' a ' + end.format('YYYY-MM-DD') + ' (rango: ' + label + ')');
        //CallFilter(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));
    });



    $(document).ready( function () {
        $('#tbl_documentos').DataTable({
            "destroy" : true,
            "info":    false,
            "lengthMenu": [[5, 10, 20, -1], ["5", "10", "20", "Todo"]],
            "language": {
                "zeroRecords": "NO HAY COINCIDENCIAS",
                "paginate": {
                    "first":      "Primera",
                    "last":       "  ltima ",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                },
                "lengthMenu": "MOSTRAR _MENU_",
                "emptyTable": "REALICE UNA BUSQUEDA UTILIZANDO LOS FILTROS DE FECHA",
                "search":     "BUSCAR"
            }
        });
        $(".dt-length").hide();
        $(".dt-search").hide();
    } );
</script>