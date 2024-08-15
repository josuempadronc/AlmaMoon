<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Fecha') }}
                    {{ Form::date('date', $mechanicsConsumption->date, ['class' => 'form-control' . ($errors->has('Fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
                    {!! $errors->first('Fecha', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Tipo') }}
                    {{ Form::select('typeMovement_id', $typeMovement, $mechanicsConsumption->typeMovement_id, ['class' => 'form-control' . ($errors->has('Tipo') ? ' is-invalid' : ''), 'placeholder' => 'Tipo']) }}
                    {!! $errors->first('Tipo', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Ordden') }}
                    {{ Form::text('order', $mechanicsConsumption->order, ['class' => 'form-control' . ($errors->has('Ordden') ? ' is-invalid' : ''), 'placeholder' => 'Ordden']) }}
                    {!! $errors->first('Ordden', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Materia Prima') }}
                    {{ Form::select('rawMaterial_id',$rawMaterial_id, $mechanicsConsumption->rawMaterial_id, ['class' => 'form-control' . ($errors->has('Materia Prima') ? ' is-invalid' : ''), 'placeholder' => 'Materia Prima']) }}
                    {!! $errors->first('Materia Prima', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Cantidad Kg') }}
                    {{ Form::text('amountRoll', $mechanicsConsumption->amountRoll, ['class' => 'form-control' . ($errors->has('Cantidad Kg') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad Kg']) }}
                    {!! $errors->first('Cantidad Kg', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Cantidad Mts') }}
                    {{ Form::text('amountMts', $mechanicsConsumption->amountMts, ['class' => 'form-control' . ($errors->has('Cantidad Mts') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad Mts']) }}
                    {!! $errors->first('Cantidad Mts', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Producto') }}
                    {{ Form::text('Product', $mechanicsConsumption->Product, ['class' => 'form-control' . ($errors->has('Producto') ? ' is-invalid' : ''), 'placeholder' => 'Producto']) }}
                    {!! $errors->first('Producto', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Cantidad ') }}
                    {{ Form::text('amountProduct', $mechanicsConsumption->amountProduct, ['class' => 'form-control' . ($errors->has('Cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
                    {!! $errors->first('Cantidad', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Tipo de Producto') }}
                    {{ Form::text('TypeProduct', $mechanicsConsumption->TypeProduct, ['class' => 'form-control' . ($errors->has('Tipo de Producto') ? ' is-invalid' : ''), 'placeholder' => 'Tipo de Producto']) }}
                    {!! $errors->first('Tipo de Producto', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Ubicacion') }}
                    {{ Form::text('location_id', $mechanicsConsumption->location_id, ['class' => 'form-control' . ($errors->has('Ubicacion') ? ' is-invalid' : ''), 'placeholder' => 'Ubicacion']) }}
                    {!! $errors->first('Ubicacion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Observacion') }}
                    {{ Form::text('observation', $mechanicsConsumption->observation, ['class' => 'form-control' . ($errors->has('Observacion') ? ' is-invalid' : ''), 'placeholder' => 'Observacion']) }}
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
