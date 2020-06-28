@extends('layouts.app')
@section('title', 'Home')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!<br/>
                    <form action="{{ route('post') }}" method="POST">
                        @csrf
                        Text : <input type="text" name="message">
                        <button type="submit">Save</button>
                    </form>
                    <div>
                        @foreach ($postall As $key => $value)
                        <p>{{ $value->message }}</p>
                    <a href="{{ route('del', [$value->postid]) }}">
                        <button type="submit">Del</button>
                    </a>
                        @if($value->user_id==Auth::id())
                            <a href="{{ route('edit', [$value->postid]) }}"><button type="submit">edit</button></a>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
