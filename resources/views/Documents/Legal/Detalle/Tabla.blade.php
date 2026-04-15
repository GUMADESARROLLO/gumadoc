@extends('layouts.lyt_dashboard')
@section('scripts')
    @include('Documents.Legal.Detalle.js_details')
@endsection
@section('content')

<div class="card mb-3">       
    <div class="card-body border-top">
        <div class="d-flex">
            <div class="row">
                
                <div class="col-lg-12">
                    <h5> {{ strtoupper($Documento->TITULO) }} </h5>

                    <a class="fs--1 mb-2 d-block" href="#!">
                        {{ $Documento->UNIDAD_NEGOCIO }} / {{ $Documento->DEPARTAMENTO }} / {{ $Documento->CATEGORIA }}
                    </a>
                
                    <p class="fs--1">
                        {!! $Documento->DESCRIPCION !!}
                    </p>
                    <p class="fs--1 mb-1"> <span>Num. Doc.: </span><strong id="num_doc">{{ $Documento->DOCUMENTO }}</strong></p>
                    
                    <!-- <p class="fs--1">Expiracion: <strong class="text-success">{{ Date::parse($Documento->FECHA_VENCI)->format('M d, Y') }}</strong></p> -->
                        
                </div>
            </div>
        </div>
    </div>
</div>
@if ($message = session('message'))
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
<div class="card mb-3">
    
<div class="card-body bg-light border-top">
    <div class="row">
        <div class="col-12">
            <div class="overflow-hidden ">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item"><a class="nav-link px-2 px-md-3 active" id="specifications-tab" data-bs-toggle="tab" href="#tab-specifications" role="tab" aria-controls="tab-specifications" aria-selected="false">ARCHIVOS ( {{ count($Documento->LegalDoc) }} )</a></li>
                    <li class="nav-item"><a class="nav-link px-2 px-md-3" id="reviews-tab" data-bs-toggle="tab" href="#tab-reviews" role="tab" aria-controls="tab-reviews" aria-selected="false">EDITAR</a></li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-specifications" role="tabpanel" aria-labelledby="specifications-tab">
                        <div class="row align-items-center mt-3">
                            <div class="col">
                                <h5 class="mb-0"></h5>
                            </div>
                            <div class="col-auto">                
                                <button class="btn btn-falcon-default" type="button" id="btnUploadDocumentos">
                                    Subir Archivo
                                </button>
                            </div>
                        </div>

                        @foreach ($Documento->LegalDoc as $Archivo)            
                        <div class="row g-0 align-items-center border-bottom py-2 px-3">
                            <div class="col-md mt-1 mt-md-0">
                                <a href="../filePreview/{{ $Archivo->ADJUNTO }}" target="_blank" class="text-danger"> 
                                    <code> {{ explode(' - ', $Archivo->DOCUMENT_NAME)[1] ?? $Archivo->DOCUMENT_NAME  }} </code> </a>
                                <p class="fs--1 mb-0 text-600">{{ Date::parse($Archivo->created_at)->format('d-m-Y h:i') }} - {{ $Archivo->created_by }} - ( {{ $Archivo->DOCUMENT_SIZE }} MB )</p>
                            </div>
                            <div class="col-md-auto">
                                <p class="mb-0"> 
                                    <a href="../DownloadAttachment/{{ $Archivo->ADJUNTO }}" target="_blank" class="btn btn-sm btn-outline-primary me-2">
                                        <i class="bi bi-download"></i> Descargar
                                    </a>
                                    <a href="#!" onclick="DeleteAttachment(' {{ $Archivo->ADJUNTO }}')" class="btn btn-sm btn-outline-danger me-2">
                                        <i class="bi bi-download"></i> Remover
                                    </a>
                                </p>
                            </div>                
                        </div>
                        @endforeach
                        
                    </div>
                    <div class="tab-pane fade" id="tab-reviews" role="tabpanel" aria-labelledby="reviews-tab">
                        <div class="row mt-3">                            
                            <div class="col-lg-12 ps-lg-12">                                
                                <form action="{{ route('Documents.update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="DocID" value="{{ $Documento->DOCUMENTO }}">
                                    <input type="hidden" name="UnidadNegocio" value="{{ $Documento->UNIDAD_NEGOCIO }}">
                                    <input type="hidden" name="Departamento" value="{{ $Documento->DEPARTAMENTO }}">
                                    
                                    <div class="mb-3">
                                        <label class="form-label" for="formGroupNameInput">TITULO:</label>
                                        <input class="form-control" id="formGroupNameInput" type="text" value="{{ $Documento->TITULO }}" name = "TituloDoc" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="formGrouptextareaInput">DESCRIPCION:</label>
                                        <div class="min-vh-50">
                                            <textarea class="tinymce_gmDocs d-none"  name="DescripcionDoc" id="id_editor">{{ $Documento->DESCRIPCION }}</textarea>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit">ACTUALIZAR</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
            <form id="myDropzone" class="dropzone dropzone-multiple p-0" data-dropzone="data-dropzone" action="#!" >
                <div class="fallback">
                  <input name="file" type="file" />
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label" for="basic-form-gender">CATEGORIAS</label>
                    <select class="form-select" name="cat_doc" aria-label="Default select example">
                        @foreach ($Categorias as $c)
                            <option value="{{$c->CATEGO_ID}}">{{$c->DESCRIPCION}}</option>
                        @endforeach
                    </select>                   
                </div>

                <div class="dz-message" data-dz-message="data-dz-message"> 
                    <img class="me-2" src="{{ asset('falcon/assets/img/icons/cloud-upload.svg') }}" width="25" alt="" />Drop your files here
                </div>
                <div class="dz-preview dz-preview-multiple m-0 d-flex flex-column">
                  <div class="d-flex media align-items-center mb-3 pb-3 border-bottom btn-reveal-trigger">
                    <img class="dz-image" src="{{ asset('falcon/assets/img/generic/image-file-2.png') }}" alt="..." data-dz-thumbnail="data-dz-thumbnail" />
                    <div class="flex-1 d-flex flex-between-center">
                      <div>
                        <h6 data-dz-name="data-dz-name"></h6>
                        <div class="d-flex align-items-center">
                          <p class="mb-0 fs--1 text-400 lh-1" data-dz-size="data-dz-size"></p>
                          <div class="dz-progress">
                            <span class="dz-upload" data-dz-uploadprogress=""></span>
                        </div>
                        </div>
                      </div>
                      <div class="dropdown font-sans-serif">
                        <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal dropdown-caret-none" 
                        type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="fas fa-ellipsis-h"></span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end border py-2">
                            <a class="dropdown-item" href="#!" data-dz-remove="data-dz-remove">Remove File</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
        </div>
      </div>
    </div>
  </div>
</div>
        
     
@endsection