<script type="text/javascript">
    $(document).ready( function () {
        $('#tbl_users').DataTable({
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

    function Editar(User) {

        console.log(User);
        
    }
    function Eliminar(UserID) {

        console.log(UserID);        
    }
</script>