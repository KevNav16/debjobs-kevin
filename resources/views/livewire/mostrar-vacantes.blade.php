<div class="bg-gray-600 overflow-hidden shadow-sm sm:rounded-lg">
  
    @forelse ($vacantes as $vacante)
    
    <div class="p-6 bg-white dark:bg-gray-800 shadow-sm md:flex md:justify-between md:items-center">
        <div class="text-gray-900 dark:text-gray-100 space-y-3">
            <a href="{{ route('vacantes.show', $vacante->id ) }}" class="text-xl font-bold">
            {{ $vacante->titulo }}
            </a>
            <p class="text-sm text-gray-600">{{$vacante->empresa}}</p>
            <p class="text-sm text-gray-500"> Ultimo dia: {{ $vacante->ultimo_dia}}</p>

        </div>
        <div class="flex  flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">
            <a
            href="{{ route('candidatos.index', $vacante)}}"
            class="bg-slate-700 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
            {{$vacante->candidatos->count() }}
            Candidatos
            </a>

            <a
            href="{{ route('vacantes.edit',$vacante->id) }}"
            class="bg-blue-700 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
            editar
            </a>

            <button
            wire:click="$dispatch('alertaEliminar',{id: {{$vacante->id}}})"
            class="bg-red-700 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
            eliminar
            </button>
        </div> 
    </div>

    @empty
       <p class="p-3 text-center text-sm text-gray-600">No hay vacantes que mostrar</p>

    @endforelse
    <div class="text-gray-300 mt-10 dark:bg-gray-300">
    {{ $vacantes->links() }}
</div>
</div>

@push('scripts')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
<script>
  Livewire.on('alertaEliminar',vacanteId=>{
/*     alert(vacante_id.id); */
    Swal.fire({
            title: '¿Eliminar Vacante?',
            text: "Una vacante eliminada o se puede recuperar",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar',
            cancelButtonText:'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('eliminarVacante',{'vacante':vacanteId});
                Swal.fire(
                    'Eliminada',
                    'La vacante fue eliminada.',
                    'success'
                )
            }
        }) 
    
  })
    </script>

@endpush

