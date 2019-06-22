@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Project') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update-project', $project->id) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $project->name }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="assign_to" class="col-md-4 col-form-label text-md-right">{{ __('Assign To') }}</label>

                            <div class="col-md-6">
                                <select id="assign_to" class="form-control @error('assign_to') is-invalid @enderror" name="assign_to" autocomplete="assign_to" autofocus>
                                    @if($project->assignTo)    
                                        <option value="{{ $project->assignTo->id }}">{{ $project->assignTo->first_name }}</option> 
                                    @endif

                                    @foreach($users as $key=>$user)
                                        @if($key)
                                            <option value="{{$user->id}}">{{ $user->first_name }}</option>   
                                        @endif
                                    @endforeach
                                </select>    

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
