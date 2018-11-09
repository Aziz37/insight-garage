@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ADMIN Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                     @if (Auth::guard('admin')->check())
                        <p> Welcome {{ Auth::user()->name }} </p>

                        <p> Admin Menu: </p>
    
                        <ul>
                            <li>
                                <a href="/admin/folders">Database Management</a>
                            </li>
                            <li>
                                <a href="/admin/manage">Access Management</a>
                            </li>
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
