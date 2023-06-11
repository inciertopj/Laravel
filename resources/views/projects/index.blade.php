<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Gobierno de El Salvador') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between">
                        <h1 class="text-2xl font-bold">{{ __('Proyectos') }}</h1>
                        <a href="{{ route('projects.create') }}" class="fcc-btn bg-indigo-500 hover:bg-indigo-700 text-black font-bold py-2 px-4 rounded">Crear proyecto</a>
                        <a href="{{ route('projects.PDF') }}" class="fcc-btn bg-green-500 hover:bg-indigo-700 text-black font-bold py-2 px-4 rounded">Crear PDF</a>
                    </div>
                    <div class="mt-4">
                        <table class="table-auto w-full">
                            <thead class="text-xs font-semibold uppercase text-black-400 bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2">{{ __('Nombre del Proyecto') }}</th>
                                    <th class="px-4 py-2">{{ __('Fuente de Fondos') }}</th>
                                    <th class="px-4 py-2">{{ __('Monto Planificado') }}</th>
                                    <th class="px-4 py-2">{{ __('Monto Patrocinado') }}</th>
                                    <th class="px-4 py-2">{{ __('Monto Fondos Propios') }}</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100">
                                @forelse ($projects as $project)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $project->NombreProyecto }}</td>
                                        <td class="border px-4 py-2">{{ $project->fuenteFondos }}</td>
                                        <td class="border px-4 py-2">{{ $project->MontoPlanificado }}</td>
                                        <td class="border px-4 py-2">{{ $project->MontoPatrocinado }}</td>
                                        <td class="border px-4 py-2">{{ $project->MontoFondosPropios }}</td>
                                        <td class="border px-4 py-2" style="width: 260px">
                                            
                                            <a href="{{ route('projects.edit', $project) }}" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">{{ __('Editar') }}</a>
                                            <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-black font-bold py-2 px-4 rounded">{{ __('Eliminar') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="bg-red-400 text-black text-center">
                                        <td colspan="3" class="border px-4 py-2">{{ __('No hay proyectos para mostrar') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            @if ($projects->hasPages())
                                <tfoot class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                    <tr>
                                        <td colspan="3" class="border px-4 py-2">
                                            {{ $projects->links() }}
                                        </td>
                                    </tr>
                                </tfoot>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>