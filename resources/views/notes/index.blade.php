@extends('layouts.app')
{{-- En la línea anterior con extends(Archivo_Hacia_donde_se_exporta) lo que hacemos es exportar este archivo a app.blade.php --}}

@section('title', 'Listado de Notas')
{{-- En la siguiente línea le decimos a Blade que exporte el contenido que hay entre @section y @endsection --}}
@section('content')

    <main class="content">
        <div class="cards">

            {{-- -----Datos de notas --}}
            @forelse ($notes as $note)
                <div class="card">
                    <div class="card-body">

                        <h4>{{ $note->title }}</h4>

                        <p>{{ $note->content }}</p>

                    </div>


                    {{-- Botón Editar --}}
                    <footer class="card-footer">
                        <a href="{{ route('notes.edit', ['id' => $note->id]) }}" class="action-link action-edit">
                            <i class="icon icon-pen"></i>
                        </a>
                        {{-- Botón Borrar --}}
                        <a class="action-link action-delete">
                            <i class="icon icon-trash"></i>
                        </a>
                    </footer>
                </div>
            @empty
                <div class="card">
                    <div class="card-body">
                        <p>No hay notas disponibles.</p>
                    </div>
                </div>
            @endforelse

            {{-- Tabla de Notas --}}


            {{-- <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nota</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notes as $index => $note)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $note->title }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table> --}}
    </main>

@endsection
