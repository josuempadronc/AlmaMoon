<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Nombre') }}
                    {{ Form::text('name', $order->name, ['class' => 'form-control' . ($errors->has('Nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                    {!! $errors->first('Nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Rif') }}
                    {{ Form::text('rif', $order->rif, ['class' => 'form-control' . ($errors->has('Rif') ? ' is-invalid' : ''), 'placeholder' => 'Rif']) }}
                    {!! $errors->first('Rif', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Destino') }}
                    {{ Form::select('destination_id', $Destination, $order->destination_id, ['class' => 'form-control' . ($errors->has('Destino') ? ' is-invalid' : ''), 'placeholder' => 'Destino']) }}
                    {!! $errors->first('Destino', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Tipo') }}
                    {{ Form::select('movementDeatil_id', $movementDetail, $order->movementDeatil_id, ['class' => 'form-control' . ($errors->has('Tipo') ? ' is-invalid' : ''), 'placeholder' => 'Tipo']) }}
                    {!! $errors->first('Tipo', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Producto') }}
                    {{ Form::select('finishedProduct_id', [$FinishedProduct, $AssembledProduct], $order->finishedProduct_id, ['class' => 'form-control' . ($errors->has('Producto') ? ' is-invalid' : ''), 'placeholder' => 'Producto']) }}
                    {!! $errors->first('Producto', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Cantidad') }}
                    {{ Form::text('amount', $order->amount, ['class' => 'form-control' . ($errors->has('Cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
                    {!! $errors->first('Cantidad', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Status') }}
                    {{ Form::select('status', ['Pendiente' => 'Pendiente', 'En Espera' => 'En Espera', 'Despachado' => 'Despachado'], $order->status, ['class' => 'form-control' . ($errors->has('Status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
                    {!! $errors->first('Status', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="col">
                {{-- <div class="form-group">
                    {{ Form::label('Status') }}
                    {{ Form::select('status', ['Pendiente' => 'Pendiente', 'En Espera' => 'En Espera', 'Despachado' => 'Despachado'], $order->status, ['class' => 'form-control' . ($errors->has('Status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
                    {!! $errors->first('Status', '<div class="invalid-feedback">:message</div>') !!}
                </div> --}}
            </div>
        </div>
    </div>
    <div id="inputsContainer">
        <!-- Los inputs generados se agregarán aquí -->
    </div>

    <button id="addInputs">Agregar inputs</button>
    <div class="box-footer mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>
