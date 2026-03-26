@extends('layouts.lyt_dashboard')
@section('scripts')
    @include('Documents.js_new-doc')
@endsection

@section('content')
<div class="card mb-3">
    <div class="card-header">
        <div class="row flex-between-end">
            <div class="col-auto align-self-center">
                <h5 class="mb-0">Creacion del Documento:</h5>
                <p class="mb-0">Informacion del Articulo a cargar.</p>
            </div>
            
        </div>
    </div>
    <div class="card-body bg-light">
        <div class="tab-content">
            <div class="tab-pane preview-tab-pane active" role="tabpanel" >
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
                <form action="{{ route('UploadNAS') }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="row">                    
                        <div class="col-md-12 mb-3">
                            <label class="form-label" for="basic-form-name">TITULO CORTO DEL DOCUMENTO</label>
                            <input class="form-control" id="basic-form-name" type="text" placeholder="TITULO CORTO" name="TituloDoc" />                        
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label" for="basic-form-dob">EXPIRACION</label>
                            <input type="text" class="form-control" name="dt_range" />
                        </div>
                        
                        <div class="col-md-3 mb-3">
                            <label class="form-label" for="basic-form-gender">UNIDAD DE NEGOCIO</label>
                            <input type="text" class="form-control" name="UnidadNegocio" value="{{$UnidadNegocio}}" readonly />
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label" for="basic-form-gender">DEPARTAMENTO</label>
                            <input type="text" class="form-control" name="Departamento" value="{{$Departamentos}}" readonly />                            
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label" for="basic-form-gender">CATEGORIAS</label>
                            <select class="form-select" name="Categorias" aria-label="Default select example">
                                @foreach ($CatLegal as $c)
                                    <option value="{{$c->CATEGO_ID}}">{{$c->DESCRIPCION}}</option>
                                @endforeach
                            </select>
                                                        
                        </div>


                        <div class="mb-3">
                            <label class="form-label" for="basic-form-textarea">DESCRIPCION</label>
                            <textarea class="form-control" id="basic-form-textarea" rows="3" placeholder="DESCRIPCION" name="descripcion"></textarea>
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