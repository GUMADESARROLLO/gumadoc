@extends('Layouts.lyt_dashboard')
@section('scripts')
    @include('Dashboard.js_home')
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
                                <th class="sort" data-sort="projects">Documentos</th>
                                <th class="sort text-center" data-sort="worked">Unidad Negocio</th>
                                <th class="sort text-center" data-sort="time">Departamento</th>
                                <th class="sort text-center" data-sort="date">Fecha Creacion</th>
                                <th class="text-center">Adjuntos</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @for ($i = 0; $i < 17; $i++)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center position-relative">
                                        <div class="avatar avatar-xl">
                                            <img class="img-fluid" src="{{ asset('falcon/assets/img/icons/docs.png') }}" alt="" />
                                        </div>
                                        <div class="flex-1 ms-3">
                                            <h6 class="mb-0 fw-semi-bold"><a class="stretched-link text-900" href="#!">Lorem ium dolor sit amet</a></h6>
                                            <p class="text-500 fs--2 mb-0">N0. 001</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle text-center">UNIMARK S,A.</td>
                                <td class="align-middle text-center">DEPT. LEGAL</td>
                                <td class="align-middle text-center date">
                                    <p class="fs--1 mb-0 fw-semi-bold">01/02/22</p>
                                </td>
                                <td class="align-middle text-center ">
                                    <div class="row">
                                       
                                        <button class="btn btn-light border-300 btn-sm text-600 shadow-none" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Documentos">
                                            <img src="falcon/assets/img/icons/folder-solid.svg" alt="" width="15" />
                                        </button>
                                    </div>
                                </td>
                            </tr>   
                            @endfor            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection