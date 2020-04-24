@extends('layouts.app')

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
                    <form>
                      <div class="form-group">
                        <label for="InputTaskTitle">講座名</label>
                        <input type="title" class="form-control" id="InputTaskTitle" placeholder="受講講座の名を入力してください。">
                      </div>
                      <div class="form-group">
                        <label for="TaskText">講座の内容</label>
                        <textarea class="form-control" id="TaskText"  placeholder="受講講座の内容を入力してください。" rows="3"></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary">講座を追加する</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
