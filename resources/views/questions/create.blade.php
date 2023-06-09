@extends('layouts.app')

@section('content')

{{--    2.46--}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex ">
                        <div class="align-items-center">
                            <div class="align-items-center">
                                <h2>All Questions</h2>
                            </div>
                            <div class="ml-auto">
                                <a href="{{route('questions.index')}}" class="btn btn-outline-secondary">Back to all question</a>
                            </div>
                        </div>
                    </div>


                    <div class="card-body">

                        <form action="{{route('questions.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="question-title">Question Title</label>
                                <input type="text" name="title" id="question-title" class="form-control {{$errors->has('title')?'is-invalid':''}}" data-validation="required">
                                @if($errors->has('title'))
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{$errors->first('title')}}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                    <label for="question-body">Explain you question</label>
                                    <textarea name="body" id="question-body" class="form-control {{$errors->has('body')?'is-invalid':''}}" rows="10" data-validation="required"></textarea>
                                    @if($errors->has('body'))
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{$errors->first('body')}}</strong>
                                        </div>
                                    @endif
                             </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary btn-lg">Ask this question</button>
                             </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
