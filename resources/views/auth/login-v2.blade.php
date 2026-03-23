
@extends('layouts.lyt_login')
@section('content')    
<main class="main" id="top">
    <div class="container-fluid">        
        <div class="row min-vh-100 bg-100">
            <div class="col-6 d-none d-lg-block position-relative">
                <div class="bg-holder" style="background-image:url(falcon/assets/img/generic/14.jpg);background-position: 50% 20%;">
            </div>
        </div>
        <div class="col-sm-10 col-md-6 px-sm-0 align-self-center mx-auto py-5">
            <div class="row justify-content-center g-0">
                <div class="col-lg-9 col-xl-8 col-xxl-6">
                    <div class="card">
                        <div class="card-header bg-circle-shape bg-shape text-center p-2"><a class="font-sans-serif fw-bolder fs-4 z-index-1 position-relative link-light light" href="../../../index.html">GUMADOCS</a></div>
                            <div class="card-body p-4">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="email">Correo:</label>
                                    <input class="form-control" id="email" type="email" name="email"  :value="old('email')" required autofocus />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="password">Contraseña:</label>
                                    </div>
                                    <input class="form-control" id="password" type="password" name="password"/>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <div class="text-center mt-3">
                                    <p class="mb-0 fw-semibold">v{{ env('APP_VERSION', '0.0.0') }}</p>
                                </div>
                                
                                <div class="mb-3">
                                    <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">ACCEDER</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</main>
@endsection