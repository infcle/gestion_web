@csrf
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="fecha">fecha entrada</label>
            <input
                class="form-control
                @error('fecha') is-invalid @enderror"
                placeholder="Fecha entrada"
                id="fecha"
                name="fecha"
                type="date"
                value="{{ isset($entrada_salida) ? $entrada_salida->fecha : old('fecha') }}">
            @error('fecha')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="total">Total</label>
            <input
                class="form-control
                @error('total') is-invalid @enderror"
                placeholder="total"
                id="total"
                name="total"
                type="number"
                value="{{ isset($entrada_salida) ? $entrada_salida->total : old('total') }}"
                readonly=true>
            @error('total')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex align-items-center">
                    <p class="mb-0">Detalle entrada</p>
                    <button class="btn btn-primary btn-sm ms-auto" id='addItem'>Añadir item</button>
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center justify-content-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Item
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    costo unitario
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Cantidad
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                                    Sub-total
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="table_item-body">
                            @isset($entrada_salida)
                                @foreach ($entrada_salida->detalles as $detalle)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2">
                                                <select class="form-control" name="item_id[]">
                                                    <option>seleccione una opcion</option>
                                                    @foreach ($items as $item)
                                                        <option value="{{ $item->id }}" {{ ($detalle->item_id == $item->id)? 'selected':'' }}>{{ $item->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <input class="form-control precio_unitario" type="number" name="precio_unitario[]" id="" onkeyup="calcular(this)" value="{{ $detalle->precio_unitario }}">
                                        </td>
                                        <td>
                                            <input class="form-control cantidad" type="number" name="cantidad[]" id="" onkeyup="calcular(this)" value="{{ $detalle->cantidad }}">
                                        </td>
                                        <td class="align-middle text-center">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <input class="form-control sub_total" type="number" name="sub_total[]" id=""  readonly=true value="{{ ($detalle->precio_unitario * $detalle->cantidad) }}">
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <button class="btn btn-link text-secondary mb-0" onclick="eliminar(this)">
                                                <i class="far fa-trash-alt me-2"></i>
                                                eliminar
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endisset
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
