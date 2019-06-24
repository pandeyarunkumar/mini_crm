@extends('layouts.app')

@section('content')
    <div class="add-emp pull-right">
        <a href="{{route('create-employee')}}" class="btn btn-info"><i class="fa fa-plus"></i> Add Employee</a>
    </div>
    <div class="container">
        <h4 class="heading"> Employee List </h4>
        <div class="row">
        <div class="col-md-1">
        </div>
            <div class="col-md-10">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">Sr. No.</th>
                        <th scope="col">Employee Id</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Company</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $key => $employee)
                        <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->first_name }}</td>
                        <td>{{ $employee->last_name }}</td>
                        <td>{{ $employee->phone }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>@if($employee->companyDetails) {{ $employee->companyDetails->name }}@endif</td>
                        <td>{{ $employee->role }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('edit-employee', $employee->id) }}" class="btn btn-warning">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ route('delete-employee', $employee->id) }}" class="btn btn-delete">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $employees->links() }}
            </div>
        </div>
    </div>
@endsection
