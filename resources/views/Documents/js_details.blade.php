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
            url: "../uploadAttachment",
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
</script>