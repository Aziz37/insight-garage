@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">USER Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (Auth::guard('web')->check())
                        <p> Welcome {{ Auth::user()->name }} </p>

                        <p> User Menu: </p> 
                        <a href="/users/folders">Folder Navigation</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
