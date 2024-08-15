<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Fecha') }}
                    {{ Form::date('date', $mechanicsMovement->date, ['class' => 'form-control' . ($errors->has('Fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
                    {!! $errors->first('Fecha', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Tipo') }}
                    {{ Form::select('typeMovement_id', $typeMovement, $mechanicsMovement->typeMovement_id, ['class' => 'form-control' . ($errors->has('Tipo') ? ' is-invalid' : ''), 'placeholder' => 'Tipo']) }}
                    {!! $errors->first('Tipo', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Nota') }}
                    {{ Form::text('note', $mechanicsMovement->note, ['class' => 'form-control' . ($errors->has('Nota') ? ' is-invalid' : ''), 'placeholder' => 'Nota']) }}
                    {!! $errors->first('Nota', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Ordden') }}
                    {{ Form::text('order', $mechanicsMovement->order, ['class' => 'form-control' . ($errors->has('Ordden') ? ' is-invalid' : ''), 'placeholder' => 'Ordden']) }}
                    {!! $errors->first('Ordden', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Proveedor') }}
                    {{ Form::select('supplier_id', $supplier, $mechanicsMovement->supplier_id, ['class' => 'form-control' . ($errors->has('Proveedor') ? ' is-invalid' : ''), 'placeholder' => 'Proveedor']) }}
                    {!! $errors->first('Proveedor', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Producto o Materia Prima') }}
                    {{ Form::text('Product', $mechanicsMovement->Product, ['class' => 'form-control' . ($errors->has('Producto o Materia Prima') ? ' is-invalid' : ''), 'placeholder' => 'Producto o Materia Prima']) }}
                    {!! $errors->first('Producto o Materia Prima', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Cantidad Und') }}
                    {{ Form::text('amountUnd', $mechanicsMovement->amountUnd, ['class' => 'form-control' . ($errors->has('Cantidad Und') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad Und']) }}
                    {!! $errors->first('Cantidad Und', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Cantidad Mts') }}
                    {{ Form::text('amountMts', $mechanicsMovement->amountMts, ['class' => 'form-control' . ($errors->has('Cantidad Mts') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad Mts']) }}
                    {!! $errors->first('Cantidad Mts', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Cantidad Kg') }}
                    {{ Form::text('amountKg', $mechanicsMovement->amountKg, ['class' => 'form-control' . ($errors->has('Cantidad Kg') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad Kg']) }}
                    {!! $errors->first('Cantidad Kg', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Origen o Destino') }}
                    {{ Form::select('origin_id', $mechanicsMovement->origin_id, ['class' => 'form-control' . ($errors->has('Origen o Destino') ? ' is-invalid' : ''), 'placeholder' => 'Origen o Destino']) }}
                    {!! $errors->first('Origen o Destino', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Observacion') }}
                    {{ Form::text('observation', $mechanicsMovement->observation, ['class' => 'form-control' . ($errors->has('Observacion') ? ' is-invalid' : ''), 'placeholder' => 'Observacion']) }}
                    {!! $errors->first('Observacion', '<div class="invalid-feedback">:message</div>') !!}
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
