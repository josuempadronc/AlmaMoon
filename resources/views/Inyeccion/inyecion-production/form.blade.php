<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Fecha') }}
                    {{ Form::date('date', $inyecionProduction->date, ['class' => 'form-control' . ($errors->has('Fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
                    {!! $errors->first('Fecha', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Producto') }}
                    {{ Form::select('finishedProduct_id', $finishedProduct, $inyecionProduction->finishedProduct_id, ['class' => 'form-control' . ($errors->has('Producto') ? ' is-invalid' : ''), 'placeholder' => 'Producto']) }}
                    {!! $errors->first('Producto', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Color') }}
                    {{ Form::select('color_id',$color, $inyecionProduction->color_id, ['class' => 'form-control' . ($errors->has('Color') ? ' is-invalid' : ''), 'placeholder' => 'Color']) }}
                    {!! $errors->first('Color', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Pata') }}
                    {{ Form::select('paw_id', $paw,$inyecionProduction->paw_id, ['class' => 'form-control' . ($errors->has('Pata') ? ' is-invalid' : ''), 'placeholder' => 'Pata']) }}
                    {!! $errors->first('Pata', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Cantidad') }}
                    {{ Form::text('amount', $inyecionProduction->amount, ['class' => 'form-control' . ($errors->has('Cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
                    {!! $errors->first('Cantidad', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Maquina') }}
                    {{ Form::text('Maquina', $inyecionProduction->Maquina, ['class' => 'form-control' . ($errors->has('Maquina') ? ' is-invalid' : ''), 'placeholder' => 'Maquina']) }}
                    {!! $errors->first('Maquina', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Destino') }}
                    {{ Form::select('destination_id', $destination,$inyecionProduction->destination_id, ['class' => 'form-control' . ($errors->has('Destino') ? ' is-invalid' : ''), 'placeholder' => 'Destino']) }}
                    {!! $errors->first('Destino', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Ubicacion') }}
                    {{ Form::select('location_id', $location,$inyecionProduction->location_id, ['class' => 'form-control' . ($errors->has('Ubicacion') ? ' is-invalid' : ''), 'placeholder' => 'Ubicacion']) }}
                    {!! $errors->first('Ubicacion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('observacion') }}
                    {{ Form::text('observation', $inyecionProduction->observation, ['class' => 'form-control' . ($errors->has('observacion') ? ' is-invalid' : ''), 'placeholder' => 'observacion']) }}
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
