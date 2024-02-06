<form class="md:w-1/2 space-y-5" wire:submit='editarVacante'>
    <div>
        <x-input-label for="titulo" :value="__('Titulo Vacante')" />
        <x-text-input id="titulo" class="block mt-1 w-full" type="text" wire:model="titulo" :value="old('titulo')"
           placeholder="Titulo Vacante" />
           @error('titulo')
           <livewire:mostrar-alerta :message="$message"/>
       @enderror
    </div>
    <div>
        <x-input-label for="salario" :value="__('Salario Mensual')" />
        <select wire:model="salario" id="salario" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">
            <option value="">-- Selecciona --</option>
            @foreach ($salarios as $salario)
                <option value="{{$salario->id}}">{{$salario->salario}}</option>
            @endforeach
        </select>
        @error('salario')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>
    <div>
        <x-input-label for="categoria" :value="__('Categoria')" />
        <select wire:model="categoria" id="categoria" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">
            <option value="">-- Selecciona --</option>
            @foreach ($categorias as $categoria)
            <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
        @endforeach
        </select>
        @error('categoria')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>
    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input id="empresa" class="block mt-1 w-full" type="text" wire:model="empresa" :value="old('empresa')"
            autocomplete="empresa" placeholder="Empresa: ejm. Netflix, Uber" />
            @error('empresa')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>
    <div>
        <x-input-label for="ultimo_dia" :value="__('Empresa')" />
        <x-text-input id="ultimo_dia" class="block mt-1 w-full" type="date" wire:model="ultimo_dia" :value="old('ultimo_dia')"
            autocomplete="ultimo_dia" />
            @error('ultimo_dia')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>
    <div>
        <x-input-label for="descripcion" :value="__('Descripcion Puesto')" />
        <textarea wire:model="descripcion" id="descripcion" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full h-72"></textarea>
        @error('descripcion')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>
    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />
        <x-text-input id="imagen" class="block mt-1 w-full" type="file" wire:model="imagen_nueva" accept="image/*"/>
       <div class="my-5 w-80">
            @if ($imagen_nueva)
                Imagen Nueva:
                <img src="{{$imagen_nueva->temporaryUrl()}}">
            @endif
        </div>
        <div class="my-5 w-80">
            <x-input-label :value="__('Imagen Actual')" />
            <img src="{{asset('storage/vacantes/'.$imagen)}}" alt="{{'Imagen Vacante '.$titulo}}">
        </div>

        @error('imagen_nueva')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
        
    </div>

    <x-primary-button>
        editar vacante
    </x-primary-button>
    

</form>
