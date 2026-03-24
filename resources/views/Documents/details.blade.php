@extends('Layouts.lyt_dashboard')
@section('scripts')
    @include('Documents.js_details')
@endsection
@section('content')
<div class="card mb-3">       
    <div class="card-body border-top">
        <div class="d-flex">
            <div class="flex-1">
                <p class="mb-0">{{ strtoupper($Documento->TITULO) }}</p>
                <p class="fs--1 mb-0 text-600">{{ $Documento->created_at }}</p>
            </div>
        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col">
                <h5 class="mb-0">Detalles</h5>
            </div>
        </div>
    </div>
<div class="card-body bg-light border-top">
    <div class="row">
        <div class="col-lg col-xxl-5">
            <h6 class="fw-semi-bold ls mb-3 text-uppercase">Informacion</h6>
            <div class="row">
                <div class="col-5 col-sm-4">
                    <p class="fw-semi-bold mb-1">NUM. DOC.</p>
                </div>
                <div class="col">{{ $Documento->DOCUMENTO }}</div>
            </div>
            <div class="row">
                <div class="col-5 col-sm-4">
                    <p class="fw-semi-bold mb-1">Creado</p>
                </div>
                <div class="col">{{ $Documento->created_at }}</div>
            </div>
            <div class="row">
                <div class="col-5 col-sm-4">
                    <p class="fw-semi-bold mb-1">Usuario</p>
                </div>
                <div class="col">{{ $Documento->created_by }}</div>
            </div>
            <div class="row">
                <div class="col-5 col-sm-4">
                    <p class="fw-semi-bold mb-1">UNIDAD</p>
                </div>
                <div class="col">
                    <p class="fst-italic text-400 mb-1">{{ $Documento->UNIDAD_NEGOCIO }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-5 col-sm-4">
                    <p class="fw-semi-bold mb-1">DEPARTAMENTO</p>
                </div>
                <div class="col">
                    <p class="fst-italic text-400 mb-1">{{ $Documento->DEPARTAMENTO }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-5 col-sm-4">
                    <p class="fw-semi-bold mb-0">Fecha de Exp.</p>
                </div>
                <div class="col">
                    <p class="fst-italic text-400 mb-0"> {{ $Documento->FECHA_VENCI }} </p>
                </div>
            </div>
        </div>
        <div class="col-lg col-xxl-5 mt-4 mt-lg-0 offset-xxl-1">
            <h6 class="fw-semi-bold ls mb-3 text-uppercase">DESCRIPCION</h6>
            <div class="row">
                <div class="col">
                    <p class="mb-1">{{ $Documento->DESCRIPCION }}</p>
                </div>
            </div>
            
        </div>
    </div>
    </div>       
</div>
<div class="card mb-3">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col">
                <h5 class="mb-0">Archivos ( {{ count($Documento->Archivos) }} )</h5>
            </div>
            <div class="col-auto">
                
                <button class="btn btn-falcon-default" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><span class="fas fa-upload fs--2 me-1"></span>Subir Archivo</button>
            </div>
        </div>        
    </div>
    
    <div class="card-body border-top p-0">
        @foreach ($Documento->Archivos as $Archivo)
            <div class="row g-0 align-items-center border-bottom py-2 px-3">
               
                <div class="col-md mt-1 mt-md-0">
                    <code>{{ $Archivo->DOCUMENT_NAME }}</code>
                    <p class="fs--1 mb-0 text-600">{{ $Archivo->created_at }} - {{ $Archivo->created_by }}</p>
                </div>
                <div class="col-md-auto">
                    <p class="mb-0"> 
                    <a href="#!" class="btn btn-sm btn-outline-primary me-2">
                            <i class="bi bi-download"></i> Descargar
                        </a>
                        <a href="#!" class="btn btn-sm btn-outline-danger me-2">
                            <i class="bi bi-download"></i> Remover
                        </a>
                    </p>
                </div>                
            </div>
        @endforeach
        
    </div>        
</div>


<div class="modal fade" id="staticBackdrop" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg mt-6" role="document">
    <div class="modal-content border-0">
      <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
        <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0">
        <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
          <h4 class="mb-1" id="staticBackdropLabel">Subir Archivo</h4>
          <p class="fs--2 mb-0">Agregar un nuevo archivo</p>
        </div>
        <div class="p-4">            
            <form action="" method="POST" id="FrmArchivos" >
                <div class="mb-3">
                    <div class="row" data-dropzone="data-dropzone" data-options='{"maxFiles":1,"data":[{"name":"avatar.png","size":"25000","url":"assets/img/team"}]}'>
                        <div class="fallback">
                            <input type="file" name="file" />
                        </div>
                        <div class="col-md-auto">
                            <div class="dz-preview dz-preview-single">
                                <div class="dz-preview-cover d-flex align-items-center justify-content-center ">                                    
                                    <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="dz-message dropzone-area px-2 py-3" data-dz-message="data-dz-message">
                                <div class="text-center">Upload your profile picture
                                    <p class="mb-0 fs--1 text-400">Upload a 300x300 jpg image with <br />a maximum size of 400KB</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary me-2" type="submit">Subir</button>
                    <button class="btn btn-link" type="button" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
        
@endsection