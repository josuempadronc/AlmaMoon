<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MonnPlast') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<div>
    <img src="./images/fondo.jpg"
        style="
    position:absolute;
    display: block;
    width: 100vw;
    height: 100vh;
">
    <div class="mx-5">
        <div class="row">
            <div class="col">
                <div class="card relative rounded-5"
                    style="
                            margin-top:4%;
                            background-color: #ffffff87;
                            height: 650px;
                            overflow: auto;
                        ">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="p-3">
                            <div class="row"
                                style="
                                  padding-right: 11rem;
                                  padding-left: 11rem;
                                ">
                                <div class="card text-bold  mb-3 mx-3 text-center fs-3 rounded-5"
                                    style="max-width: 15rem; height: 15rem;">
                                    <div class="card-header">Gerencia</div>
                                    <div class="card-body">
                                        <img class="w-100" src="./images/Diseño sin título.png" alt=""
                                            style="top: -10%;
                                        position: relative; width: 70% !important;">
                                    </div>
                                </div>
                                <div class="card text-bg-secondary mb-3 mx-3 text-center fs-3 rounded-5"
                                    style="max-width: 15rem; height: 15rem;">
                                    <div class="card-header">Almacen</div>
                                    <div class="card-body">
                                        <a href="almacen">
                                            <img class="w-100" src="./images/1.png" alt=""
                                                style="top: -10%;
                                        position: relative; width: 70% !important;">
                                        </a>
                                    </div>
                                </div>
                                <div class="card text-bg-success mb-3 mx-3 text-center fs-3 rounded-5"
                                    style="max-width: 15rem; height: 15rem;">
                                    <div class="card-header">Inyeccion</div>
                                    <div class="card-body">
                                        <a href="inyeccion">
                                            <img class="" src="./images/2.png" alt=""
                                                style="top: -10%;
                                            position: relative; width: 70% !important;">
                                        </a>
                                    </div>
                                </div>
                                <div class="card text-bg-danger mb-3 mx-3 text-center fs-3 rounded-5"
                                    style="max-width: 15rem; height: 15rem;">
                                    <div class="card-header">Ensamble</div>
                                    <div class="card-body">
                                        <a href="ensamble">
                                            <img class="w-100" src="./images/4.png" alt=""
                                                style="top: -10%;
                                                position: relative; width: 70% !important;">
                                        </a>
                                    </div>
                                </div>
                                <div class="card text-bg-warning mb-3 mx-3 text-center fs-3 rounded-5"
                                    style="max-width: 15rem; height: 15rem;">
                                    <div class="card-header">Molino</div>
                                    <div class="card-body">
                                        <img class="w-100" src="./images/6.png" alt=""
                                            style="top: -10%;
                                        position: relative; width: 70% !important;">
                                    </div>
                                </div>
                                <div class="card text-bg-info mb-3 mx-3 text-center fs-3 rounded-5"
                                    style="max-width: 15rem; height: 15rem;">
                                    <div class="card-header">Metal-Mecanica</div>
                                    <div class="card-body">
                                        <img class="w-100" src="./images/10.png" alt=""
                                            style="top: -10%;
                                        position: relative; width: 70% !important;">
                                    </div>
                                </div>
                                <div class="card text-bg-light mb-3 mx-3 text-center fs-3 rounded-5"
                                    style="max-width: 15rem; height: 15rem;">
                                    <div class="card-header">Costura</div>
                                    <div class="card-body">
                                        <img class="w-100" src="./images/7.png" alt=""
                                            style="top: -10%;
                                        position: relative; width: 70% !important;">
                                    </div>
                                </div>
                                <div class="card text-bg-dark mb-3 mx-3 text-center fs-3 rounded-5"
                                    style="max-width: 15rem; height: 15rem;">
                                    <div class="card-header">RRHH</div>
                                    <div class="card-body">
                                        <img class="w-100" src="./images/9.png" alt=""
                                            style="top: -10%;
                                        position: relative; width: 70% !important;">
                                    </div>
                                </div>
                                <div class="card text-bg-light mb-3 mx-3 text-center fs-3 rounded-5"
                                    style="max-width: 15rem; height: 15rem;">
                                    <div class="card-header">Ventas</div>
                                    <div class="card-body">
                                        <img class="w-100" src="./images/11.png" alt=""
                                            style="top: -10%;
                                        position: relative; width: 70% !important;">
                                    </div>
                                </div>
                                <div class="card text-bg-dark mb-3 mx-3 text-center fs-3 rounded-5"
                                    style="max-width: 15rem; height: 15rem;">
                                    <div class="card-header">Mto Industrial</div>
                                    <div class="card-body">
                                        <img class="w-100" src="./images/5.png" alt=""
                                            style="top: -10%;
                                        position: relative; width: 70% !important;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
