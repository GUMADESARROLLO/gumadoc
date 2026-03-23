@extends('Layouts.lyt_dashboard')
@section('scripts')
    @include('Users.js_users')
@endsection

@section('content')   
    
   
    <div class="py-5">

        <div class="container-fluid">

            <div class="card shadow-sm">
                <div class="card-body">
                    @if ($errors->any())                        
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="mb-4">
                        <div class="row align-items-center">
                            <div class="pagination d-none"></div>
                                <div class="col">
                                    <div class="input-group">                                    
                                        <div class="input-group-text bg-transparent"><span class="fa fa-search fs--1 text-600"></span></div>
                                        <input class="form-control form-control-sm shadow-none search" type="search" placeholder="Search for a page" aria-label="search" />
                                    </div>                                
                                </div>
                                <div class="col-auto d-flex">
                                    <button class="btn btn-sm btn-primary px-4 ms-2" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><span>NUEVO</span></button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive scrollbar">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">USER NAME</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">UNIDAD NEGOCIO</th>
                                    <th scope="col">DEPARTAMENTO</th>                                    
                                    <th class="text-end" scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->id }}</td>
                                        <td class="text-end">
                                        <div>
                                            <button class="btn p-0" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" OnClick="Editar({{$user}})"><span class="text-500 fas fa-edit" ></span></button>
                                            <button class="btn p-0 ms-2" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" OnClick="Eliminar({{$user->id}})"><span class="text-500 fas fa-trash-alt" ></span></button>
                                        </div>
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


    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Nuevo Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">               
                    <form action="{{ route('users.store') }}" method="POST" class="row g-3" name="form_users">
                        @csrf
                        <div class="col-md-6">
                            <label for="name" class="form-label">NOMBRE COMPLETO</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class=" col-md-6">
                            <label for="email" class="form-label">EMAIL</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="col-md-6">
                            <label for="password" class="form-label">PASSWORD</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <div class="col-md-6">
                            <label for="password_confirmation" class="form-label">CONFIRMAR PASSWORD</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>

                        <div class="col-md-6">
                            <label for="unidad_negocio" class="form-label">UNIDAD DE NEGOCIO</label>
                            <select class="form-select" name="unidad_negocio" id="unidad_negocio" required>
                                <option value="" selected>N/D</option>
                                <option value="UMK">UNIMARK S,A</option>
                                <option value="GP">GUMA PHARMA</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="departamento" class="form-label">DEPARTAMENTO</label>
                            <select class="form-select" name="departamento" id="departamento" required>
                                <option value="" selected>N/D</option>
                                <option value="LEGAL">DEPARTAMENTO LEGAL</option>
                                <option value="REGENCIA">DEPARTMENTO REGENCIA</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>

                    </form>
                </div>
                
            </div>
        </div>
    </div>

@endsection