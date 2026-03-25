<script type="text/javascript">
    $(document).ready(function () {
        // Initialize Dropzone
        var NumDoc = $('#num_doc').text();
        Dropzone.autoDiscover = false;

        // If a Dropzone instance already exists on this element, destroy it first to prevent "Dropzone already attached".
        var existingDropzone = Dropzone.forElement("#myDropzone");

        if (existingDropzone) {
            existingDropzone.destroy();
        }

        var myDropzone = new Dropzone("#myDropzone", {
            url: "../UploadAttachment",
            method: "POST",
            paramName: "file",
            maxFiles: 1,
            maxFilesize: 25, // MB
            acceptedFiles: ".jpg,.jpeg,.png,.pdf,.doc,.docx",
            addRemoveLinks: true,
            dictDefaultMessage: "Arrastra y suelta archivos aquí o haz clic para seleccionar",
            dictRemoveFile: "Remover archivo",
            dictFileTooBig: "El archivo es demasiado grande . Tamaño máximo: 25MB.",
            dictInvalidFileType: "Tipo de archivo no permitido.",
            init: function() {
                this.on("success", function(file, response) {
                    window.location.href = "../deta-doc/" + NumDoc;
                });
                this.on("error", function(file, response) {
                    //console.log("Error al subir archivo", response);
                });
            },
            params: {
                _token: "{{ csrf_token() }}",
                num_doc: NumDoc
            }
        });
    })

    function DeleteAttachment(AttID) {
        const DocID = $('#num_doc').text();
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
                    url: '../DeleteAttachment/' + AttID,
                    type: 'GET',
                    success: function(response) {
                        if (response.status == 'ok') {
                            Swal.fire(
                                'Eliminado!',
                                'El archivo ha sido eliminado con exito.',
                                'success'
                            ).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "../deta-doc/" + DocID;
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