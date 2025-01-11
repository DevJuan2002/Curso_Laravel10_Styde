@extends('layouts.app');
{{-- En la linea anterior con extends(Archivo_Hacia_donde_se_exporta) lo que hacemos es exportar este archivo a app.blade.php--}}
@section('title','Creacion de Notas')
{{-- Y en la siguiente linea le decimos a blade exportame el contenido que hay entre @section y @endsection  --}}
@section('content')
       
    <main class="content">
            <div class="cards">
                <div class="card card-center">
                    <div class="card-body">
                        <h1>Nueva nota</h1>

                        <form action="">
                            <label for="title" class="field-label">Título: </label>
                            <input type="text" name="title" id="title" class="field-input">

                            <label for="content" class="field-label">Contenido:</label>
                            <textarea name="content" id="content" rows="10" class="field-textarea"></textarea>

                            <button type="submit" class="btn btn-primary">Crear nota</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>

@endsection

        