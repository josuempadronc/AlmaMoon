<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Nombre') }}
                    {{ Form::text('name', $sewingRawMaterial->name, ['class' => 'form-control' . ($errors->has('Nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                    {!! $errors->first('Nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Color') }}
                    {{ Form::select('color_id', $color, $sewingRawMaterial->color_id, ['class' => 'form-control' . ($errors->has('Color') ? ' is-invalid' : ''), 'placeholder' => 'Color']) }}
                    {!! $errors->first('Color', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Cantidad de Rollos') }}
                    {{ Form::text('AmountRoll', $sewingRawMaterial->AmountRoll, ['class' => 'form-control' . ($errors->has('Cantidad de Rollos') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad de Rollos', 'id' => 'amount-roll']) }}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Cantidad en Mts') }}
                    {{ Form::text('AmountMts', $sewingRawMaterial->AmountMts, ['class' => 'form-control' . ($errors->has('Cantidad en Mts') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad en Mts', 'id' => 'amount-mts']) }}
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>

