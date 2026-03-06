@section('metodosjs')
    @include('Documents.js_documents')
@endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-semibold fs-4 mb-0">
            {{ __('Documentos') }}
        </h2>
    </x-slot>

    <div class="py-5">

        <div class="container-fluid">

            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="row">
                            <div class="col-8">
                                <div class="input-group">
                                    <span class="input-group-text bg-body-secondary">
                                        <i data-feather="search"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Buscar en Inventario">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group">
                                    <input type="text" class="form-control input-fecha" name="dt_range">
                                    <span class="input-group-text bg-body-secondary">
                                        <i data-feather="calendar"></i>
                                    </span>                            
                                </div>
                            </div>
                            <div class="col-1">
                                <button class="btn btn-success px-4">
                                    Agregar
                                </button>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="tbl_documentos">
                                <thead class="table-secondary">
                                    <tr>
                                        <th class="text-start border-bottom">Col 1</th>
                                        <th class="text-start border-bottom">Col 2</th>
                                        <th class="text-start border-bottom">Col 3</th>
                                        <th class="text-start border-bottom">Col 4</th>
                                        <th class="text-start border-bottom">Col 5</th>
                                        <th class="text-start border-bottom">Col 6</th>
                                        <th class="text-start border-bottom">Col 7</th>
                                        <th class="text-start border-bottom">Col 8</th>
                                        <th class="text-start border-bottom">Col 9</th>
                                        <th class="text-start border-bottom">Col 10</th>
                                        <th class="text-start border-bottom">Col 11</th>
                                        <th class="text-start border-bottom">Acción</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @for ($i = 0; $i < 17; $i++)
                                        <tr>
                                            <td class="border-bottom">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</td>
                                            <td class="border-bottom">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</td>
                                            <td class="border-bottom">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</td>
                                            <td class="border-bottom">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</td>
                                            <td class="border-bottom">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</td>
                                            <td class="border-bottom">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</td>
                                            <td class="border-bottom">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</td>
                                            <td class="border-bottom">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</td>
                                            <td class="border-bottom">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</td>
                                            <td class="border-bottom">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</td>
                                            <td class="border-bottom">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</td>

                                            <td class="border-bottom">
                                                <div>
                                                    <a href="#" class="link-primary text-decoration-none">
                                                        editar
                                                    </a>
                                                    <span class="mx-2">|</span>
                                                    <a href="#" class="link-danger text-decoration-none">
                                                        eliminar
                                                    </a>
                                                    <span class="mx-2">|</span>
                                                    <a href="#" class="link-success text-decoration-none">
                                                        ver
                                                    </a>
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

</x-app-layout>