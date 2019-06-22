@extends('layouts.app')

@section('content')
    <div class="container">
        <h4 class="heading"> Company List </h4>
        <a href="{{ route('create-company') }}" class="btn btn-info add-emp"><i class="fa fa-plus"></i> Add Company</a>
        <div class="row">
        <div class="col-md-1">
        </div>
            <div class="col-md-10">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">Sr. No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Logo</th>
                        <th scope="col">Website</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($companies as $key => $company)
                        <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>@if($company->logo)<img src = "{{ asset($company->logo) }}" style="height:50px; width:50px">@endif</td>
                        <td>{{ $company->website }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{route('edit-company', $company->id)}}" class="btn btn-warning">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{route('delete-company', $company->id)}}" class="btn btn-delete">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $companies->links() }}
            </div>
        </div>
    </div>
@endsection
