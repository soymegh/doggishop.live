<div>
    <!-- Departamentos -->
    <div class="col-md-6">
        <label for="departments">Departamento</label>
        <select class="form-control" id="departments" name="departments" wire:model.live='department_id'>
            <option value="" selected>Seleccionar un departamento</option>
            @foreach ($departments as $department)
                <option value="{{ $department->id }}">{{ $department->name }}</option>
            @endforeach

        </select>
    </div>

    <!-- Municipio -->
    <div class="col-md-6">
        <label for="municipalities">Municipio</label>
        <select class="form-control" id="municipalities" name="municipalities" wire:model='municipalityId'>
            @if ($municipalities->count() == 0)
                <option value="" selected>Seleccione un municipio</option>
            @endif
            @foreach ($municipalities as $municipality)
                <option value="{{ $municipality->id }}">{{ $municipality->name }}</option>
            @endforeach

        </select>

    </div>
</div>
