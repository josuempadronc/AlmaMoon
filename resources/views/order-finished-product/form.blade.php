<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('order_id') }}
            {{ Form::text('order_id', $orderFinishedProduct->order_id, ['class' => 'form-control' . ($errors->has('order_id') ? ' is-invalid' : ''), 'placeholder' => 'Order Id']) }}
            {!! $errors->first('order_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('finished_product_id') }}
            {{ Form::text('finished_product_id', $orderFinishedProduct->finished_product_id, ['class' => 'form-control' . ($errors->has('finished_product_id') ? ' is-invalid' : ''), 'placeholder' => 'Finished Product Id']) }}
            {!! $errors->first('finished_product_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>