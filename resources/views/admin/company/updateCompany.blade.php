<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <style>
        form{
            background: #ecf2fb;
            border-radius:5px ;
        }
    </style>
    <title>Update Company</title>
</head>
<body>
<h2 class="mx-auto mt-5" style="width: 80%" >Update Company</h2>

<form class="row g-3 mx-auto mt-5 py-5 px-5 col-md-6" style="width:80%" method="POST" action="{{route("company_update")}}">
    @csrf
    <input type="hidden" name="id"  value="{{$data["id"]}}">

    <div class="col-md-6">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput"  name="name" required value="{{$data["name"]}}">
            <label for="floatingInput">Company Name</label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-floating">

            <select class="form-select" aria-label="Default select example" name="size" required>

                @php
                    $array=["small","medium","large","international"];
                @endphp
                @foreach($array as $item)
                    <option value="{{ $item }}" @if(strtolower($data['size'])==strtolower($item)) selected @endif>
                        {{ ucfirst($item) }}
                    </option>
                @endforeach
            </select>

        </div>
    </div>

    <div class="col-md-6  mt-4" >
        <div class="form-floating mb-3">

            <input type="text" class="form-control" id="floatingInput" value="{{$data["country"]}}" name="country" required>
            <label for="floatingInput">Country</label>

        </div>
    </div>
    <div class="col-md-6 mt-4">
        <div class="form-floating mb-3">

            <input type="text" class="form-control" id="floatingInput" value="{{$data["city"]}}" name="city" required>
            <label for="floatingInput">City</label>

        </div>
    </div>
    <div class="col-md-12 text-start mt-4">
        <label class="text-danger" > @if(session("Error"))
                {{session("Error")}}
            @endif</label>
        <label class="text-success " > @if(session("Success"))
                {{session("Success")}}
            @endif</label>
    </div>
    <div class="col-12 mt-4 ">
        <button type="submit" class="btn btn-primary px-4 py-2">Save</button>
    </div>
</form>
{{--{{$data["size"]}}--}}
</body>
</html>
