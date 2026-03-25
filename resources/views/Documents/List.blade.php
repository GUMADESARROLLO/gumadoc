@extends('layouts.lyt_dashboard')
@section('scripts')
    @include('Documents.js_home')
@endsection
@section('content')
<div class="row g-3 mb-3">        
    <div class="col-12 order-xxl-3">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Base de Documentos</h6>
            </div>
            <div class="card-body p-0">
                <div class="scrollbar">
                    <table class="table mb-0 table-borderless fs--2 border-200 overflow-hidden table-running-project" id="documentsTable">
                        <thead class="bg-light">
                            <tr class="text-800">
                                <th class="sort" data-sort="projects">DOCUMENTOS</th>
                                <th class="sort" data-sort="projects">ADJUNTOS</th>
                                <th class="sort text-center" data-sort="worked">UNIDAD</th>
                                <th class="sort text-center" data-sort="time">DEPARTAMENTO</th>
                                <th class="sort text-center" data-sort="date">CREACION</th>
                                <th class="text-center"> - </th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($Documentos as $d)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center position-relative">
                                        <div class="avatar avatar-xl">
                                            <img class="img-fluid" src="{{ asset('falcon/assets/img/icons/docs.png') }}" alt="" />
                                        </div>
                                        <div class="flex-1 ms-3">
                                            <h6 class="mb-0 fw-semi-bold"><a class="stretched-link text-900" href="../deta-doc/{{ $d->DOCUMENTO }}"> {{ strtoupper($d->TITULO) }}</a></h6>
                                            <p class="text-500 fs--2 mb-0">N0. {{ $d->DOCUMENTO }}</p>
                                        </div>
                                    </div>
                                </td>
                                
                                <td class="align-middle text-center"> {{ count($d->Archivos)  }}</td>
                                <td class="align-middle text-center"> {{ $d->UNIDAD_NEGOCIO }}</td>
                                <td class="align-middle text-center"> {{ $d->DEPARTAMENTO }}</td>
                                <td class="align-middle text-center date">
                                    <p class="fs--1 mb-0 fw-semi-bold"> {{ Date::parse($d->created_at)->format('D, M d, Y ')  }}</p>
                                </td>
                                <td class="align-middle text-center ">
                                    <p class="mb-0"> 
                                        <a href="../deta-doc/{{ $d->DOCUMENTO }}" target="_blank" class="btn btn-sm btn-outline-primary me-2">
                                            <i class="bi bi-download"></i> Actualizar  
                                        </a>
                                        <a href="#!" class="btn btn-sm btn-outline-danger me-2" onclick="DeleteDocument({{ $d->DOCUMENTO }})">
                                            <i class="bi bi-download"></i> Remover
                                        </a>
                                    </p>
                                    
                                </td>
                            </tr>   
                            @endforeach            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection