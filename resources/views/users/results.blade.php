@extends('layouts.user.master')

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="title">Search Results for <em>"{{ $query }}"</em></h3>
                    </div>

                    <div class="card-body">
                        @if(count($folderResults)>0 || count($fileResults)>0 || count($userResults)>0)
                            @foreach($folderResults->chunk(2) as $chunk)
                                <div class="row">
                                    @foreach($chunk as $folderResult)
                                        <div class="col-md-6">
                                            <h5>
                                                <div class="card content-card">
                                                    <div class="card-body"> 
                                                       <i class="fas fa-folder"></i>&nbsp&nbsp<a href="/admin/folders/{{ $folderResult->id }}">{{ $folderResult->name }}</a>
                                                    </div>
                                                </div>
                                           </h5>
                                         </div>
                                    @endforeach
                                </div>
                            @endforeach

                            @foreach($fileResults->chunk(2) as $chunks)
                                <div class="row">
                                    @foreach($chunks as $fileResult)
                                        <div class="col-md-6">
                                            <h5>
                                                <div class="card content-card">
                                                    <div class="card-body">
                                                        <i class="fas fa-download"></i>&nbsp&nbsp<a href="/users/file/download/{{ $fileResult->id }}">{{ $fileResult->filename }}</a>
                                                    </div>
                                                </div>
                                            </h5>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach

                            @foreach($userResults->chunk(2) as $chunky)
                                <div class="row">
                                    @foreach($chunky as $userResult)
                                        <div class="col-md-6">
                                            <h5>
                                                <div class="card content-card">
                                                    <div class="card-body">
                                                        <i class="fas fa-user"></i>&nbsp&nbsp<a href="/admin/users/{{ $userResult->id }}/edit">{{ $userResult->name }}</a>
                                                    </div>
                                                </div>
                                            </h5>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        @else
                            <h5>Search returned no results.</h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection