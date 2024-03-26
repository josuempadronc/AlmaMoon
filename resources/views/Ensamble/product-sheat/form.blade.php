<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Nombre') }}
                    {{ Form::text('name', $productSheat->name, ['class' => 'form-control' . ($errors->has('Nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                    {!! $errors->first('Nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Color') }}
                    {{ Form::select('color_id', $colors, $productSheat->color_id, ['class' => 'form-control' . ($errors->has('Color') ? ' is-invalid' : ''), 'placeholder' => 'Color']) }}
                    {!! $errors->first('Color', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Insumo') }}
                    {{ Form::select('input_id[]', $input, $productSheat->input_id, ['class' => 'form-control' . ($errors->has('Insumo') ? ' is-invalid' : ''), 'placeholder' => 'Insumo']) }}
                    {!! $errors->first('Insumo', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    {{ Form::label('Cantidad') }}
                    <div class="form-group d-flex">
                        {{ Form::text('amount[]', $productSheat->amount, ['class' => 'form-control' . ($errors->has('Cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
                        {!! $errors->first('Cantidad', '<div class="invalid-feedback">:message</div>') !!}
                        <button type="button" id="add-item" class="btn btn-primary ms-3">Agregar</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="items-container">
            @if (!empty($sheat->sheatItems))
                @foreach ($sheat->sheatItems as $index => $sheatItem)
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {{ Form::label('Insumo') }}
                                {{ Form::select('input_id[' . $index . ']', $input, $sheatItem->input_id, ['class' => 'form-control' . ($errors->has('Insumo') ? ' is-invalid' : ''), 'placeholder' => 'Insumo']) }}
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                {{ Form::label('Cantidad') }}
                                {{ Form::text('amount[' . $index . ']', $sheatItem->amount, ['class' => 'form-control quantity', 'placeholder' => 'Cantidad']) }}
                            </div>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-danger remove-item">Eliminar</button>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="box-footer mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Agregar campo de Insumo y cantidad
        document.getElementById('add-item').addEventListener('click', function() {
            var newItem = document.createElement('div');
            newItem.className = 'row';
            newItem.innerHTML = `
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {{ Form::label('Insumo') }}
                        {{ Form::select('input_id[]', $input, $productSheat->input_id, ['class' => 'form-control' . ($errors->has('Insumo') ? ' is-invalid' : ''), 'placeholder' => 'Insumo']) }}
                        {!! $errors->first('Insumo', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group ms-3">
                        {{ Form::label('Cantidad') }}
                        <div class="form-group d-flex">
                            {{ Form::text('amount[]', $productSheat->amount, ['class' => 'form-control' . ($errors->has('Cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
                            {!! $errors->first('Cantidad', '<div class="invalid-feedback">:message</div>') !!}
                            <button type="button" class="btn btn-danger remove-item ms-2">Eliminar</button>
                        </div>
                    </div>
                </div>
            </div>`;

            document.getElementById('items-container').appendChild(newItem);
        });

        // Eliminar campo de iInsumo y cantidad
        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('remove-item')) {
                event.target.closest('.row').remove();
            }
        });
    });
</script>
