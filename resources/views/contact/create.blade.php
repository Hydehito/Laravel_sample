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

                    @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                    @endif

                    <form method="POST" action="{{route('contact.store')}}">
                    @csrf
                      <div class="form-group">
                        <label for="Name">お名前</label>
                        <input type="text" class="form-control" name="your_name" id="Name" placeholder="お名前">
                      </div>
                      <div class="form-group">
                        <label for="inputTitle">件　名</label>
                        <input type="text" class="form-control" name="title" id="inputTitle" placeholder="件名をご記入ください。">
                      </div>
                      <div class="form-group">
                        <label for="Email">Email address</label>
                        <input type="email" class="form-control" name="email" id="Email" placeholder="name@example.com">
                      </div>
                      <div class="form-group">
                        <label for="inputage">年齢を選んでください。</label>
                        <select class="form-control" name="age" id="inputage">
                        <option value="">選択してください。</option>
                          <option value="1">１８歳以下</option>
                          <option value="2">１９歳～２９歳</option>
                          <option value="3">３０歳～３９歳</option>
                          <option value="4">４０歳～４９歳</option>
                          <option value="5">５０歳～５９歳</option>
                          <option value="6">６０歳以上</option>
                        </select>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="0">
                        <label class="form-check-label" for="inlineRadio1">男性</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="1">
                        <label class="form-check-label" for="inlineRadio2">女性</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="2">
                        <label class="form-check-label" for="inlineRadio3">その他</label>
                      </div>
                      <div class="form-group">
                        <label for="inputcontact">内容を入力してください。</label>
                        <textarea class="form-control" name="contact" id="inputcontact" rows="3"></textarea>
                      </div>
                      <input class="btn btn-primary btn-lg btn-block" type="submit" value="登録する。">
                    </form>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
