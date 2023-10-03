@extends('template')
@section('title','Login')
@section('content')

<form method="POST" action="{{ route('taskCreate') }}">
  @csrf
  <div class="mb-3 mt-3">
    <label for="task" class="form-label">task </label>
    <input type="task" class="form-control" id="task" aria-describedby="task" name="task">
  </div>
  <select class="form-select" aria-label="Default select example" name="category_id">
    <option value="" disabled selected >Kategori</option>
    @foreach ($data as $item)
    <option value="{{ $item->id }}">{{ $item->name }}</option>        
    @endforeach
  </select>
  <button type="submit" class="btn btn-primary mt-2">Submit</button>
</form>
@endsection