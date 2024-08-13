<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <title>Companies</title>
</head>
<body>
<div class="container">
    <h2 class="mx-auto mt-5" style="width: 99%">Companies List</h2>
    <table class="table table-hover mt-5">
        <thead>
        <tr>
            <th>Company Name</th>
            <th>Size</th>
            <th>Country</th>
            <th>City</th>
            <th colspan="2">Modify</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allComps as $comp)
            <tr>
                    <td>{{$comp->name}}</td>
                    <td>{{$comp->size}}</td>
                    <td>{{$comp->country}}</td>
                    <td>{{$comp->city}}</td>
                    <td><form method="GET" action="{{route("company_get")}}">@csrf<input type="hidden" name="id" value="{{$comp->id}}"><button type="submit" class="btn btn-primary px-4 py-2">Update</button></form></td>
                <td><form method="POST" action="{{route("company_delete")}}">@csrf<input type="hidden" name="id" value="{{$comp->id}}"><button type="submit" class="btn btn-primary px-4 py-2">Delete</button></form></td>

            </tr>
        @endforeach
        </tbody>
    </table>

{{--    {{$allComps}}--}}
</div>
</body>
</html>
