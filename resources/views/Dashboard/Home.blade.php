@extends('layouts.lyt_dashboard')

@section('content')
<div class="row g-3">
    <div class="row g-3 mb-3">
        <div class="col-xxl-12">        
            <div class="row g-3 mb-3">
                <div class="col-sm-3 col-md-3">
                    <div class="card overflow-hidden" style="min-width: 12rem">
                        <div class="bg-holder bg-card" style="background-image:url(falcon/assets/img/icons/spot-illustrations/corner-1.png);"></div>
                        <div class="card-body position-relative">
                            <h6>DEPART. LEGAL</h6>
                            <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning" > 00.00 </div>
                            <a class="fw-semi-bold fs--1 text-nowrap" href="#!">Ver Todo<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3">
                    <div class="card overflow-hidden" style="min-width: 12rem">
                        <div class="bg-holder bg-card" style="background-image:url(falcon/assets/img/icons/spot-illustrations/corner-2.png);"></div>

                        <div class="card-body position-relative">
                            <h6>DEPART. REGENCIA</h6>
                            <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info" > 00.00 </div>
                            <a class="fw-semi-bold fs--1 text-nowrap" href="#!">Ver Todo<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3">
                    <div class="card overflow-hidden" style="min-width: 12rem">
                        <div class="bg-holder bg-card" style="background-image:url(falcon/assets/img/icons/spot-illustrations/corner-2.png);"></div>

                        <div class="card-body position-relative">
                            <h6>DEPART. GESTIO HUMANA</h6>
                            <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info"> 00.00 </div>
                            <a class="fw-semi-bold fs--1 text-nowrap" href="#!">Ver Todo<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3">
                    <div class="card overflow-hidden" style="min-width: 12rem">
                        <div class="bg-holder bg-card" style="background-image:url(falcon/assets/img/icons/spot-illustrations/corner-3.png);"></div>
                        <div class="card-body position-relative">
                            <h6>CARTERA & COBRO </h6>
                            <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif" > 00.00 </div>
                            <a class="fw-semi-bold fs--1 text-nowrap" href="#!">Ver Todo<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        <div class="row g-3">
            <div class="col-lg-8">
                <div class="card h-100">
                    <div class="card-header d-flex flex-between-center bg-light py-2">
                        <h6 class="mb-0">Todos lo Archivos</h6>
                        <div class="dropdown font-sans-serif btn-reveal-trigger">
                            <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="dropdown-transaction-summary" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--2"></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-transaction-summary"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body py-0">
                        <div class="table-responsive scrollbar">
                            <table class="table table-dashboard mb-0 fs--1">
                                <tr>
                                    <td class="align-middle ps-0 text-nowrap">
                                        <div class="d-flex position-relative align-items-center">
                                            <img class="d-flex align-self-center me-2" src="falcon/assets/img/logos/atlassian.png" alt="" width="30" />
                                            <div class="flex-1"><a class="stretched-link" href="#!">
                                                <h6 class="mb-0">Atlassian</h6>
                                            </a>
                                            <p class="mb-0">Subscription payment</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle px-4" style="width:1%;"><span class="badge fs--1 w-100 badge-soft-success">Completed</span></td>
                                    <td class="align-middle px-4 text-end text-nowrap" style="width:1%;">
                                        <h6 class="mb-0">$290.00 USD</h6>
                                        <p class="fs--2 mb-0">15 May, 2020</p>
                                    </td>
                                    <td class="align-middle ps-4 pe-1" style="width: 130px; min-width: 130px;">
                                        <select class="form-select form-select-sm px-2 bg-transparent">
                                            <option>Action</option>
                                            <option>Archive</option>
                                            <option>Delete</option>
                                        </select>
                                    </td>                          
                                </tr>
                                
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
                            <div class="d-flex mb-3 hover-actions-trigger align-items-center">                    
                                <div class="ms-3 flex-shrink-1 flex-grow-1">
                                    <h6 class="mb-1"><a class="stretched-link text-900 fw-semi-bold" href="#!">apple-smart-watch.png</a></h6>
                                    <div class="fs--1"><span class="fw-semi-bold">Antony</span><span class="fw-medium text-600 ms-2">Just Now</span></div>
                                    <div class="hover-actions end-0 top-50 translate-middle-y"><a class="btn btn-light border-300 btn-sm me-1 text-600" data-bs-toggle="tooltip" data-bs-placement="top" title="Download" href="falcon/assets/img/icons/cloud-download.svg" download="download">
                                        <img src="falcon/assets/img/icons/cloud-download.svg" alt="" width="15" />
                                    </a>
                                    <button class="btn btn-light border-300 btn-sm me-1 text-600 shadow-none" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                        <img src="falcon/assets/img/icons/edit-alt.svg" alt="" width="15" /></button>
                                    </div>
                                </div>
                            </div>
                            <hr class="bg-200" />                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection