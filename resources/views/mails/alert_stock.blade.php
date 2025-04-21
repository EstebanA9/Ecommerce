<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Alerta de Stock</title>
</head>
<body>
    <div class="container">
        <div class="card rounded-3">
            <div class="card-header bg-primary text-white">
                <h2>Alerta de Stock</h2>
            </div>
            <div class="card-body">
                <p>El producto <strong>{{ $producto->nombre }}</strong> tiene solo <strong>{{ $producto->stock }}</strong> unidades disponibles.</p>
            </div>
        </div>
    </div>
</body>
</html>