@extends('Layouts.lyt_dashboard')
@section('content')
<div class="card mb-3">       
    <div class="card-body border-top">
        <div class="d-flex"><span class="fas fa-user text-success me-2" data-fa-transform="down-5"></span>
            <div class="flex-1">
                <p class="mb-0">Titulo del Documentos</p>
                <p class="fs--1 mb-0 text-600">Jan 12, 11:13 PM</p>
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
        <div class="col-auto"><a class="btn btn-falcon-default btn-sm" href="#!">
            <span class="fas fa-pencil-alt fs--2 me-1"></span>Update details</a>
        </div>
    </div>
</div>
<div class="card-body bg-light border-top">
    <div class="row">
        <div class="col-lg col-xxl-5">
            <h6 class="fw-semi-bold ls mb-3 text-uppercase">Informacion</h6>
            <div class="row">
                <div class="col-5 col-sm-4">
                    <p class="fw-semi-bold mb-1">ID</p>
                </div>
                <div class="col">dcfasyo_Dfdjl</div>
            </div>
            <div class="row">
                <div class="col-5 col-sm-4">
                    <p class="fw-semi-bold mb-1">Creado</p>
                </div>
                <div class="col">2019/01/12 23:13</div>
            </div>
            <div class="row">
                <div class="col-5 col-sm-4">
                    <p class="fw-semi-bold mb-1">Usuario</p>
                </div>
                <div class="col"><a href="mailto:tony@gmail.com">tony@gmail.com</a></div>
            </div>
            <div class="row">
                <div class="col-5 col-sm-4">
                    <p class="fw-semi-bold mb-1">Descripcion</p>
                </div>
                <div class="col">
                    <p class="fst-italic text-400 mb-1">No Description</p>
                </div>
            </div>
            <div class="row">
                <div class="col-5 col-sm-4">
                    <p class="fw-semi-bold mb-0">Fecha de Exp.</p>
                </div>
                <div class="col">
                    <p class="fst-italic text-400 mb-0">00/00/0000</p>
                </div>
            </div>
        </div>
        <div class="col-lg col-xxl-5 mt-4 mt-lg-0 offset-xxl-1">
            <h6 class="fw-semi-bold ls mb-3 text-uppercase">Billing Information</h6>
            <div class="row">
                <div class="col-5 col-sm-4">
                    <p class="fw-semi-bold mb-1">Send email to</p>
                </div>
                <div class="col"><a href="mailto:tony@gmail.com">tony@gmail.com</a></div>
            </div>
            <div class="row">
                <div class="col-5 col-sm-4">
                    <p class="fw-semi-bold mb-1">Address</p>
                </div>
                <div class="col">
                    <p class="mb-1">8962 Lafayette St. <br />Oswego, NY 13126</p>
                </div>
            </div>
            <div class="row">
                <div class="col-5 col-sm-4">
                    <p class="fw-semi-bold mb-1">Phone number</p>
                </div>
                <div class="col"><a href="tel:+12025550110">+1-202-555-0110</a></div>
                </div>
            <div class="row">
                <div class="col-5 col-sm-4">
                    <p class="fw-semi-bold mb-0">Invoice prefix</p>
                </div>
                <div class="col">
                    <p class="fw-semi-bold mb-0">7C23435</p>
                </div>
            </div>
        </div>
    </div>
    </div>       
</div>
<div class="card mb-3">
    <div class="card-header">
        <h5 class="mb-0">Archivos Adjuntos</h5>
    </div>
    <div class="card-body border-top p-0">
        <div class="row g-0 align-items-center border-bottom py-2 px-3">
            <div class="col-md-auto pe-3"><span class="badge badge-soft-success rounded-pill">200</span></div>
            <div class="col-md mt-1 mt-md-0"><code>Nombre completo del Archivo</code></div>
            <div class="col-md-auto">
                <p class="mb-0">2019/02/23 15:29:45</p>
            </div>
        </div>
        <div class="row g-0 align-items-center border-bottom py-2 px-3">
            <div class="col-md-auto pe-3"><span class="badge badge-soft-warning rounded-pill">400</span></div>
            <div class="col-md mt-1 mt-md-0"><code>POST /v1/invoiceitems</code></div>
            <div class="col-md-auto">
                <p class="mb-0">2019/02/19 21:32:12</p>
            </div>
        </div>
        <div class="row g-0 align-items-center border-bottom py-2 px-3">
            <div class="col-md-auto pe-3"><span class="badge badge-soft-danger rounded-pill">404</span></div>
            <div class="col-md mt-1 mt-md-0"><code>POST /v1/invoices/in_1Dnkhadfk</code></div>
            <div class="col-md-auto">
                <p class="mb-0">2019/02/08 02:20:23</p>
            </div>
        </div>
    </div>        
</div>
        
@endsection