<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <title>Products</title>
</head>
<body>
<div class="container">
    <h2 class="mx-auto mt-5" style="width: 99%">Products List</h2>
    <table class="table table-hover mt-5">
        <thead>
        <tr>
            <th>Company Name</th>
            <th>Country</th>
            <th>City</th>
            <th>Product Name</th>
            <th>Expiration Date</th>
            <th>Details</th>
            <th colspan="2">Modify</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allProds as $prod)
                   @for($i=$prod->productsOwner->count();$i>0;$i-=1)
                       <tr>
                       <td>{{$prod->name}}</td>
                       <td>{{$prod->country}}</td>
                       <td>{{$prod->city}}</td>
                       <td>{{$prod->productsOwner[$i-1]->name}}</td>
                       <td>{{$prod->productsOwner[$i-1]->exp_date}}</td>
                       <td>{{$prod->productsOwner[$i-1]->details}}</td>
                       <td><form method="GET" action="{{route("product_get")}}">@csrf<input type="hidden" name="id" value="{{$prod->productsOwner[$i-1]->id}}"><button type="submit" class="btn btn-primary px-4 py-2">Update</button></form></td>
                       <td><form method="POST" action="{{route("product_delete")}}">@csrf<input type="hidden" name="id" value="{{$prod->productsOwner[$i-1]->id}}"><button type="submit" class="btn btn-primary px-4 py-2">Delete</button></form></td>
               </tr>
                   @endfor
        @endforeach
        </tbody>
    </table>

</div>
</body>
</html>
