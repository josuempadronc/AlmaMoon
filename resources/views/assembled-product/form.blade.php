<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('name', $assembledProduct->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="row g-3">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Producto SemiTerminado') }}
                    {{ Form::select('SemifinishedProduct_id',$semiFinishedProduct, $assembledProduct->SemifinishedProduct_id, ['class' => 'form-control' . ($errors->has('SemifinishedProduct_id') ? ' is-invalid' : ''), 'placeholder' => 'Producto SemiTerminado']) }}
                    {!! $errors->first('SemifinishedProduct_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Cantidad') }}
                    {{ Form::text('amount', $assembledProduct->amount, ['class' => 'form-control' . ($errors->has('amount') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
                    {!! $errors->first('amount', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
          </div>
        <div class="form-group">
            {{ Form::label('Observacion') }}
            {{ Form::text('Observation', $assembledProduct->Observation, ['class' => 'form-control' . ($errors->has('Observation') ? ' is-invalid' : ''), 'placeholder' => 'Observacion']) }}
            {!! $errors->first('Observation', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>
