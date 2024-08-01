<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Fecha') }}
                    {{ Form::date('date', $inyecionOrderPRoduction->date, ['class' => 'form-control' . ($errors->has('Fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
                    {!! $errors->first('Fecha', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Orden') }}
                    {{ Form::text('order', $inyecionOrderPRoduction->order, ['class' => 'form-control' . ($errors->has('Orden') ? ' is-invalid' : ''), 'placeholder' => 'Orden']) }}
                    {!! $errors->first('Orden', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Producto') }}
                    {{ Form::text('finishedProduct_id', $inyecionOrderPRoduction->finishedProduct_id, ['class' => 'form-control' . ($errors->has('Producto') ? ' is-invalid' : ''), 'placeholder' => 'Producto']) }}
                    {!! $errors->first('Producto', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Color') }}
                    {{ Form::text('color_id', $inyecionOrderPRoduction->color_id, ['class' => 'form-control' . ($errors->has('Color') ? ' is-invalid' : ''), 'placeholder' => 'Color']) }}
                    {!! $errors->first('Color', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Pata') }}
                    {{ Form::text('paw_id', $paw, $inyecionOrderPRoduction->paw_id, ['class' => 'form-control' . ($errors->has('Pata') ? ' is-invalid' : ''), 'placeholder' => 'Pata']) }}
                    {!! $errors->first('Pata', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Cantidad') }}
                    {{ Form::text('amount', $inyecionOrderPRoduction->amount, ['class' => 'form-control' . ($errors->has('Cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
                    {!! $errors->first('Cantidad', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Cantidad Realizada') }}
                    {{ Form::text('amountToManofacture', $inyecionOrderPRoduction->amountToManofacture, ['class' => 'form-control' . ($errors->has('Cantidad Realizada') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad Realizada']) }}
                    {!! $errors->first('Cantidad Realizada', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Cantidad Faltante') }}
                    {{ Form::select('amountManofacture', $inyecionOrderPRoduction->amountManofacture, ['class' => 'form-control' . ($errors->has('Cantidad Faltante') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad Faltante']) }}
                    {!! $errors->first('Cantidad Faltante', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('observacion') }}
                    {{ Form::select('observation', $inyecionRequest->observation, ['class' => 'form-control' . ($errors->has('observacion') ? ' is-invalid' : ''), 'placeholder' => 'Ubicacio']) }}
                    {!! $errors->first('observacion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">

            </div>
        </div>
    </div>
    <div class="box-footer mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>
