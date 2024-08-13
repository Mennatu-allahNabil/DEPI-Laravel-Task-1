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
    <title>Update Product</title>
</head>
<body>
<h2 class="mx-auto mt-5" style="width: 80%" >Update Product</h2>

<form class="row g-3 mx-auto mt-5 py-5 px-5 col-md-6" style="width:80%" method="POST" action="{{route('product_update')}}" >

    @csrf
    <input type="hidden" name="id"  value="{{$data["id"]}}">
    <div class="col-md-6">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Enter the product name" name="name" required value="{{$data["name"]}}">
            <label for="floatingInput">Product Name</label>
        </div>
    </div>


    <div class="col-md-6  mt-4" >
        <div class="form-floating mb-3">

            <input type="date" class="form-control" id="floatingInput"  name="exp_date" required  value="{{$data["exp_date"]}}">
            <label for="floatingInput">Expiration Date</label>

        </div>
    </div>
    <div class="col-md-12 mt-4">
        <div class="form-floating mb-3">

            <textarea  class="form-control" id="floatingInput" name="details" required >{{$data["details"]}} </textarea>
            <label for="floatingInput">Details</label>

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
        <button type="submit" class="btn btn-primary px-4 py-2">Update product</button>
    </div>
</form>

</body>
</html>
