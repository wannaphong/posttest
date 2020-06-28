@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Post</div>

                <div class="card-body">
                    <form action="{{ route('update', [$post->postid]) }}" method="GET">
                        <input type="hidden" name="postid" value="{{ $post->postid }}">
                        Message : <input type="text" name="message" value="{{ $post->message }}" ><br>
                        <button type="submit" class="btn">Update</button>
                        <button type="reset" class="btn">Reset</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
