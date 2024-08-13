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
    <title>Add Product</title>
</head>
<body>
<h2 class="mx-auto mt-5" style="width: 80%" >Add Product</h2>

<form class="row g-3 mx-auto mt-5 py-5 px-5 col-md-6" style="width:80%" method="POST" action="{{route('product_store')}}">
    @csrf

    <div class="col-md-6">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Enter the product name" name="name" required>
            <label for="floatingInput">Product Name</label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-floating">

            <select class="form-select" aria-label="Default select example" name="company" required>
                @foreach($coms as $c)
                    <option value="{{$c->name}}">{{$c->name}}</option>
                @endforeach
            </select>
            <label for="floatingInput">Select Company</label>
        </div>
    </div>

    <div class="col-md-6  mt-4" >
        <div class="form-floating mb-3">

            <input type="date" class="form-control" id="floatingInput"  name="exp_date" required min="{{now()}}">
            <label for="floatingInput">Expiration Date</label>

        </div>
    </div>
    <div class="col-md-12 mt-4">
        <div class="form-floating mb-3">

            <textarea  class="form-control" id="floatingInput" name="details" required ></textarea>
            <label for="floatingInput">Details</label>

        </div>

    </div>
    <div class="col-md-12 text-start mt-4 text-danger">
        <label > @if(session("error"))
                {{session("error")}}
            @endif</label>
    </div>
    <div class="col-12 mt-4 ">
        <button type="submit" class="btn btn-primary px-4 py-2">Add product</button>
    </div>
</form>

</body>
</html>
