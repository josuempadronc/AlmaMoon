<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Producto') }}
                    {{ Form::text('finishedProduct_id', $progressLona->finishedProduct_id, ['class' => 'form-control' . ($errors->has('finishedProduct_id') ? ' is-invalid' : ''), 'placeholder' => 'Finishedproduct Id']) }}
                    {!! $errors->first('finishedProduct_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('cantidad') }}
                    {{ Form::num('cantidad', $progressLona->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
                    {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('status') }}
                    {{ Form::select('status', ['Pausa' => 'Pausa', 'Proceso' => 'Proceso', 'Espera' => 'Espera', 'Culminado' => 'Culminado'] ,$progressLona->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
                    {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('encargado') }}
                    {{ Form::text('encargado', $progressLona->encargado, ['class' => 'form-control' . ($errors->has('encargado') ? ' is-invalid' : ''), 'placeholder' => 'Encargado']) }}
                    {!! $errors->first('encargado', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('nota') }}
                    {{ Form::text('nota', $progressLona->nota, ['class' => 'form-control' . ($errors->has('nota') ? ' is-invalid' : ''), 'placeholder' => 'Nota']) }}
                    {!! $errors->first('nota', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('fecha') }}
                    {{ Form::date('fecha', $progressLona->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
                    {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>
