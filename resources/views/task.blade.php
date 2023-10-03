@extends('template')
@section('title','Login')
@section('content')
<div>
  <a href="{{ route('createForm') }}" class="btn btn-primary">Add Task</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">task</th>
      <th scope="col">category</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    
    @foreach ($data as $item)
    <tr>
      <th scope="row">{{ $loop->index+1 }}</th>
      <td>{{ $item->task }}</td>
      <td>{{ $item->category->name }}</td>
      <td>
        <form action="{{ route('del',$item->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <a href="{{ route('edit',$item->id) }}" class="btn btn-info">edit</a>
          <button type="submit" class="btn btn-danger">delete</button>
        </form>
      </td>
    </tr>
        
    @endforeach
    
  </tbody>
</table>
@endsection