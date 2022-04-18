@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <h1 class="mb-3">{{ $post->title }}</h1>
                
                <a href="/dashboard/posts" class="mb-3 btn btn-success"><span data-feather="arrow-left"></span> Kembali Ke Semua Postingan</a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="mb-3 btn btn-warning"><span data-feather="edit"></span> Edit</a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="mb-3 btn btn-danger " onclick="return confirm('Are you Sure?')"><span data-feather="x-circle"></span> Delete</button>
                </form>

                <span class="d-flex mb-2 ">
                    <a href="{{ $post->address }}" class="btn btn-primary d-flex justify-content-first" id="" name="googleMaps"><span class="bi bi-geo-alt-fill mr-1"></span>Maps</a>

                    <a href="https://api.whatsapp.com/send?phone={{ $post->author->noWA }}" class="btn btn-success d-flex ml-auto mx-2" id="number" name="number"><span class="bi bi-whatsapp mr-1"></span> Whatsapp</a>
                </span>

                @if ($post->image)
                    <div style="max-height: 350px; overflow:hidden;">
                     <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid rounded">
                    </div>
                    <div class="d-flex justify-content-center">
                        <div style="max-height: 150px; overflow:hidden; width: 100px;">
                        <img src="{{ asset('storage/' . $post->thumb1) }}" alt="{{ $post->category->name }}" class="img-fluid rounded">
                        </div>
                        <div style="max-height: 150px; overflow:hidden; width: 100px;">
                        <img src="{{ asset('storage/' . $post->thumb2) }}" alt="{{ $post->category->name }}" class="img-fluid rounded d-flex">
                        </div>
                        <div style="max-height: 150px; overflow:hidden; width: 100px;">
                        <img src="{{ asset('storage/' . $post->thumb3) }}" alt="{{ $post->category->name }}" class="img-fluid rounded d-flex">
                        </div>
                        <div style="max-height: 150px; overflow:hidden; width: 100px;">
                        <img src="{{ asset('storage/' . $post->thumb4) }}" alt="{{ $post->category->name }}" class="img-fluid rounded d-flex">
                        </div>
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid">
                @endif

                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>

            </div>
        </div>
    </div>

@endsection