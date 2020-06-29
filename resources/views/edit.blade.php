@extends('layouts.app')
@section('title', 'แก้ไขข้อมูล')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Post</div>

                <div class="card-body">
                    <form action="{{ route('update', [$post->postid]) }}" method="GET">
                        Message : <input type="text" name="message" value="{{ $post->message }}" required><br>
                        <button type="submit" class="btn btn-success">Update</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
