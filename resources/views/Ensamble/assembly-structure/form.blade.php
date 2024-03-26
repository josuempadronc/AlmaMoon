<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::select('name_input', $input, $assemblyStructure->name_input, ['class' => 'form-control' . ($errors->has('name_input') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('Nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('color') }}
            {{ Form::select('color_input', $input, $assemblyStructure->color_input, ['class' => 'form-control' . ($errors->has('color_input') ? ' is-invalid' : ''), 'placeholder' => 'Color']) }}
            {!! $errors->first('color', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Accesorio') }}
            {{ Form::select('accessory_id',$accessory, $assemblyStructure->accessory_id, ['class' => 'form-control' . ($errors->has('accessory_id') ? ' is-invalid' : ''), 'placeholder' => 'Accesorio']) }}
            {!! $errors->first('Accesorio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cantidad') }}
            {{ Form::text('amount', $assemblyStructure->amount, ['class' => 'form-control' . ($errors->has('amount') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('Cantidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>
