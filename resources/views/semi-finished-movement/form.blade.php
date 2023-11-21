<div class="box box-info padding-1">
    <div class="box-body">

        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Fecha') }}
                    {{ Form::text('date', $semiFinishedMovement->date, ['class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
                    {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Tipo') }}
                    {{ Form::select('typeMovement_id', $typeMovement, $semiFinishedMovement->typeMovement_id, ['class' => 'form-control' . ($errors->has('typeMovement_id') ? ' is-invalid' : ''), 'placeholder' => 'Tipo']) }}
                    {!! $errors->first('typeMovement_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Codigo') }}
                    {{ Form::text('code', $semiFinishedMovement->code, ['class' => 'form-control' . ($errors->has('code') ? ' is-invalid' : ''), 'placeholder' => 'Codigo']) }}
                    {!! $errors->first('code', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Orden') }}
                    {{ Form::text('order', $semiFinishedMovement->order, ['class' => 'form-control' . ($errors->has('order') ? ' is-invalid' : ''), 'placeholder' => 'Orden']) }}
                    {!! $errors->first('order', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Lote') }}
                    {{ Form::text('batch', $semiFinishedMovement->batch, ['class' => 'form-control' . ($errors->has('batch') ? ' is-invalid' : ''), 'placeholder' => 'Lote']) }}
                    {!! $errors->first('batch', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Proveedor') }}
                    {{ Form::select('supplier_id', $supplier, $semiFinishedMovement->supplier_id, ['class' => 'form-control' . ($errors->has('supplier_id') ? ' is-invalid' : ''), 'placeholder' => 'Proveedor']) }}
                    {!! $errors->first('supplier_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Producto SemiTerminado') }}
                    {{ Form::select('SemifinishedProduct_id', $semifinishedProduct, $semiFinishedMovement->SemifinishedProduct_id, ['class' => 'form-control' . ($errors->has('SemifinishedProduct_id') ? ' is-invalid' : ''), 'placeholder' => 'Producto SemiTerminado']) }}
                    {!! $errors->first('SemifinishedProduct_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Cantidad') }}
                    {{ Form::text('amount', $semiFinishedMovement->amount, ['class' => 'form-control' . ($errors->has('amount') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
                    {!! $errors->first('amount', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Medidas') }}
                    {{ Form::select('measures_id', $measure, $semiFinishedMovement->measures_id, ['class' => 'form-control' . ($errors->has('measures_id') ? ' is-invalid' : ''), 'placeholder' => 'Medidas']) }}
                    {!! $errors->first('measures_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Origen') }}
                    {{ Form::select('origin_id', $origin, $semiFinishedMovement->origin_id, ['class' => 'form-control' . ($errors->has('origin_id') ? ' is-invalid' : ''), 'placeholder' => 'Origen']) }}
                    {!! $errors->first('origin_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Destino') }}
                    {{ Form::select('destination_id', $destination, $semiFinishedMovement->destination_id, ['class' => 'form-control' . ($errors->has('destination_id') ? ' is-invalid' : ''), 'placeholder' => 'Destino']) }}
                    {!! $errors->first('destination_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>
