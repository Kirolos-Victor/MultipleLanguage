@extends('layouts.app')
@section('content')
   <div class="container">
       <div class="row justify-content-center">
           <div class="col-12">
               <div class="card">
                   <div class="card-header">
                       {{trans('content.posts')}}
                       <a class="btn btn-success float-right" href="{{route('posts.create')}}">{{trans('content.createpost')}}</a>
                   </div>
                       <form action="{{route('posts.search')}}" method="get">
                           <div class="input-group mb-3 mt-3 pl-2 pr-2">
                               <input type="text" class="form-control" name="q">
                               <div class="input-group-append">
                                   <button class="btn btn-outline-secondary" type="submit" id="button-addon2">{{trans('content.search')}}</button>
                               </div>
                           </div>
                       </form>

                   <div class="card-body">
                       @if(session()->has('message'))
                           <div class="alert alert-success">
                               {{ session()->get('message') }}
                           </div>
                       @endif
                       <div class="table-responsive">

                           <table class="table table-bordered ">
                               <thead class="thead-dark">
                               <tr class="d-flex" >
                                   <th class="col-3">#</th>
                                   <th class="col-6">{{trans('content.title')}}</th>
                                   <th class="col-3">{{trans('content.action')}}</th>
                               </tr>
                               </thead>
                               <tbody>
                               @isset($posts)
                               @foreach($posts as $post)
                               <tr class="d-flex">
                                   <th class="col-3">{{$loop->index+1}}</th>
                                   <td class="col-6">{{$post->title}}</td>
                                   <td class="col-3"><a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">{{trans('content.update')}}</a>
                                   <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                                       {{method_field('DELETE')}}
                                       @csrf
                                       <button type="submit" class="btn btn-danger" >{{trans('content.delete')}}</button>
                                   </form></td>
                               </tr>
                               @endforeach
                               @endisset
                               </tbody>
                           </table>
                       </div>
                   </div>
               </div>

           </div>
       </div>
   </div>
@endsection
