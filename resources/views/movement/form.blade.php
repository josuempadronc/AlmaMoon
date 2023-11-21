<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Fecha') }}
                    {{ Form::date('date', $movement->date, ['class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
                    {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Tipo') }}
                    {{ Form::select('typeMovement_id', $typeMovement, $movement->typeMovement_id, ['class' => 'form-control' . ($errors->has('typeMovement_id') ? ' is-invalid' : ''), 'placeholder' => 'Tipo']) }}
                    {!! $errors->first('typeMovement_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Detalle') }}
                    {{ Form::select('movementDeatil_id', $movementDetail, $movement->movementDeatil_id, ['class' => 'form-control' . ($errors->has('movementDeatil_id') ? ' is-invalid' : ''), 'placeholder' => 'Detalle']) }}
                    {!! $errors->first('movementDeatil_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('codigo') }}
                    {{ Form::text('code', $movement->code, ['class' => 'form-control' . ($errors->has('code') ? ' is-invalid' : ''), 'placeholder' => 'codigo']) }}
                    {!! $errors->first('code', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('orden') }}
                    {{ Form::text('order', $movement->order, ['class' => 'form-control' . ($errors->has('order') ? ' is-invalid' : ''), 'placeholder' => 'orden']) }}
                    {!! $errors->first('order', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Lote') }}
                    {{ Form::text('batch', $movement->batch, ['class' => 'form-control' . ($errors->has('batch') ? ' is-invalid' : ''), 'placeholder' => 'Lote']) }}
                    {!! $errors->first('batch', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Cliente') }}
                    {{ Form::text('businessName', $movement->businessName, ['class' => 'form-control' . ($errors->has('businessName') ? ' is-invalid' : ''), 'placeholder' => 'Cliente']) }}
                    {!! $errors->first('businessName', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Ubicacion') }}
                    {{ Form::select('location_id', $location, $movement->location_id, ['class' => 'form-control' . ($errors->has('location_id') ? ' is-invalid' : ''), 'placeholder' => 'Ubicacion']) }}
                    {!! $errors->first('location_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Origen') }}
                    {{ Form::select('origin_id', $origin, $movement->origin_id, ['class' => 'form-control' . ($errors->has('origin_id') ? ' is-invalid' : ''), 'placeholder' => 'Origen']) }}
                    {!! $errors->first('origin_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Producto') }}
                    {{ Form::select('finishedProduct_id', $FinishedProduct, $movement->finishedProduct_id, ['class' => 'form-control' . ($errors->has('finishedProduct_id') ? ' is-invalid' : ''), 'placeholder' => 'Producto']) }}
                    {!! $errors->first('finishedProduct_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Cantidad') }}
                    {{ Form::text('amount', $movement->amount, ['class' => 'form-control' . ($errors->has('amount') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
                    {!! $errors->first('amount', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Destino') }}
                    {{ Form::select('destination_id', $Destination, $movement->destination_id, ['class' => 'form-control' . ($errors->has('destination_id') ? ' is-invalid' : ''), 'placeholder' => 'Destino']) }}
                    {!! $errors->first('destination_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Observacion') }}
                    {{ Form::text('observation', $movement->observation, ['class' => 'form-control' . ($errors->has('observation') ? ' is-invalid' : ''), 'placeholder' => 'Observacion']) }}
                    {!! $errors->first('observation', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                {{-- <div class="form-group">
                    {{ Form::label('Destino') }}
                    {{ Form::select('destination_id', $distination, $movement->destination_id, ['class' => 'form-control' . ($errors->has('destination_id') ? ' is-invalid' : ''), 'placeholder' => 'Destino']) }}
                    {!! $errors->first('destination_id', '<div class="invalid-feedback">:message</div>') !!}
                </div> --}}
            </div>
        </div>
    </div>
    <div class="box-footer mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>
