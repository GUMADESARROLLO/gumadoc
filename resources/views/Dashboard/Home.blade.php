@extends('layouts.lyt_dashboard')
@section('scripts')
    @include('Dashboard.js_dashboard')
@endsection

@section('content')
<div class="row g-3">
    <div class="row g-3 mb-3">
        <div class="col-xxl-12">        
            <div class="row g-3 mb-3">
                <div class="col-sm-3 col-md-3">
                    <div class="card overflow-hidden" style="min-width: 12rem">
                        <div class="bg-holder bg-card" style="background-image:url(falcon/assets/img/icons/spot-illustrations/corner-1.png);"></div>
                        <div class="card-body position-relative">
                            <h6>DEPART. LEGAL<span class="badge badge-soft-warning rounded-pill ms-2">  {{ $Stadistic['SizeLegal'] }} MB</span></h6>
                            <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning" > {{ $Stadistic['CountLegal'] }} </div>
                            <a class="fw-semi-bold fs--1 text-nowrap" href="#!">Ver Todo<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3">
                    <div class="card overflow-hidden" style="min-width: 12rem">
                        <div class="bg-holder bg-card" style="background-image:url(falcon/assets/img/icons/spot-illustrations/corner-2.png);"></div>

                        <div class="card-body position-relative">
                            <h6>DEPART. REGENCIA<span class="badge badge-soft-info rounded-pill ms-2"> {{ $Stadistic['SizeRegen'] }} MB</span></h6>
                            <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info" > {{ $Stadistic['CountRegen'] }} </div>
                            <a class="fw-semi-bold fs--1 text-nowrap" href="#!">Ver Todo<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3">
                    <div class="card overflow-hidden" style="min-width: 12rem">
                        <div class="bg-holder bg-card" style="background-image:url(falcon/assets/img/icons/spot-illustrations/corner-2.png);"></div>

                        <div class="card-body position-relative">
                            <h6>DEPART. GESTIO HUMANA<span class="badge badge-soft-success rounded-pill ms-2"> {{ $Stadistic['SizeHuman'] }} MB </span></h6>
                            <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info"> {{ $Stadistic['CountHuman'] }} </div>
                            <a class="fw-semi-bold fs--1 text-nowrap" href="#!">Ver Todo<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3">
                    <div class="card overflow-hidden" style="min-width: 12rem">
                        <div class="bg-holder bg-card" style="background-image:url(falcon/assets/img/icons/spot-illustrations/corner-3.png);"></div>
                        <div class="card-body position-relative">
                            <h6>CARTERA & COBRO <span class="badge badge-soft-warning rounded-pill ms-2"> {{ $Stadistic['SizeCobro'] }} MB </span></h6>
                            <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif" > {{ $Stadistic['CountCobro'] }} </div>
                            <a class="fw-semi-bold fs--1 text-nowrap" href="#!">Ver Todo<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        <div class="row g-3">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row flex-between-center">
                            <div class="col-auto col-sm-6 col-lg-7">
                                <h6 class="mb-0 text-nowrap py-2 py-xl-0">Todos lo Archivos</h6>
                            </div>
                            <div class="col-auto col-sm-6 col-lg-5">
                                <div class="h-100">
                                    <div class="input-group">
                                        <input class="form-control form-control-sm shadow-none search" id="txt_search" type="search" placeholder="Buscar" aria-label="search" />
                                        <div class="input-group-text bg-transparent"><span class="fa fa-search fs--1 text-600"></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                    <div class="card-body py-0">
                        <div class="table-responsive scrollbar">
                            <table class="table table-dashboard mb-0 fs--1" id="documentsTable">
                                <thead>
                                    <tr>
                                        <th>Titulo</th>
                                        <th>Unidad</th>
                                        <th>Fecha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($Articulos as $doc)
                                <tr>
                                    <td class="align-middle ps-0 text-nowrap">
                                        <div class="d-flex position-relative align-items-center">
                                            <img class="d-flex align-self-center me-2" src="falcon/assets/img/logos/atlassian.png" alt="" width="30" />
                                            <div class="flex-1">
                                                <a class="stretched-link" href="../deta-doc/{{ $doc->DOCUMENTO }}">
                                                    <h6 class="mb-0">{{ $doc->TITULO}} ({{ count($doc->Archivos)}})</h6>
                                                </a>
                                                <p class="mb-0">{{ $doc->DEPARTAMENTO}} / {{ $doc->CATEGORIA}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle px-4" style="width:1%;"><span class="badge fs--1 w-100 badge-soft-success">{{ $doc->UNIDAD_NEGOCIO}}</span></td>
                                    <td class="align-middle px-4 text-end text-nowrap" style="width:1%;">
                                        <h6 class="mb-0">$290.00 USD</h6>
                                        <p class="fs--2 mb-0">15 May, 2020</p>
                                    </td>           
                                </tr>                                
                                @endforeach
                                </tbody>
                                
                            </table>
                        </div>
                    </div>                    
                </div>
            </div>
            <div class="col-lg-4">
                    <div class="card h-100 h-xxl-auto">
                        <div class="card-header d-flex flex-between-center bg-light py-2">
                            <h6 class="mb-0">RECIENTE ARCHIVOS</h6><a class="py-1 fs--1 font-sans-serif" href="#!">Ver Todo</a>
                        </div>
                        <div class="card-body pb-0">
                            @foreach ($RecientDoc as $File) 
                            <div class="d-flex mb-3 hover-actions-trigger align-items-center">    
                                <div class="file-thumbnail">
                                    <img class="img-fluid" src="falcon/assets/img/icons/docs.png" alt="" />
                                </div>  
                                <div class="ms-3 flex-shrink-1 flex-grow-1">
                                    <h6 class="mb-1"><a class="stretched-link text-900 fw-semi-bold" href="#!"> {{ Str::limit($File->DOCUMENT_NAME, 25) }} </a></h6>
                                    <div class="fs--1"><span class="fw-semi-bold">{{ $File->created_by }}</span><span class="fw-medium text-600 ms-2">{{ $File->created_at }}</span></div>
                                    <div class="hover-actions end-0 top-50 translate-middle-y">
                                        <a class="btn btn-light border-300 btn-sm me-1 text-600" data-bs-toggle="tooltip" data-bs-placement="top" title="Download" href="falcon/assets/img/icons/cloud-download.svg" download="download">
                                        <img src="falcon/assets/img/icons/cloud-download.svg" alt="" width="15" />
                                    </a>
                                    
                                    </div>
                                </div>
                            </div>
                            <hr class="bg-200" />   
                            @endforeach                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection