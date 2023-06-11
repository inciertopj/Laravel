<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyectos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    

</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

<p style="text-align:center"><h1><center>Gobierno de El Salvador</center></h1></p> </br>
<p style="text-align:center"><h2><center>Alcald&iacute;a de Tacuba</center></h2></p> </br>

Creado por: &Aacute;ngel Adiel Henr&iacute;quez Argumedo
<table class="table table-white table-striped">

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
</body>
</html>