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
    <title>Add Company</title>
</head>
<body>
<h2 class="mx-auto mt-5" style="width: 80%" >Add Company</h2>

<form class="row g-3 mx-auto mt-5 py-5 px-5 col-md-6" style="width:80%" method="POST" action="{{route('company_store')}}">
    @csrf

    <div class="col-md-6">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Enter the company name" name="name" required>
            <label for="floatingInput">Company Name</label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-floating">

            <select class="form-select" aria-label="Default select example" name="size" required>
{{--                <option selected>Select company size</option>--}}
                <option value="small">Small</option>
                <option value="medium">Medium</option>
                <option value="large">Large</option>
                <option value="international">International</option>
            </select>
            <label for="floatingInput">Select company size</label>

        </div>
    </div>

    <div class="col-md-6  mt-4" >
        <div class="form-floating mb-3">

            <input type="text" class="form-control" id="floatingInput" placeholder="Enter country name" name="country" required>
            <label for="floatingInput">Country</label>

        </div>
    </div>
    <div class="col-md-6 mt-4">
        <div class="form-floating mb-3">

            <input type="text" class="form-control" id="floatingInput" placeholder="Enter city name" name="city" required>
            <label for="floatingInput">City</label>

        </div>

    </div>
    <div class="col-md-12 text-start mt-4 text-danger">
        <label > @if(session("error"))
                {{session("error")}}
            @endif</label>
    </div>
    <div class="col-12 mt-4 ">
        <button type="submit" class="btn btn-primary px-4 py-2">Add company</button>
    </div>
</form>

</body>
</html>
