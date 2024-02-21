<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Nombre') }}
                    {{ Form::text('name', $order->name ?? '', ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Rif') }}
                    {{ Form::text('rif', $order->rif ?? '', ['class' => 'form-control' . ($errors->has('rif') ? ' is-invalid' : ''), 'placeholder' => 'Rif']) }}
                    {!! $errors->first('rif', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Destino') }}
                    {{ Form::select('destination_id', $Destination, $order->destination_id ?? '', ['class' => 'form-control' . ($errors->has('destination_id') ? ' is-invalid' : ''), 'placeholder' => 'Destino']) }}
                    {!! $errors->first('destination_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Tipo') }}
                    {{ Form::select('movementDeatil_id', $movementDetail, $order->movementDeatil_id ?? '', ['class' => 'form-control' . ($errors->has('movementDeatil_id') ? ' is-invalid' : ''), 'placeholder' => 'Tipo']) }}
                    {!! $errors->first('movementDeatil_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Producto') }}
                    {{ Form::select('finishedProduct_id[]', $FinishedProduct, $order->finishedProduct_id ?? '', ['class' => 'form-control product', 'placeholder' => 'Producto']) }}
                    {!! $errors->first('finishedProduct_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Color') }}
                    {{ Form::select('color[]', $Color, $order->color ?? '', ['class' => 'form-control product', 'placeholder' => 'Color']) }}
                    {!! $errors->first('color', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Cantidad') }}
                    <div class="form-group d-flex">
                        {{ Form::text('amount[]', $order->amount ?? '', ['class' => 'form-control quantity', 'placeholder' => 'Cantidad']) }}
                        {!! $errors->first('amount', '<div class="invalid-feedback">:message</div>') !!}
                        <button type="button" id="add-item" class="btn btn-primary ms-3">Agregar</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="items-container">
            @if (!empty($order->orderItems))
                @foreach ($order->orderItems as $index => $orderItem)
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {{ Form::label('Producto') }}
                                {{ Form::select('finishedProduct_id['.$index.']', $FinishedProduct, $orderItem->finishedProduct_id ?? '', ['class' => 'form-control product', 'placeholder' => 'Producto']) }}
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                {{ Form::label('Color') }}
                                {{ Form::select('color['.$index.']', $Color, $orderItem->color ?? '', ['class' => 'form-control product', 'placeholder' => 'Color']) }}
                                {!! $errors->first('color', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        <div class="col">
                            <div class="form-group">
                                {{ Form::label('Cantidad') }}
                                {{ Form::text('amount['.$index.']', $orderItem->amount, ['class' => 'form-control quantity', 'placeholder' => 'Cantidad']) }}
                            </div>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-danger remove-item">Eliminar</button>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>


        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Status') }}
                    {{ Form::select('status', ['Pendiente' => 'Pendiente', 'En Espera' => 'En Espera', 'Despachado' => 'Despachado'], $order->status, ['class' => 'form-control' . ($errors->has('Status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
                    {!! $errors->first('Status', '<div class="invalid-feedback">:message</div>') !!}
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Agregar campo de producto y cantidad
        document.getElementById('add-item').addEventListener('click', function() {
            var newItem = document.createElement('div');
            newItem.className = 'row';
            newItem.innerHTML = `
            <div class="row">
                    <div class="col">
                        <div class="form-group">
                            {{ Form::label('Producto') }}
                            {{ Form::select('finishedProduct_id[]', $FinishedProduct, null, ['class' => 'form-control product', 'placeholder' => 'Producto']) }}
                        </div>
                    </div>
                    <div class="col">
                    <div class="form-group">
                        {{ Form::label('Color') }}
                        {{ Form::select('color[]', $Color, $order->color, ['class' => 'form-control product', 'placeholder' => 'Color']) }}
                        {!! $errors->first('Color', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                    <div class="col">
                        <div style="position: relative; left: 16px;">
                            {{ Form::label('Cantidad') }}
                        </div>
                        <div class="form-group d-flex" style="position: relative; left: 16px;">

                            {{ Form::text('amount[]', $order->amount, ['class' => 'form-control quantity', 'placeholder' => 'Cantidad']) }}
                            {!! $errors->first('Cantidad', '<div class="invalid-feedback">:message</div>') !!}
                            <button type="button" class="btn btn-danger remove-item ms-3">Eliminar</button>
                        </div>
                    </div>
                </div>`;

            document.getElementById('items-container').appendChild(newItem);
        });

        // Eliminar campo de producto y cantidad
        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('remove-item')) {
                event.target.closest('.row').remove();
            }
        });
    });
</script>
