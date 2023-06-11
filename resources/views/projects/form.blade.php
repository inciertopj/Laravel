<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-whiteleading-tight">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ $action }}" method="POST">
                        @csrf
                        @isset ($method)
                            @method($method)
                        @endif
                        <div class="mb-4">
                            <label for="NombreProyecto" class="block text-black-700 text-sm font-bold mb-2">{{ __('Nombre del Proyecto') }}</label>
                            <input type="text" name="NombreProyecto" id="NombreProyecto" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('NombreProyecto', $project->NombreProyecto) }}">
                            @error('NombreProyecto')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="fuenteFondos" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Fuente de Fondos') }}</label>
                            <textarea name="fuenteFondos" id="fuenteFondos" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('fuenteFondos', $project->fuenteFondos) }}</textarea>
                            @error('fuenteFondos')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="MontoPlanificado" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Monto Planificado') }}</label>
                            <textarea name="MontoPlanificado" id="MontoPlanificado" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('MontoPlanificado', $project->MontoPlanificado) }}</textarea>
                            @error('MontoPlanificado')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="MontoPatrocinado" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Monto Patrocinado') }}</label>
                            <textarea name="MontoPatrocinado" id="MontoPatrocinado" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('MontoPatrocinado', $project->MontoPatrocinado) }}</textarea>
                            @error('MontoPatrocinado')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="MontoFondosPropios" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Monto Fondos Propios') }}</label>
                            <textarea name="MontoFondosPropios" id="MontoFondosPropios" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('MontoFondosPropios', $project->MontoFondosPropios) }}</textarea>
                            @error('MontoFondosPropios')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex justify-end">
                            <a href="{{ route('projects.index') }}" class="bg-red-500 hover:bg-gray-700 text-black font-bold py-2 px-4 rounded">{{ __('Cancelar') }}</a>
                            <button type="submit" class="bg-cyan-500 hover:bg-cyan-700 text-black font-bold py-2 px-4 rounded ml-2">{{ $buttonText }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>