<div class="box box-info padding-1">
    <div class="box-body">

        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Fecha') }}
                    {{ Form::text('date', $assemblyMovementInput->date, ['class' => 'form-control' . ($errors->has('Fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
                    {!! $errors->first('Fecha', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Tipo de Movimiento') }}
                    {{ Form::select('typeMovement_id', $typeMovement, $assemblyMovementInput->typeMovement_id, ['class' => 'form-control' . ($errors->has('Tipo de Movimiento') ? ' is-invalid' : ''), 'placeholder' => 'Tipo de Movimiento']) }}
                    {!! $errors->first('Tipo de Movimiento', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('No Orden') }}
                    {{ Form::text('order', $assemblyMovementInput->order, ['class' => 'form-control' . ($errors->has('order') ? ' is-invalid' : ''), 'placeholder' => 'No Orden']) }}
                    {!! $errors->first('No Orden', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('No Nota') }}
                    {{ Form::text('note', $assemblyMovementInput->note, ['class' => 'form-control' . ($errors->has('No Nota') ? ' is-invalid' : ''), 'placeholder' => 'No Nota']) }}
                    {!! $errors->first('No Nota', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Insumo') }}
                    {{ Form::Select('input_id',$assemblyInput, $assemblyMovementInput->input_id, ['class' => 'form-control' . ($errors->has('Insumo') ? ' is-invalid' : ''), 'placeholder' => 'Insumo']) }}
                    {!! $errors->first('Insumo', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Cantidad') }}
                    {{ Form::text('amount', $assemblyMovementInput->amount, ['class' => 'form-control' . ($errors->has('Cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
                    {!! $errors->first('Cantidad', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Color') }}
                    {{ Form::Select('color_id',$colors, $assemblyMovementInput->color_id, ['class' => 'form-control' . ($errors->has('Color') ? ' is-invalid' : ''), 'placeholder' => 'Color']) }}
                    {!! $errors->first('Color', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Origen') }}
                    {{ Form::select('origin_id',$origin, $assemblyMovementInput->origin_id, ['class' => 'form-control' . ($errors->has('Origen') ? ' is-invalid' : ''), 'placeholder' => 'Origen']) }}
                    {!! $errors->first('Origen', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Detalle') }}
                    {{ Form::select('movementDeatil_id',$movementDetail, $assemblyMovementInput->movementDeatil_id, ['class' => 'form-control' . ($errors->has('movementDeatil_id') ? ' is-invalid' : ''), 'placeholder' => 'Detalle']) }}
                    {!! $errors->first('Detalle', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Ubicacion') }}
                    {{ Form::select('location_id',$location, $assemblyMovementInput->location_id, ['class' => 'form-control' . ($errors->has('Ubicacion') ? ' is-invalid' : ''), 'placeholder' => 'Ubicacion']) }}
                    {!! $errors->first('Ubicacion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('observacion') }}
                    {{ Form::text('observation', $assemblyMovementInput->observation, ['class' => 'form-control' . ($errors->has('observacion') ? ' is-invalid' : ''), 'placeholder' => 'observacion']) }}
                    {!! $errors->first('observacion', '<div class="invalid-feedback">:message</div>') !!}
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
