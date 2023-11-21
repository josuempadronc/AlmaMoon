<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Color') }}
            {{ Form::select('color_id', $colors, $finishedProduct->color_id, ['class' => 'form-control' . ($errors->has('color_id') ? ' is-invalid' : ''), 'placeholder' => 'Colores']) }}
            {!! $errors->first('color_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Patas') }}
            {{ Form::select('paw_id', $paws, $finishedProduct->paw_id, ['class' => 'form-control' . ($errors->has('paw_id') ? ' is-invalid' : ''), 'placeholder' => 'Patas']) }}
            {!! $errors->first('paw_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('name', $finishedProduct->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cantidad') }}
            {{ Form::text('stock', $finishedProduct->stock, ['class' => 'form-control' . ($errors->has('stock') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('stock', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>
