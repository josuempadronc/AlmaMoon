<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('product_sheat_id') }}
            {{ Form::text('product_sheat_id', $productComponent->product_sheat_id, ['class' => 'form-control' . ($errors->has('product_sheat_id') ? ' is-invalid' : ''), 'placeholder' => 'Product Sheat Id']) }}
            {!! $errors->first('product_sheat_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('input_id') }}
            {{ Form::text('input_id', $productComponent->input_id, ['class' => 'form-control' . ($errors->has('input_id') ? ' is-invalid' : ''), 'placeholder' => 'Input Id']) }}
            {!! $errors->first('input_id', '<div class="invalid-feedback">:message</div>') !!}
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