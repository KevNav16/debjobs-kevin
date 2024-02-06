<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-2xl text-gray-300 my-3">
            {{ $vacante->titulo }}
        </h3>
        <div class="md:grid md:grid-cols-2 bg-gray-700 p-4 my-10">
            <p class="font-bold text-sm text-gray-300 my-3">empresa:
                <span class="normla-case font-normal"> {{$vacante->empresa}}</span>
            </p>

            <p class="font-bold text-sm text-gray-300 my-3">Ultimo dia para postularse:
                <span class="normla-case font-normal"> {{$vacante->ultimo_dia}}</span>
            </p>

            <p class="font-bold text-sm text-gray-300 my-3">categoria:
                <span class="normla-case font-normal"> {{$vacante->categoria->categoria}}</span>
            </p>

            <p class="font-bold text-sm text-gray-300 my-3">Salario:
                <span class="normla-case font-normal"> {{$vacante->salario->salario}}</span>
            </p>
        </div>
    </div>

    <div class="md:grid md:grid-cols-6 gap-4">

        <div class="md:col-span-2">
            <img src="{{ asset('storage/vacantes/' . $vacante->imagen ) }}"
                alt="{{'Imagen vacante ' . $vacante->titulo}}">
        </div>

        <div class="md:col-span-4">
            <h2 class="text-2xl font-bold mb-5">descripcion de puesto</h2>
            <p>{{$vacante->descripcion}} </p>
        </div>

    </div>

    @guest
    <div class="mt-5 bg-gray-500 border border-dashed p-5 text-center">
        <p>
            ¿deseas aplicar para esta vacante? <a class="font-bold text-indigo-600" href="{{ route('register') }}">
                obten una cuenta y aplica para esta otras vacantes</a>
        </p>
    </div>
    @endguest

    @cannot('create', App\Models\Vacante::class)
    <livewire:postular-vacante :vacante="$vacante" />
    @endcannot


</div>