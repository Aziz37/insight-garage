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
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="/users/insight-vault">
                                        <div class="img-wrap">
                                            <img src="{{ asset('img/insight-vault.jpg') }}" alt="Insight Vault">
                                            <p class="img-description text-center">Insight Vault</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="/users/innovation-toolkit">
                                        <div class="img-wrap">
                                            <img src="{{ asset('img/innovation-toolkit.jpg') }}" alt="Innovation Toolkit">
                                            <p class="img-description text-center" style="top: auto;
                                            bottom: -16px;">Innovation Toolkit</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection