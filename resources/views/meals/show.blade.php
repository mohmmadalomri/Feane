<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <title>Document</title>
</head>
<body>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">categories</th>
                <th scope="col">description</th>
                <th scope="col">image</th>
                <th scope="col">price</th>

            </tr>
        </thead>
        <tbody>

                <tr>
                    <th scope="row">{{ $meal->id }}</th>
                    <td>{{ $meal->name }}</td>
                    <td>{{ $meal->categories }}</td>
                    <td>{{ $meal->description }}</td>
                    <td>{{ $meal->image }}</td>
                    <td>{{ $meal->price }}</td>
                </tr>
           
        </tbody>

    </table>



</body>

</html>
