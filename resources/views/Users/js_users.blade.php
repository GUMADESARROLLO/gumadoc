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
        
        $('#txt_search').on('keyup', function () {
            var vTable = $('#tbl_users').DataTable();     
            vTable.search(this.value).draw();
        });
    } );

    let currentUserDepartamento = '';

    $("#unidad_negocio").on('change', function(){
        var unidad_negocio = $("#unidad_negocio").val();
        $.ajax({
            url: "{{ route('getDepartamento') }}",
            method: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                unidad_negocio: unidad_negocio
            },
            success: function(response) {
                var html = '';

                $.each(response, function (index, item) {
                    var selected = (item.ID_DEPARTAMENTO == currentUserDepartamento) ? ' selected' : '';
                    html += '<option value="' + item.ID_DEPARTAMENTO + '"' + selected + '>' + item.DESCRIPCION + '</option>';
                });

                $('#departamento').html(html).trigger('change');
            }
        });
    });

    function openUserModal() {
        FormClean();
        var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
        myModal.show();
    }

    function Editar(User) {
        if (!User || !User.id) {
            console.error('Usuario inválido para editar', User);
            return;
        }        

        var unidadNegocio = isValue(User.departamentos.unidad_negocio,'N/D',true) ;
        var departamento = isValue(User.departamentos.departamento,'',true) ;

        unidadNegocio = unidadNegocio ? unidadNegocio.PREFIJO : 'N/D';
        departamento = departamento ? departamento.ID_DEPARTAMENTO : '';

        FormClean();

        $('#staticBackdropLabel').text('Editar Usuario # ' + User.id);
        $('#user_id').val(User.id);
        $('#name').val(User.name || '');
        $('#email').val(User.email || '');

        $('#password').val('');
        $('#password_confirmation').val('');
        $('#password').prop('required', false);
        $('#password_confirmation').prop('required', false);

        $('#form_users').attr('action', '/UserUpdate/' + User.id);
        $('#form_method').val('PUT');

        $("#id_rol").val(User.rol_id).change();
        
        // Guardamos temporalmente el departamento a seleccionar
        currentUserDepartamento = departamento;
        $("#unidad_negocio").val(unidadNegocio).trigger('change');

        var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
        myModal.show();
    }

    function Eliminar(UserID) {
        if (!UserID) {
            return;
        }

        Swal.fire({
            title: "Eliminar usuario",
            text: "¿Desea eliminar el usuario con ID " + UserID + "?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                var form = $('<form>', {
                    method: 'POST',
                    action: '/UserDelete/' + UserID
                });
                form.append($('<input>', { type: 'hidden', name: '_token', value: '{{ csrf_token() }}' }));
                form.append($('<input>', { type: 'hidden', name: '_method', value: 'DELETE' }));
                $('body').append(form);
                form.submit();
            }
        });
    }

    function FormClean() {
        //$('#form_users')[0].reset();
        $('#name').val('');
        $('#email').val('');
        $('#user_id').val('');
        $('#staticBackdropLabel').text('Nuevo Usuario');
        $('#form_users').attr('action', '{{ route('users.store') }}');
        $('#form_method').val('POST');
        $('#password').prop('required', true);
        $('#password_confirmation').prop('required', true);
        // $('#unidad_negocio').val('N/D').trigger('change');
        // $('#departamento').html('<option value="">Departamento</option>');
    }
</script>