<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Fecha') }}
                    {{ Form::date('date', $paintMovement->date, ['class' => 'form-control' . ($errors->has('Fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
                    {!! $errors->first('Fecha', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Tipo') }}
                    {{ Form::select('typeMovement_id', $typeMovement,$paintMovement->typeMovement_id, ['class' => 'form-control' . ($errors->has('Tipo') ? ' is-invalid' : ''), 'placeholder' => 'Tipo']) }}
                    {!! $errors->first('Tipo', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Nota') }}
                    {{ Form::text('nota', $paintMovement->nota, ['class' => 'form-control' . ($errors->has('Nota') ? ' is-invalid' : ''), 'placeholder' => 'Nota']) }}
                    {!! $errors->first('Nota', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Orden') }}
                    {{ Form::text('order', $paintMovement->order, ['class' => 'form-control' . ($errors->has('Orden') ? ' is-invalid' : ''), 'placeholder' => 'Orden']) }}
                    {!! $errors->first('Orden', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Producto o Material') }}
                    {{ Form::text('Product', $paintMovement->Product, ['class' => 'form-control' . ($errors->has('Producto o Material') ? ' is-invalid' : ''), 'placeholder' => 'Producto o Material']) }}
                    {!! $errors->first('Producto o Material', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Cantidad') }}
                    {{ Form::text('amount', $paintMovement->amount, ['class' => 'form-control' . ($errors->has('Cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
                    {!! $errors->first('Cantidad', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Medidas') }}
                    {{ Form::select('measures_id',$measure, $paintMovement->measures_id, ['class' => 'form-control' . ($errors->has('Medidas') ? ' is-invalid' : ''), 'placeholder' => 'Medidas']) }}
                    {!! $errors->first('Medidas', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Origen') }}
                    {{ Form::select('origin_id',$origin, $paintMovement->origin_id, ['class' => 'form-control' . ($errors->has('Origen') ? ' is-invalid' : ''), 'placeholder' => 'Origen']) }}
                    {!! $errors->first('Origen', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Observacion') }}
                    {{ Form::text('observation', $paintMovement->observation, ['class' => 'form-control' . ($errors->has('Observacion') ? ' is-invalid' : ''), 'placeholder' => 'Observacion']) }}
                    {!! $errors->first('Observacion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
    <div class="box-footer mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>
