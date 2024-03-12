<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('date') }}
            {{ Form::text('date', $assemblyMovement->date, ['class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : ''), 'placeholder' => 'Date']) }}
            {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('typeMovement_id') }}
            {{ Form::text('typeMovement_id', $assemblyMovement->typeMovement_id, ['class' => 'form-control' . ($errors->has('typeMovement_id') ? ' is-invalid' : ''), 'placeholder' => 'Typemovement Id']) }}
            {!! $errors->first('typeMovement_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('order') }}
            {{ Form::text('order', $assemblyMovement->order, ['class' => 'form-control' . ($errors->has('order') ? ' is-invalid' : ''), 'placeholder' => 'Order']) }}
            {!! $errors->first('order', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('note') }}
            {{ Form::text('note', $assemblyMovement->note, ['class' => 'form-control' . ($errors->has('note') ? ' is-invalid' : ''), 'placeholder' => 'Note']) }}
            {!! $errors->first('note', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('finishedProduct_id') }}
            {{ Form::text('finishedProduct_id', $assemblyMovement->finishedProduct_id, ['class' => 'form-control' . ($errors->has('finishedProduct_id') ? ' is-invalid' : ''), 'placeholder' => 'Finishedproduct Id']) }}
            {!! $errors->first('finishedProduct_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('amount') }}
            {{ Form::text('amount', $assemblyMovement->amount, ['class' => 'form-control' . ($errors->has('amount') ? ' is-invalid' : ''), 'placeholder' => 'Amount']) }}
            {!! $errors->first('amount', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('color_id') }}
            {{ Form::text('color_id', $assemblyMovement->color_id, ['class' => 'form-control' . ($errors->has('color_id') ? ' is-invalid' : ''), 'placeholder' => 'Color Id']) }}
            {!! $errors->first('color_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('origin_id') }}
            {{ Form::text('origin_id', $assemblyMovement->origin_id, ['class' => 'form-control' . ($errors->has('origin_id') ? ' is-invalid' : ''), 'placeholder' => 'Origin Id']) }}
            {!! $errors->first('origin_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('movementDeatil_id') }}
            {{ Form::text('movementDeatil_id', $assemblyMovement->movementDeatil_id, ['class' => 'form-control' . ($errors->has('movementDeatil_id') ? ' is-invalid' : ''), 'placeholder' => 'Movementdeatil Id']) }}
            {!! $errors->first('movementDeatil_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('location_id') }}
            {{ Form::text('location_id', $assemblyMovement->location_id, ['class' => 'form-control' . ($errors->has('location_id') ? ' is-invalid' : ''), 'placeholder' => 'Location Id']) }}
            {!! $errors->first('location_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('observation') }}
            {{ Form::text('observation', $assemblyMovement->observation, ['class' => 'form-control' . ($errors->has('observation') ? ' is-invalid' : ''), 'placeholder' => 'Observation']) }}
            {!! $errors->first('observation', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>