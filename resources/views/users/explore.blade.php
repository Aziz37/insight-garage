@extends('layouts.user.master')

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">Start Exploring</h5>
                    </div>
                    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (Auth::guard('web')->check())
                            <p class="h5">Do you have an innovative idea to solve customer problems? Start an exploration sprint in Business Innovation framework with these tools and insights:</p>
                            <div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection