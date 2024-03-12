<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('name_input') }}
            {{ Form::text('name_input', $assemblyStructure->name_input, ['class' => 'form-control' . ($errors->has('name_input') ? ' is-invalid' : ''), 'placeholder' => 'Name Input']) }}
            {!! $errors->first('name_input', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('color_input') }}
            {{ Form::text('color_input', $assemblyStructure->color_input, ['class' => 'form-control' . ($errors->has('color_input') ? ' is-invalid' : ''), 'placeholder' => 'Color Input']) }}
            {!! $errors->first('color_input', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('accessory_id') }}
            {{ Form::text('accessory_id', $assemblyStructure->accessory_id, ['class' => 'form-control' . ($errors->has('accessory_id') ? ' is-invalid' : ''), 'placeholder' => 'Accessory Id']) }}
            {!! $errors->first('accessory_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('amount') }}
            {{ Form::text('amount', $assemblyStructure->amount, ['class' => 'form-control' . ($errors->has('amount') ? ' is-invalid' : ''), 'placeholder' => 'Amount']) }}
            {!! $errors->first('amount', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>