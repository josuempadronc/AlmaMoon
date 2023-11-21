<div class="box box-info padding-1">
    <div class="box-body">

        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Fecha') }}
                    {{ Form::text('date', $rawMaterialMovement->date, ['class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
                    {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Tipo') }}
                    {{ Form::select('typeMovement_id', $TypeMovement, $rawMaterialMovement->typeMovement_id, ['class' => 'form-control' . ($errors->has('typeMovement_id') ? ' is-invalid' : ''), 'placeholder' => 'Tipo']) }}
                    {!! $errors->first('typeMovement_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Orden') }}
                    {{ Form::text('order', $rawMaterialMovement->order, ['class' => 'form-control' . ($errors->has('order') ? ' is-invalid' : ''), 'placeholder' => 'Orden']) }}
                    {!! $errors->first('order', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Consumo') }}
                    {{ Form::select('consumption', $rawMaterial, $rawMaterialMovement->consumption, ['class' => 'form-control' . ($errors->has('consumption') ? ' is-invalid' : ''), 'placeholder' => 'Consumo']) }}
                    {!! $errors->first('consumption', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Cliente') }}
                    {{ Form::text('businessName', $rawMaterialMovement->businessName, ['class' => 'form-control' . ($errors->has('businessName') ? ' is-invalid' : ''), 'placeholder' => 'Cliente']) }}
                    {!! $errors->first('businessName', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Proveedor') }}
                    {{ Form::select('supplier_id', $supplier, $rawMaterialMovement->supplier_id, ['class' => 'form-control' . ($errors->has('supplier_id') ? ' is-invalid' : ''), 'placeholder' => 'Proveedor']) }}
                    {!! $errors->first('supplier_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Material') }}
                    {{ Form::select('rawMaterial', $rawMaterial, $rawMaterialMovement->rawMaterial, ['class' => 'form-control' . ($errors->has('rawMaterial') ? ' is-invalid' : ''), 'placeholder' => 'Material']) }}
                    {!! $errors->first('rawMaterial', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Cantidad') }}
                    {{ Form::text('amount', $rawMaterialMovement->amount, ['class' => 'form-control' . ($errors->has('amount') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
                    {!! $errors->first('amount', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Origen') }}
                    {{ Form::select('origin_id', $origin, $rawMaterialMovement->origin_id, ['class' => 'form-control' . ($errors->has('origin_id') ? ' is-invalid' : ''), 'placeholder' => 'Origen']) }}
                    {!! $errors->first('origin_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Destino') }}
                    {{ Form::select('destination_id', $destination, $rawMaterialMovement->destination_id, ['class' => 'form-control' . ($errors->has('destination_id') ? ' is-invalid' : ''), 'placeholder' => 'Destino']) }}
                    {!! $errors->first('destination_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Ubicacion') }}
                    {{ Form::select('location_id', $location, $rawMaterialMovement->location_id, ['class' => 'form-control' . ($errors->has('location_id') ? ' is-invalid' : ''), 'placeholder' => 'Ubicacion']) }}
                    {!! $errors->first('location_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Observacion') }}
                    {{ Form::text('observation', $rawMaterialMovement->observation, ['class' => 'form-control' . ($errors->has('observation') ? ' is-invalid' : ''), 'placeholder' => 'Observacion']) }}
                    {!! $errors->first('observation', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>
