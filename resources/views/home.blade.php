@extends('layouts.app')
@section('title', 'Home')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><marquee>Post >=<</marquee></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    สวัสดีคุณ {{ Auth::user()->name }}<br/>
                    <form action="{{ route('post') }}" method="POST">
                        @csrf
                        Text : <input type="text" name="message" class="form-control" required><br>
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                    <form action="{{ route('home3') }}" method="GET">
                        @csrf
                        ค้นหา : <input type="text" name="find" class="form-control" required><br>
                        <button type="submit" class="btn btn-success">ค้นหาเลย</button>
                    </form>
                    {{ $postall->links() }}
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">ดูผู้ใช้
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                                <li><a href="{{ route('home') }}">ทั้งหมด</a></li>
                          @foreach ($userall As $key => $value)
                                <li><a href="{{ route('home2', [$value->id]) }}">{{ $value->name }}</a></li>
                          @endforeach
                        </ul>
                      </div>
                    <div>
                        @foreach ($postall As $key => $value)
                        <p>วันที่ {{ $value->created_at->format('d/m/Y h:i') }}</p>
                        <p>{{ $value->message }} - เขียนโดย {{ $value->name }}</p>
                   <!-- <a href="{{ route('del', [$value->postid]) }}">
                        <button type="submit" class="btn btn-danger">Del</button>
                    </a>-->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#post{{ $value->postid }}">
                        ลบ
                    </button>
                    <div class="modal fade" id="post{{ $value->postid }}" tabindex="-1" role="dialog" aria-labelledby="post2{{ $value->postid }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="post2{{ $value->postid }}">ยืนยันการลบโพสต์</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              คุณแน่ใจว่าต้องการลบโพสต์
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <a class="btn btn-danger" href="{{ route('del', [$value->postid]) }}">ลบ</a>
                            </div>
                          </div>
                        </div>
                      </div>






                        @if($value->user_id==Auth::id())
                            <a href="{{ route('edit', [$value->postid]) }}" class="btn btn-info">edit</a>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
