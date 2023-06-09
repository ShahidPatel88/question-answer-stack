@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('layouts.messages')
                <div class="card">
                    <div class="card-header d-flex ">
                        <div class="align-items-center">
                            <h2>All Questions</h2>
                        </div>
                        <div class="ml-auto">
                            <a href="{{route('questions.create')}}" class="btn btn-outline-secondary">Ask Question</a>
                        </div>
                    </div>

                    <div class="card-body">
                        @foreach($questions as $question)
                            <div class="media d-flex">
                                <div class="flex-column counters">
                                    <div class="vote">
                                        <strong>{{$question->votes}}</strong>{{\Illuminate\Support\Str::plural('vote',$question->votes)}}
                                    </div>
                                    <div class="status">
                                        <strong>{{$question->answers}}</strong>{{\Illuminate\Support\Str::plural('answer',$question->answers)}}
                                    </div>
                                    <div class="view">
                                        {{$question->views." ".\Illuminate\Support\Str::plural('view',$question->views)}}
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h3 class="mt-0"><a href="{{$question->url}}">{{$question->title}}</a></h3>
                                    <p class="lead">
                                        Asked by
                                        <a href="{{$question->user->url}}">{{$question->user->name}}</a>
                                        <small class="text-muted">{{$question->created_at}}</small>
                                    </p>
                                    {{\Illuminate\Support\Str::limit($question->body,250)}}
                                </div>
                            </div>
                        @endforeach
                        <div class="text-center">
                            {{$questions->links()}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
