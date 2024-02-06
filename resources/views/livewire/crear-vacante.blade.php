<form class="md:w-1/2 space-y-5" wire:submit.prevent='crearVacantes'>
    <div>
        <x-input-label for="titulo" :value="__('Titulo vacante')" />
        <x-text-input 
        id="Titulo" 
        class="block mt-1 w-full" 
        type="text" 
        wire:model="titulo" 
        :value="old('titulo')"
        placeholder="Titulo Vacante"/>
        @error('titulo')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror  
    </div>

    <div>
        <x-input-label for="salario" :value="__('Salario Mensual')" />
            <select
            id="salario"
            wire:model="salario"
            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 
            dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md 
            shadow-sm w-full"
            >
            <option> -- Seleccione --</option>
            @foreach ($salarios as $salario)
                <option value="{{ $salario->id }}">{{$salario->salario}}</option>
            @endforeach
            </select> 
            @error('salario')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>

    <div>
        <x-input-label for="categoria" :value="__('Categoria')" />
            <select
            id="categoria"
            wire:model="categoria"
            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 
            dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md 
            shadow-sm w-full"
            >
            <option> -- Seleccione --</option>
            @foreach ($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->categoria}}
            @endforeach
            </select>
            @error('categoria')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror 
    </div>

    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input 
        id="empresa" 
        class="block mt-1 w-full" 
        type="text" 
        wire:model="empresa" 
        :value="old('empresa')"
        placeholder="Empresa: ej. Netflix, uber, Shopify"/>
       
        @error('empresa')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>

    <div>
        <x-input-label for="ultimo_dia" :value="__('Ultimo dia para postularse')" />
        <x-text-input 
        id="ultimo_dia" 
        class="block mt-1 w-full" 
        type="date" 
        wire:model="ultimo_dia" 
        :value="old('ultimo_dia')"
        placeholder="Titulo Vacante"/>
        @error('ultimo_dia')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
        
    </div>

    <div>
        <x-input-label for="descripcion" :value="__('Descripcion del puesto')" />
        <textarea 
        id="descripcion" 
        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 
        dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md 
        shadow-sm w-full h-72" 
        wire:model="descripcion" 
        placeholder="Descripcion general del puesto, experiencia">
        </textarea>
        
        @error('descripcion')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>

    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />
        <x-text-input id="imagen" class="block mt-1 w-full" type="file" wire:model="imagen" accept="image/*"/>
        <div class="my-5 w-80">
            @if ($imagen)
                Imagen:
                <img src="{{$imagen->temporaryUrl()}}">
            @endif
        </div>

        @error('imagen')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
        
    </div>

    <x-primary-button>
        crea vacante
    </x-primary-button>
    

</form>