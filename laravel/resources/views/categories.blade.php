
@extends('layouts.main')

@section('container')

    <h1 class="m-3" style="font-family:Georgia, 'Times New Roman', Times, serif">Kategori Iklan:</h1>

		<div class="container">
			<div class="row">
				@foreach ( $categories as $category)
				<a href="/posts?category={{ $category->slug }}">
					<div class="col-md-4">
						<div class="card bg-dark text-white">
							<img class="card-img" src="" alt="{{ $category->name }}">
							<div class="card-img-overlay d-flex align-items-center p-0">
							<h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color: rgba(0,0,0,0.7)">{{ $category->name }}</h5>
						</div>
					</div>
				</a>
			</div>
				@endforeach

			</div>
		</div>

@endsection

