<!DOCTYPE html>
<head>
    <title>Edit Form</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}" />
</head>
    <div class="container">
        <h1>Edit Form</h1>
        <form action="{{ route('form.update', ['id' => $userdata->id])}}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" placeholder="Enter Name" value="{{old('name') ? old('name') : $userdata->name}}" name="name" required/>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="textarea" placeholder="Enter Description" value="{{old('description') ? old('description') : $userdata->description}}" name="description"/>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit">Update</button>
        </form>
    </div>
</html>