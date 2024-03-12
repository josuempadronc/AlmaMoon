<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('product_sheat_id') }}
            {{ Form::text('product_sheat_id', $productComponent->product_sheat_id, ['class' => 'form-control' . ($errors->has('product_sheat_id') ? ' is-invalid' : ''), 'placeholder' => 'Product Sheat Id']) }}
            {!! $errors->first('product_sheat_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('component') }}
            {{ Form::text('component', $productComponent->component, ['class' => 'form-control' . ($errors->has('component') ? ' is-invalid' : ''), 'placeholder' => 'Component']) }}
            {!! $errors->first('component', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('amount') }}
            {{ Form::text('amount', $productComponent->amount, ['class' => 'form-control' . ($errors->has('amount') ? ' is-invalid' : ''), 'placeholder' => 'Amount']) }}
            {!! $errors->first('amount', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>