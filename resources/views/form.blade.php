<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}" />
</head>

<div class="container">
    <h1>User Form</h1>
    <form action="{{route('form.register')}}" method="POST">
        @csrf
        <input type="text" placeholder="Enter Name" value="{{old('name')}}" name="name" required/>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="textarea" placeholder="Enter Description" value="{{old('description')}}" name="description" required/>
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit">Submit</button>
    </form>
</div>
</html>