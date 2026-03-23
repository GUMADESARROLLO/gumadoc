@extends('Layouts.lyt_dashboard')
@section('scripts')
    @include('Dashboard.js_dashboard')
@endsection

@section('content')
<div class="card mb-3">
    <div class="card-header">
        <div class="row flex-between-end">
            <div class="col-auto align-self-center">
                <h5 class="mb-0">La informacion del documento:</h5>
                <p class="mb-0">Informacion del Articulo a cargar.</p>
            </div>
            <div class="col-auto ms-auto">
                <div class="nav nav-pills nav-pills-falcon flex-grow-1" role="tablist">
                <button class="btn btn-sm active" data-bs-toggle="pill" data-bs-target="#dom-d4ebf6c5-74b4-4308-8c64-cda718c9b324" type="button" role="tab" aria-controls="dom-d4ebf6c5-74b4-4308-8c64-cda718c9b324" aria-selected="true" id="tab-dom-d4ebf6c5-74b4-4308-8c64-cda718c9b324">Preview</button>
                <button class="btn btn-sm" data-bs-toggle="pill" data-bs-target="#dom-ed2c63c2-870e-4e8f-b431-d8a9ac67961a" type="button" role="tab" aria-controls="dom-ed2c63c2-870e-4e8f-b431-d8a9ac67961a" aria-selected="false" id="tab-dom-ed2c63c2-870e-4e8f-b431-d8a9ac67961a">Code</button>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body bg-light">
        <div class="tab-content">
            <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-d4ebf6c5-74b4-4308-8c64-cda718c9b324" id="dom-d4ebf6c5-74b4-4308-8c64-cda718c9b324">
                <form>
                    <div class="mb-3">
                        <label class="form-label" for="basic-form-name">Titulo</label>
                        <input class="form-control" id="basic-form-name" type="text" placeholder="Name" name="name" />                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-form-textarea">Description</label>
                        <textarea class="form-control" id="basic-form-textarea" rows="3" placeholder="Description" name="descripcion"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-form-dob">Date of Birth</label>
                        <input type="text" class="form-control" name="dt_range" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-form-gender">UNIDAD DE NEGOCIO</label>
                        <select class="form-select" name="uploadUnidadNegocio">
                            <option value="UMK" selected>UNIMARK S,A</option>    
                            <option value="GP">GUMA PHARMA</option>                                            
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-form-gender">UNIDAD DE NEGOCIO</label>
                        <select class="form-select" name="Categoria">
                            <option value="LEGAL" selected>DEPARTAMENTO LEGAL</option>    
                            <option value="REGENCIA">DEPARTMENTO REGENCIA</option>                                            
                        </select>
                    </div>
                    <div class="mb-4">
                        <div class="border-2 border-dashed rounded p-3 text-center"
                            style="border-color: #dee2e6; border-style: dashed;" id="dropArea">
                            <i class="bi bi-cloud-upload display-4 text-muted mb-3"></i>
                            <h5>Arrastre y suelte archivos aqu&iacute;</h5>
                            <p class="text-muted">o haga clic para buscar</p>
                            <input type="file" class="form-control mt-2" name="UploadMe" id="UploadMe"  />
                            <p class="small text-muted mt-3 mb-0">
                                Tamaño máximo del archivo: 25MB. Formatos permitidos: PDF, DOC, JPG, PNG
                            </p>
                        </div>
                        <div id="fileList" class="mt-3"></div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success btn-lg">Guardar</button>
                    </div>
                </form>
            </div>            
        </div>
    </div>
</div>
@endsection