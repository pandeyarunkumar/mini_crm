@extends('layouts.app')
@section('styles')
<style>
.card-body {
    overflow-y: scroll;
    height: 350px;
    }
</style>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <article class="card-group-item">
                    <header class="card-header">
                        <h6 class="title">List of all active employees</h6>
                    </header>
                    <div class="filter-content">
                        <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @foreach($activeUsers as $user)
                                <li class="list-group-item">{{ $user->first_name }} {{ $user->last_name}}</li>
                            @endforeach
                        </ul>
                        </div> <!-- card-body.// -->
                    </div>
                </article> <!-- card-group-item.// -->
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <article class="card-group-item">
                    <header class="card-header">
                        <h6 class="title">Group chat with all active employees</h6>
                    </header>
                    <div class="filter-content">
                        <div class="card-body" id="card-body">
                            <chat-messages :messages="messages"></chat-messages>
                        </div> <!-- card-body.// -->
                        <div class="card-footer">
                            <chat-form
                            v-on:messagesent="addMessage"
                            :user="{{ Auth::user() }}"
                            ></chat-form>
                       </div> <!-- card-body.// -->
                    </div>
                </article> <!-- card-group-item.// -->
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    window.scrollTo(0,document.querySelector(".card-body").scrollHeight);
</script>

@endsection