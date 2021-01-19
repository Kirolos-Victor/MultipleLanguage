@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{trans('content.createpost')}}</h3>

            </div>

            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif                <form
                 action="{{route('posts.store')}}" method="post">
                    @csrf
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                    <li class="nav-item">
                        <a class="nav-link {{$loop->index ==0 ?'active':''}}" id="{{$localeCode}}-tab" data-toggle="tab" href="#{{$localeCode}}" role="tab" aria-controls="{{$localeCode}}" aria-selected="true">{{trans('content.'.$properties['name'])}}</a>
                    </li>
                    @endforeach
                </ul>

                <div class="tab-content mt-3" id="myTabContent">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                    <div class="tab-pane fade {{$loop->index ==0 ?'show active':''}}" id="{{$localeCode}}" role="tabpanel" aria-labelledby="{{$localeCode}}-tab">

                            <div class="form-group">
                                <label for="inputName">{{trans('content.title').'('.$localeCode.')'}}</label>
                                <input name="title[{{$localeCode}}]" type="text" id="inputName" class="form-control" value="{{old('title.'.$localeCode)}}">
                                @error('title.'.$localeCode)<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">{{trans('content.body').'('.$localeCode.')'}}</label>
                                <textarea name="body[{{$localeCode}}]" id="inputDescription" class="form-control" rows="4" >{{old('body.'.$localeCode)}}</textarea>
                                @error('body.'.$localeCode)<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                    </div>
                    @endforeach

                </div>

                <button class="btn btn-success" type="submit">
                    {{trans('content.submit')}}
                </button>
                <a class="btn btn-dark" href="{{route('posts.index')}}">
                    {{trans('content.back')}}
                </a>
                </form>
            </div>

            <!-- /.card-body -->
        </div>
    </div>
    @endsection
