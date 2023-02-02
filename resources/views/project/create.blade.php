@extends('layouts.sidebar')
@section('content')
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3>New Project</h3>
    </div>
    <div class="card-body">
      <form action="{{ url('/project_create') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">Project Name</label>
          <input type="text" class="form-control" name="project_name" id="exampleFormControlInput1" placeholder="Project Nama" required>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Client</label>
          <select class="form-control" id="exampleFormControlSelect1" name="client_id" required>
            <option>Pilih Client</option>
            @foreach ($client as $value)
            <option value="{{ $value->id }}">{{ $value->client_name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Project Start</label>
          <input type="date" class="form-control" name="project_start" id="exampleFormControlInput1" placeholder="Project Start" required>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Project End</label>
          <input type="date" class="form-control" name="project_end" id="exampleFormControlInput1" placeholder="Project End" required>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect2">Status</label>
          <select class="form-control" name="project_status" id="exampleFormControlSelect2" required>
            <option>Pilih Status</option>
            <option value="OPEN">OPEN</option>
            <option value="DOING">DOING</option>
            <option value="DONE">DONE</option>
          </select>
        </div>
    </div>
    <div class="card-footer py-3">
      <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Create</button>
      <a href="{{ url('/') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Back</a>
    </div>
    </form>
  </div>
</div>

    
@endsection

