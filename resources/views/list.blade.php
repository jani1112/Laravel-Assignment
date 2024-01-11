<!DOCTYPE html>
<html lang="en">
<head>
    <title>List Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    @if(session()->has('message'))
        <div class="alert alert-danger">
            <p>{{ session('message') }}</p>
        </div>
    @endif
    <h3>List</h3>
    @if(!$allData->isEmpty())
        @foreach($allData as $data)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Name: {{ $data->name }}</h5>
                    <p class="card-text">Description: {{ $data->description }}</p>
                    <a href="{{ route('form.edit', ['id' => $data->id]) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('form.delete', ['id' => $data->id]) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    @else
        <div class="alert alert-danger">
            <p>No Data Found</p>
            <a href="/" class="alert-link">Go Back to form</a>
        </div>
    @endif
</div>