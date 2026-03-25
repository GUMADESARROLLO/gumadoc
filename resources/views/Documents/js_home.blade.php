<script type="text/javascript">
    $(document).ready(function () {

        $('#documentsTable').DataTable({
                "destroy" : true,
                "info":    false,
                "lengthMenu": [[ 10, 20, -1], ["10", "20", "Todo"]],
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
    
        
    })


    function DeleteDocument(DocID) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¿Seguro que desea eliminar el archivo ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'S&iacute;',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '../DeleteDocument/' + DocID,
                    type: 'GET',
                    success: function(response) {
                        if (response.status == 'ok') {
                            Swal.fire(
                                'Eliminado!',
                                'El archivo ha sido eliminado con exito.',
                                'success'
                            ).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "list-doc" ;
                                }
                            })
                        } else {
                            Swal.fire(
                                'Error!',
                                'No se ha podido eliminar el archivo.',
                                'error'
                            )
                        }
                    }
                })
            }
        })
    }

</script>