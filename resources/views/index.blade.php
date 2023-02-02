@extends('layouts.sidebar')
@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <form class="row g-3" action="" method="GET">
                <div class="col-auto">
                  <input type="text" id="name" name="project_name" value="{{ $project_name }}" class="form-control" placeholder="Project Name">
                </div>
                <div class="col-auto">
                   
                    <select class="form-control" name="client_id" aria-label=".form-select-sm example">   
                        <option value="">All Client</option>
                        @foreach ($client as $value)
                            <option value="{{ $value->id }}">{{ $value->client_name }}</option>
                        @endforeach
                      </select>
                </div>
                <div class="col-auto">
                    <select class="form-control" name="project_status" aria-label=".form-select-sm example">
                        <option value="">All Status</option>
                        <option value="OPEN" >OPEN</option>
                        <option value="DONE" >DONE</option>
                        <option value="DOING">DOING</option>
                      </select>
                </div>
                <div class="col-auto">
                  <button type="submit" class="btn btn-primary mb-3">Search</button>
                </div>
                <div class="col-auto">
                    <button type="button" id="clear" class="btn btn-primary mb-3">Clear</button>
                  </div>
            </form>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ url('/create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> New</a>
                <a href="" onclick="return confirm('Are you sure it will be deleted?');" id="deleteAllSelectedRecord" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"> Delete</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" id="chkCheckAll">
                                  </th>
                                <th>Action</th>
                                <th>Project Name</th>
                                <th>Client</th>
                                <th>Project Start</th>
                                <th>Project End</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $key=>$value)
                                <tr id="sid{{ $value->id }}">
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input checkBoxClass" name="ids" type="checkbox" value="{{ $value->id }}">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal{{ $value->id }}">Edit</a>
                                        <div class="modal fade" id="modal{{ $value->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Project</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{url('/update'.'/'.$value->id)}}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Project Name</label>
                                                                <input type="text" class="form-control" name="project_name" value="{{ $value->project_name }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Client Name</label>
                                                                <select class="form-control" name="client_id" aria-label=".form-select-sm example">
                                                                    <option value="{{ $value->client_id }}">{{ $value->client->client_name }}</option>
                                                                    @foreach ($client as $values)
                                                                        <option value="{{ $values->id }}">{{ $values->client_name }}</option>
                                                                    @endforeach
                                                                  </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Project Start</label>
                                                                <input type="date" class="form-control" name="project_start" value="{{ $value->project_start->format('d M Y') }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Project End</label>
                                                                <input type="date" class="form-control" name="project_end" value="{{ $value->project_end->format('d M Y') }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Client Name</label>
                                                                <select class="form-control" name="project_status" aria-label=".form-select-sm example">
                                                                    <option value="{{ $value->project_status }}">{{ $value->project_status }}</option>
                                                                    @if ($value->project_status == 'OPEN')
                                                                        <option value="DOING">DOING</option>
                                                                        <option value="DONE">DONE</option>
                                                                    @elseif($value->project_status == 'DOING')
                                                                        <option value="OPEN">OPEN</option>
                                                                        <option value="DONE">DONE</option>
                                                                    @else
                                                                        <option value="OPEN">OPEN</option>
                                                                        <option value="DOING">DOING</option>
                                                                    @endif    
                                                                </select>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $value->project_name }}</td>
                                    <td>{{ $value->client->client_name }}</td>
                                    <td>{{ $value->project_start->format('d M Y') }}</td>
                                    <td>{{ $value->project_end->format('d M Y') }}</td>
                                    <td>{{ $value->project_status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

                
@endsection

