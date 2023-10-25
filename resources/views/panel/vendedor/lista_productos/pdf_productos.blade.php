<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte PDF</title>
    <link rel="stylesheet" href="{{ public_path('vendor/adminlte/dist/css/adminlte.min.css') }}">
</head>
<body>
    <h3 class="text-center">Productos de {{ auth()->user()->name }}</h3>
    <table class="table table-striped w-100">
        <thead class="bg-primary text-center text-white">
            <tr>
                <th scope="col" class="text-uppercase">Id</th>
                <th scope="col" class="text-uppercase"></th>
                <th scope="col" class="text-uppercase"></th>
                <th scope="col" class="text-uppercase"></th>
                <th scope="col" class="text-uppercase"></th>
                <th scope="col" class="text-uppercase"></th>
            </tr>
        </thead>
    </table>
</body>
</html>