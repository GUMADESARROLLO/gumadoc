@section('metodosjs')
    @include('Documents.js_documents_details')
@endsection

<x-app-layout>  
    <div class="py-3 border">  
        <div class="row">
            <div class="col-md-7">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card shadow">
                            <div class="card-header bg-success text-white">
                                <h3 class="mb-0">La informacin del documento a cargar es la siguiente:</h3>
                                <p class="mb-0">Informacion del Articulo a cargar.</p>
                            </div>
                            <div class="card-body p-4">
                                @if ($message = Session::get('message'))
                                    @if (str_contains($message, 'Error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ $message }}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @else
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>{{ $message }}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif
                                @endif
                                <form action="{{ route('UploadNAS') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Titulo *</label>
                                            <input type="text" class="form-control" name="titulo" required>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Descripcion *</label>
                                        <textarea class="form-control" name="descripcion" rows="3" required></textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Fecha De Expiracion</label>
                                            <input type="text" class="form-control" name="dt_range" />
                                        </div>  
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">UNIDAD DE NEGOCIO</label>
                                            <select class="form-select" name="uploadUnidadNegocio">
                                                <option value="UMK" selected>UNIMARK S,A</option>    
                                                <option value="GP">GUMA PHARMA</option>                                            
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">UNIDAD DE NEGOCIO</label>
                                            <select class="form-select" name="Categoria">
                                                <option value="LEGAL" selected>DEPARTAMENTO LEGAL</option>    
                                                <option value="REGENCIA">DEPARTMENTO REGENCIA</option>                                            
                                            </select>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <!-- 🔥 IMPORTANTE -->
                                        <input type="file" class="form-control" name="UploadMe" id="UploadMe" required />
                                    </div>                            

                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-success btn-lg">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card shadow">
                            <div class="card-header bg-primary text-white">
                                <h3 class="mb-0">Cargar documentos</h3>
                                <p class="mb-0">Esta seccion es para cargar documentos, como por ejemplo, contratos, facturas, etc.</p>
                            </div>
                            <div class="card-body p-4">
                                    <!-- Drag & Drop Area -->
                                    <div class="mb-4">
                                        <div class="border-2 border-dashed rounded p-5 text-center"
                                            style="border-color: #dee2e6; border-style: dashed;" id="dropArea">
                                            <i class="bi bi-cloud-upload display-4 text-muted mb-3"></i>
                                            <h5>Drag & drop files here</h5>
                                            <p class="text-muted">or click to browse</p>
                                            <input type="file" class="d-none" id="fileInput" multiple>
                                            <button type="button" class="btn btn-outline-primary mt-2"
                                                onclick="document.getElementById('fileInput').click()">
                                                Browse Files
                                            </button>
                                            <p class="small text-muted mt-3 mb-0">
                                                Maximum file size: 10MB. Allowed formats: PDF, DOC, JPG, PNG
                                            </p>
                                        </div>
                                        <div id="fileList" class="mt-3"></div>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <button type="reset" class="btn btn-outline-secondary">Clear All</button>
                                        <button type="submit" class="btn btn-primary">Upload Files</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
    </div>
</x-app-layout>