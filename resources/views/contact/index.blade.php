@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <form method="GET" action="{{ route('contact.create') }}">
                            <button type="submit" class="btn btn-primary">新規登録</button>
                            </form>

                            <nav class="navbar navbar-light bg-light">
                            <a class="navbar-brand">検　索</a>
                            <form method="GET" action="{{ route('contact.index') }}" class="form-inline">
                                <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索する</button>
                            </form>
                            </nav>

                                <tr>
                                <th scope="col">No</th>
                                <th scope="col">氏　名</th>
                                <th scope="col">件　名</th>
                                <th scope="col">作成日</th>
                                <th scope="col">詳細</th>
                                </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $contact)
                            <tr>
                                <td>{{$contact->id}}</td>
                                <td>{{$contact->your_name}}</td>
                                <td>{{$contact->title}}</td>
                                <td>{{$contact->created_at}}</td>
                                <td><a href="{{ route('contact.show', ['id' => $contact->id]) }}">詳細を見る</a></td>
                            </tr>
                            @endforeach 
                        </tbody>
                    </table>
                    {{ $contacts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
