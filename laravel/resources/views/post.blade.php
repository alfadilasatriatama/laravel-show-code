@extends('layouts.main')

@section('container')

        <div class="container-fluid col-sm-12 col-lg-8">
            <div class="row justify-content-center mb-5  ">
                <div class="">
                    <h1 class="mb-3">{{ $post->title }}</h1>
                    
                    <p>By. <a href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>

                    <span class="d-flex mb-2  ">
						<a href="{{ $post->address }}" class="btn btn-primary d-flex justify-content-first" id="" name="googleMaps"><span class="bi bi-geo-alt-fill mr-1"></span>Maps</a>

                        <a href="https://api.whatsapp.com/send?phone={{ $post->author->noWA }}" class="btn btn-success d-flex ml-auto " id="number" name="number"><span class="bi bi-whatsapp mr-1"></span>Whatsapp</a>
					</span>

                    @if ($post->image)
                    <div class="container " id="containerImage">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid rounded jumbo" id="jumbo">

                        <div class="thumbnail contianer  d-flex justify-content-center">
                            <img src="{{ asset('storage/' . $post->thumb1) }}" alt="{{ $post->category->name }}" alt="{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid thumb" id="thumb">
                            <img src="{{ asset('storage/' . $post->thumb2) }}" alt="{{ $post->category->name }}" alt="{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid thumb"  id="thumb">
                            <img src="{{ asset('storage/' . $post->thumb3) }}" alt="{{ $post->category->name }}" alt="{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid thumb" id="thumb">
                            <img src="{{ asset('storage/' . $post->thumb4) }}" alt="{{ $post->category->name }}" class="img-fluid thumb"  id="thumb">                                 
                        </div>
                        

                    </div>
                    @else
                        <div class="contianer " id="containerImage">
                            <img src="https://source.unsplash.com/600x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid jumbo rounded-top" id="jumbo">

                            <div class="thumbnail contianer  d-flex justify-content-center">
                                <img src="https://source.unsplash.com/600x400?comp" alt="{{ $post->category->name }}" class="img-fluid thumb " id="thumb">
                                <img src="https://source.unsplash.com/600x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid thumb " id="thumb">
                                <img src="https://source.unsplash.com/600x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid thumb " id="thumb">
                                <img src="https://source.unsplash.com/600x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid thumb " id="thumb">                                
                            </div>
                        </div>
                    @endif
                </div>
                
                <div class="">
                    <article class="my-1 fs-5 ">
                        {!! $post->body !!}
                    </article>      

                    <span class="d-flex justify-content-first ">
                        <a href="/posts" class="btn btn-primary">Back to catalog</a>
                    </span>
                </div>
            </div>
            
        </div>


@endsection

