<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrador</title>
</head>
<body>
    <td>
        <div class= "d-flex gap-2>

            <a href="{{ route('productos.edit', $producto->id) }}" class="btn  btn-warning btn-sm">Editar</a>
            
            
            @if($producto->trashed())
            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
            </form>

            @else
            <form action="{{ route('productos.restore', $producto->id) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-sm btn-danger">Restaurar</button>
            </form>
            @endif
        </div>
</body>
</html>