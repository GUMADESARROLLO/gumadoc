@section('metodosjs')
    @include('Users.js_users')
@endsection

<x-app-layout>
   
    
   
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
                        <div class="row">

                            <div class="col-11">
                                <div class="input-group">
                                    <span class="input-group-text bg-body-secondary">
                                        <i data-feather="search"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Busqueda . . .">
                                </div>
                            </div>
                        
                            <div class="col-1">
                                
                                <button type="button" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#staticBackdrop">NUEVO</button>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="tbl_users">
                                <thead class="table-secondary">
                                    <tr>
                                        <th class="text-start border-bottom">NUM</th>
                                        <th class="text-start border-bottom">USER NAME</th>
                                        <th class="text-start border-bottom">EMAIL</th>
                                        <th class="text-start border-bottom">UNIDAD NEGOCIO</th>
                                        <th class="text-start border-bottom">DEPARTAMENTO</th>
                                        <th class="text-start border-bottom"> - </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($Users as $user)
                                        <tr>
                                            <td class="border-bottom">{{ $user->id }}</td>
                                            <td class="border-bottom">{{ $user->name }}</td>
                                            <td class="border-bottom">{{ $user->email }}</td>
                                            <td class="border-bottom"> - </td>
                                            <td class="border-bottom"> - </td>                                           

                                            <td class="border-bottom">
                                                <div class="d-flex justify-content-center">
                                                    <a href="#" class="btn btn-primary" OnClick="Editar({{$user}})">
                                                        EDITAR
                                                    </a>
                                                    <span class="mx-2">|</span>
                                                    <a href="#" class="btn btn-danger" OnClick="Eliminar({{$user->id}})">
                                                        ELIMINAR
                                                    </a>
                                                    
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

</x-app-layout>