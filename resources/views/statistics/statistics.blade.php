@php
    $dashboardAlamacen = Statistic();
    // $fechaInicio = 'fechaInicio';

    // dd($dashboardAlamacen['registros']);
    // $url = route('/estadistica', ['fechaInicio' => $fechaInicio]);
@endphp
@extends('layouts.app')
@section('content')
<div class="mt-0">
    <div class="row mt-0">
        <div class="">
            <h1 class="text-center ">
                Estadistica
            </h1>
        </div>
        <div class="row">
            <div class="continer col border m-5">
                <form id="filters">
                    <label for="fechaInicio">Fecha de inicio:</label>
                    <input type="date" id="fechaInicio" name="fechaInicio">

                    <label for="fechaFin">Fecha de fin:</label>
                    <input type="date" id="fechaFin" name="fechaFin">

                    <button type="submit">Filtrar</button>
                  </form>
                <div class="table-responsive">

                    @if (count($dashboardAlamacen['registros']) !== 0)
                        <table class="table table-striped table-hover">

                            <thead class="thead">
                                <tr>
                                    {{-- <th>No</th> --}}
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dashboardAlamacen['registros'] as $item)
                                    <tr>
                                        {{-- <td>{{ ++$i }}</td> --}}
                                        <td>{{ $item->date }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->color_id }}</td>
                                        <td>{{ $item->paw_id }}</td>
                                        <td>{{ $item->amount }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h4 class="text-center">No hay registros</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
