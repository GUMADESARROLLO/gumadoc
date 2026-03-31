<script type="text/javascript">
    $(document).ready(function () {
        $('#documentsTable thead').hide();

        $('#documentsTable').DataTable({
            "destroy" : true,
            "info":    false,
            "lengthMenu": [[ 10, 20, -1], ["10", "20", "Todo"]],
            "language": {
                "zeroRecords": "NO HAY COINCIDENCIAS",
                "paginate": {
                    "first":      "Primera",
                    "last":       "Ultima",
                    "next":       "Sig.",
                    "previous":   "Ant."
                },
                "lengthMenu": "MOSTRAR _MENU_",
                "emptyTable": "REALICE UNA BUSQUEDA UTILIZANDO LOS FILTROS DE FECHA",
                "search":     "BUSCAR"
            }
        });

        $(".dt-length").hide();
        $(".dt-search").hide();

        $('#txt_search').on('keyup', function () {
            var vTable = $('#documentsTable').DataTable();     
            vTable.search(this.value).draw();
        });

    });
</script>