@extends('layouts.app')

@section('template_title')
    Actualizar Predido
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span class="card-title"> Actualizar Predido</span>
                            <div class="float-right">
                                <div class="float-right">
                                    <div class="float-right">
                                        <a class="btn btn-primary" href="{{ route('orders.index') }}">
                                            <i class="bi bi-backspace"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('orders.update', $order->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                {{ Form::label('Nombre') }}
                                                {{ Form::select('name_id', $Customer, $order->Customer->name ?? '', ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                                                {!! $errors->first('Nombre', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                {{ Form::label('Ci/Rif') }}
                                                {{ Form::text('rif', $order->rif ?? '', ['class' => 'form-control' . ($errors->has('rif') ? ' is-invalid' : ''), 'placeholder' => 'Ci/Rif']) }}
                                                {!! $errors->first('Ci/Rif', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                {{ Form::label('Destino') }}
                                                {{ Form::text('destination', $order->destination ?? '', ['class' => 'form-control' . ($errors->has('Destino') ? ' is-invalid' : ''), 'placeholder' => 'Destino']) }}
                                                {!! $errors->first('Destino', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                {{ Form::label('Tipo') }}
                                                {{ Form::select('movementDeatil_id', $movementDetail, $order->movementDeatil_id ?? '', ['class' => 'form-control' . ($errors->has('Tipo') ? ' is-invalid' : ''), 'placeholder' => 'Tipo']) }}
                                                {!! $errors->first('Tipo', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div id="items-container">
                                        <div class="row">
                                            <div class="col"></div>
                                            <div class="col"></div>
                                            <div class="col"></div>
                                            <div class="col "></div>
                                            <div class="col ms-5"></div>
                                            <div class="col ms-5"></div>
                                            <div class="col ms-5"></div>
                                            <div class="col ms-5 mt-2">
                                                <button type="button" id="add-item" class="btn btn-primary mx-3">Agregar</button>
                                            </div>
                                            @if ($orderFinishedProducts)
                                                @foreach ($orderFinishedProducts as $index => $orderFinishedProduct)
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                {{ Form::label('Producto') }}
                                                                {{ Form::select('finishedProduct_id['.$index.']', $FinishedProduct, $orderFinishedProduct->id ?? '', ['class' => 'form-control product', 'placeholder' => 'Producto']) }}
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                {{ Form::label('Color') }}
                                                                {{ Form::select('color_id['.$index.']', $Color, $orderFinishedProduct->color_id ?? '', ['class' => 'form-control product', 'placeholder' => 'Color']) }}
                                                                {!! $errors->first('color', '<div class="invalid-feedback">:message</div>') !!}
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                {{ Form::label('Cantidad') }}
                                                                <div class="d-flex">
                                                                    {{ Form::text('amount['.$index.']', $orderFinishedProduct->pivot->amount ?? '', ['class' => 'form-control quantity', 'placeholder' => 'Cantidad']) }}
                                                                <button type="button" class="btn btn-danger remove-item ms-3">Eliminar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>

                                    </div>
                                    {{-- <div id="items-container">
                                        @if (!empty($order->orderItems))
                                            @foreach ($order->orderItems as $index => $orderItem)
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            {{ Form::label('Producto') }}
                                                            {{ Form::select('finishedProduct_id['.$index.']', $FinishedProduct, $orderItem->finishedProduct_id ?? '', ['class' => 'form-control product', 'placeholder' => 'Producto']) }}
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            {{ Form::label('Color') }}
                                                            {{ Form::select('color_id['.$index.']', $Color, $orderItem->color ?? '', ['class' => 'form-control product', 'placeholder' => 'Color']) }}
                                                            {!! $errors->first('color', '<div class="invalid-feedback">:message</div>') !!}
                                                        </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            {{ Form::label('Cantidad') }}
                                                            <div class="d-flex">
                                                                {{ Form::text('amount['.$index.']', $orderItem->amount, ['class' => 'form-control quantity', 'placeholder' => 'Cantidad']) }}
                                                                <button type="button" id="add-item" class="btn btn-primary ms-3">Agregar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div> --}}


                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                {{ Form::label('Status') }}
                                                {{ Form::select('status', ['Pendiente' => 'Pendiente', 'En Espera' => 'En Espera', 'Despachado' => 'Despachado'], $order->status, ['class' => 'form-control' . ($errors->has('Status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
                                                {!! $errors->first('Status', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>

                                        <div class="col">
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer mt-2">
                                    <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
                                </div>
                            </div>




                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Agregar campo de producto y cantidad
        document.getElementById('add-item').addEventListener('click', function() {
            var newItem = document.createElement('div');
            newItem.className = 'row';
            newItem.innerHTML = `
            <div class="row">
                    <div class="col">
                        <div class="form-group">
                            {{ Form::label('Producto') }}
                            {{ Form::select('finishedProduct_id[]', $FinishedProduct, null, ['class' => 'form-control product', 'placeholder' => 'Producto']) }}
                        </div>
                    </div>
                    <div class="col">
                    <div class="form-group">
                        {{ Form::label('Color') }}
                        {{ Form::select('color_id[]', $Color, $order->color, ['class' => 'form-control product', 'placeholder' => 'Color']) }}
                        {!! $errors->first('Color', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                    <div class="col">
                        <div style="position: relative; left: 16px;">
                            {{ Form::label('Cantidad') }}
                        </div>
                        <div class="form-group d-flex" style="position: relative; left: 16px;">

                            {{ Form::text('amount[]', $order->amount, ['class' => 'form-control quantity', 'placeholder' => 'Cantidad']) }}
                            <div class="d-flex">
                                {!! $errors->first('Cantidad', '<div class="invalid-feedback">:message</div>') !!}
                                <button type="button" class="btn btn-danger remove-item ms-3">Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>`;

            document.getElementById('items-container').appendChild(newItem);
        });

        // Eliminar campo de producto y cantidad
        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('remove-item')) {
                event.target.closest('.row').remove();
            }
        });
    });
</script>
