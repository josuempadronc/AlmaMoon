<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Fecha') }}
                    {{ Form::date('date', $sewingMovement->date, ['class' => 'form-control' . ($errors->has('Fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
                    {!! $errors->first('Fecha', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Tipo') }}
                    {{ Form::select('typeMovement_id', $typeMovement,$sewingMovement->typeMovement_id, ['class' => 'form-control' . ($errors->has('Tipo') ? ' is-invalid' : ''), 'placeholder' => 'Tipo']) }}
                    {!! $errors->first('Tipo', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Nota') }}
                    {{ Form::text('note', $sewingMovement->note, ['class' => 'form-control' . ($errors->has('Nota') ? ' is-invalid' : ''), 'placeholder' => 'Nota']) }}
                    {!! $errors->first('Nota', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Materia Prima') }}
                    {{ Form::select('rawMaterial_id',$rawMaterial ,$sewingMovement->rawMaterial_id, ['class' => 'form-control' . ($errors->has('Materia Prima') ? ' is-invalid' : ''), 'placeholder' => 'Materia Prima']) }}
                    {!! $errors->first('Materia Prima', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Proveedor') }}
                    {{ Form::select('supplier_id' ,$Supplier,$sewingMovement->supplier_id, ['class' => 'form-control' . ($errors->has('Proveedor') ? ' is-invalid' : ''), 'placeholder' => 'Proveedor']) }}
                    {!! $errors->first('Proveedor', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Cantidad por Rollo') }}
                    {{ Form::text('amountRoll', $sewingMovement->amountRoll, ['class' => 'form-control' . ($errors->has('Cantidad por Rollo') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad por Rollo']) }}
                    {!! $errors->first('Cantidad por Rollo', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Cantidad por Mts') }}
                    {{ Form::text('amountMts', $sewingMovement->amountMts, ['class' => 'form-control' . ($errors->has('Cantidad por Mts') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad por Mts']) }}
                    {!! $errors->first('Cantidad por Mts', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Color') }}
                    {{ Form::select('color_id',$color, $sewingMovement->color_id, ['class' => 'form-control' . ($errors->has('Color') ? ' is-invalid' : ''), 'placeholder' => 'Color']) }}
                    {!! $errors->first('Color', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Origen') }}
                    {{ Form::select('origin_id',$origin ,$sewingMovement->origin_id, ['class' => 'form-control' . ($errors->has('Origen') ? ' is-invalid' : ''), 'placeholder' => 'Origen']) }}
                    {!! $errors->first('Origen', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Observacion') }}
                    {{ Form::text('observation', $sewingMovement->observation, ['class' => 'form-control' . ($errors->has('Observacion') ? ' is-invalid' : ''), 'placeholder' => 'Observacion']) }}
                    {!! $errors->first('Observacion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>
