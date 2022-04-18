
@extends('layouts.main')

@section('container')

    <h1 class="my-3 text-center font-weight-bold">Semua Iklan!</h1>

    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/posts">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{  request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="category" value="{{  request('author') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari.." name="search" value="{{ request('search') }}">
                    <button class="btn btn-danger" type="submit">Cari</button>
                  </div>
            </form>
        </div>
    </div>

    @if ($posts->count() > 0)
        <div class="card mb-3 rounded overflow-hidden">
            @if ($posts[0]->image)
                <div style="max-height: 400px; overflow:hidden;" class="text-center">
                <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->category->name }}" class="img-fluid rounded">
                </div>
            @else
                <img class="card-img-top" src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" alt="Card image cap">
            @endif
            
            <div class="card-body text-center">
            <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h3>
            <p>
                <small class="text-muted">
                    Di Posting Oleh : <a href="/posts?author={{ $posts[0]->author->username }}">{{ $posts[0]->author->name }}</a> in <a href="/posts?category={{ $posts[0]->category->slug }}"  class="text-decoration-none">{{ $posts[0]->category->name }}</a>
                </small>
            </p>
            <p class="card-text">{{ $posts[0]->excerpt }}</p>

            <a href="/posts/{{ $posts[0]->slug }}" class="btn btn-primary"><i class="bi bi-eye-fill"></i> Lihat Iklan</a>
           
            </div>
        </div>


    <div class="container rounded overflow-hidden">
        <div class="row">
            @foreach ($posts->skip(1) as $post )
                <div class="col-md-4 mb-3">
                    <div class="card" >
                        <div class="position-absolute  px-3 py-2 text-white" style="background-color: rgba(0,0,0,0.7)"><a href="/posts?category={{ $post->category->slug }}" class="text-white text-decoration-none">{{ $post->category->name }}</a></div>
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid rounded-top">
                        @else
                            <img class="card-img-top" src="https://source.unsplash.com/500x400?{{ $post->category->name }}" alt="{{ $post->category->name }}">
                        @endif
                        
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                                <p>
                                    <small class="text-muted">
                                        Postingan : <a href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a>
                                    </small>
                                </p>
                            <p class="card-text">{{ $post->excerpt }}</p>
                            <a href="/posts/{{ $post->slug }}" class="btn btn-primary"><i class="bi bi-eye-fill"></i> Lihat Iklan</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@else
    <p class="text-center fs-4">No Post Found.</p>
@endif

    <div class="d-flex justify-content-end">
        {{ $posts->links() }}
    </div>
@endsection

