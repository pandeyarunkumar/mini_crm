@extends('layouts.app')

@section('content')
    <div class="add-emp pull-right">
        <a href="{{route('create-project')}}" class="btn btn-info add-emp"><i class="fa fa-plus"></i> Add Project</a>
    </div>
    <div class="container">
        <h4 class="heading">Project List </h4>
        <div class="row">
        <div class="col-md-1">
        </div>
            <div class="col-md-10">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">Sr. No.</th>
                        <th scope="col">Project Id</th>
                        <th scope="col">Project Name</th>
                        <th scope="col">Asign To</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $key => $project)
                        <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->name }}</td>
                        <td>@if($project->assignTo){{ $project->assignTo->first_name }}@endif</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{route('edit-project', $project->id)}}" class="btn btn-warning">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{route('delete-project', $project->id)}}" class="btn btn-delete">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $projects->links() }}
            </div>
        </div>
    </div>
@endsection
