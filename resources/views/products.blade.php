<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Product List</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .page-padding {
            padding: 100px 50px;
        }

    </style>
</head>
<body>
<div class="page-padding">
    <div class="container">
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th scope="col">Vendor</th>
                <th scope="col">Product Type</th>
                <th scope="col">Option</th>
                <th scope="col">SKU</th>
                <th scope="col">Price</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                @foreach($product['variants'] as $variant)
                    <tr>
                        <td>{{$product['id']}}</td>
                        <td>{{$product['title']}}</td>
                        <td>{{$product['vendor']}}</td>
                        <td>{{$product['product_type']}}</td>
                        <td>{{$variant['option1']}}</td>
                        <td>{{$variant['sku']}}</td>
                        <td>{{$variant['price']}}</td>
                    </tr>
                @endforeach
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
