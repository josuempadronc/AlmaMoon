<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Fecha') }}
                    {{ Form::date('date', $inyecionConsumptionRaw->date, ['class' => 'form-control' . ($errors->has('Fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
                    {!! $errors->first('Fecha', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Tipo') }}
                    {{ Form::select('typeMovement_id',$typeMovement,$inyecionConsumptionRaw->typeMovement_id, ['class' => 'form-control' . ($errors->has('Tipo') ? ' is-invalid' : ''), 'placeholder' => 'Tipo']) }}
                    {!! $errors->first('Tipo', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('N. Orden') }}
                    {{ Form::text('order', $inyecionConsumptionRaw->order, ['class' => 'form-control' . ($errors->has('N. Orden') ? ' is-invalid' : ''), 'placeholder' => 'N. Orden']) }}
                    {!! $errors->first('N. Orden', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('orderProduction') }}
                    {{ Form::text('orderProduction', $inyecionConsumptionRaw->orderProduction, ['class' => 'form-control' . ($errors->has('orderProduction') ? ' is-invalid' : ''), 'placeholder' => 'Orderproduction']) }}
                    {!! $errors->first('orderProduction', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Maquina') }}
                    {{ Form::text('Maquina', $inyecionConsumptionRaw->Maquina, ['class' => 'form-control' . ($errors->has('Maquina') ? ' is-invalid' : ''), 'placeholder' => 'Maquina']) }}
                    {!! $errors->first('Maquina', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Producto') }}
                    {{ Form::select('finishedProduct_id',$finishedProduct,$inyecionConsumptionRaw->finishedProduct_id, ['class' => 'form-control' . ($errors->has('Producto') ? ' is-invalid' : ''), 'placeholder' => 'Producto']) }}
                    {!! $errors->first('Producto', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Materia Prima') }}
                    {{ Form::select('rawMaterial_id', $rawMaterial,$inyecionConsumptionRaw->rawMaterial_id, ['class' => 'form-control' . ($errors->has('Materia Prima') ? ' is-invalid' : ''), 'placeholder' => 'Materia Prima']) }}
                    {!! $errors->first('Materia Prima', '<div class="invalid-feedback">:message</div>') !!}
                </div>

            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Cantidad') }}
                    {{ Form::text('amount', $inyecionConsumptionRaw->amount, ['class' => 'form-control' . ($errors->has('Cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
                    {!! $errors->first('Cantidad', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Destino') }}
                    {{ Form::select('destination_id', $destination,$inyecionConsumptionRaw->destination_id, ['class' => 'form-control' . ($errors->has('Destino') ? ' is-invalid' : ''), 'placeholder' => 'Destino']) }}
                    {!! $errors->first('Destino', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('observacion') }}
                    {{ Form::text('observation',$inyecionConsumptionRaw->observation, ['class' => 'form-control' . ($errors->has('observacion') ? ' is-invalid' : ''), 'placeholder' => 'Ubicacio']) }}
                    {!! $errors->first('observacion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>
