@extends('dashboard.layouts.main')

@section('container')
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
			<h1 class="h2">Buat Iklan Baru!</h1>
	</div>

<div class="col-lg-8">
	<form method="post" action="/dashboard/posts" class="mb-5" enctype="multipart/form-data">
		@csrf
		<div class="mb-3">
			<label for="title" class="form-label">Judul</label>
			<input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
			@error('title')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
			@enderror
		</div>
		<div class="mb-3">
			<label for="slug" class="form-label">Slug</label>
			<input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug') }}">
			@error('slug')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
			@enderror
		{{-- input adress --}}
		</div>
		<div class="mb-3">
			<label for="address" class="form-label">Paste Link Google Maps Disini</label>
			<input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" required value="{{ old('address') }}">
			@error('address')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
			@enderror
		</div>
		{{--  --}}
		<div class="mb-3">
			<label for="catgeory" class="form-label">Kategori</label>
			<select class="form-select" name="category_id">
				@foreach ($categories as $category)
					@if(old('category_id') == $category->id)
					<option value="{{ $category->id }}" selected>{{ $category->name }}</option>
					@else <option value="{{ $category->id }}">{{ $category->name }}</option>
					@endif			
				@endforeach
			  </select>
		</div>
		
		<div class="mb-3">
			<label for="image" class="form-label">Posting Gambar Jumbo</label>
			<img src="" alt="" class="img-preview img-fluid mb-3 col-sm-5">
			<input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
			@error('image')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
			@enderror
		</div>
		{{-- thumb upload --}}
		<div class="mb-3">
			<label for="thumb1" class="form-label">Posting Thumbnail Kiri</label>
			<img src="" alt="" class="thumb1-preview img-fluid mb-3 col-sm-3">
			<input class="form-control @error('thumb-1') is-invalid @enderror" type="file" id="thumb1" name="thumb1" onchange="previewThumb1()">
			@error('thumb1')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
			@enderror
		</div>
		<div class="mb-3">
			<label for="thumb2" class="form-label">Posting Thumbnail Tengah-Kiri</label>
			<img src="" alt="" class="thumb2-preview img-fluid mb-3 col-sm-3">
			<input class="form-control @error('thumb2') is-invalid @enderror" type="file" id="thumb2" name="thumb2" onchange="previewThumb2()">
			@error('thumb2')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
			@enderror
		</div>
		<div class="mb-3">
			<label for="thumb3" class="form-label">Posting Thumbnail Tengah-kanan</label>
			<img src="" alt="" class="thumb3-preview img-fluid mb-3 col-sm-3">
			<input class="form-control @error('thumb3') is-invalid @enderror" type="file" id="thumb3" name="thumb3" onchange="previewThumb3()">
			@error('thumb3')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
			@enderror
		</div>
		<div class="mb-3">
			<label for="thumb4" class="form-label">Posting Thumbnail Kanan</label>
			<img src="" alt="" class="thumb4-preview img-fluid mb-3 col-sm-3">
			<input class="form-control @error('thumb4') is-invalid @enderror" type="file" id="thumb4" name="thumb4" onchange="previewThumb4()">
			@error('thumb4')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
			@enderror
		</div>
		{{--  --}}


		<div class="mb-3">
			<label for="body" class="form-label">Body</label>
			@error('body')
				<p class="text-danger">{{ $message }}</p>
			@enderror
				<input id="body" type="hidden" name="body" value="{{ old('body') }}">
				<trix-editor input="body"></trix-editor>	
		</div>

		<button type="submit" class="btn btn-primary">Buat Iklan!</button>
	</form>
</div>

<script>
	const title = document.querySelector('#title');
	const slug = document.querySelector('#slug');

	title.addEventListener('change', function() {
		fetch('/dashboard/posts/checkSlug?title=' + title.value)
			.then(response => response.json())
			.then(data => slug.value = data.slug)
	});

	document.addEventListener('trix-file-accept', function(e) {
		e.preventDefault();
	})

	// -------show preview image------
	function previewImage() {
		const image = document.querySelector('#image');
		const imgPreview = document.querySelector('.img-preview');

		imgPreview.style.display = 'block';

		const oFReader = new FileReader();
		oFReader.readAsDataURL(image.files[0]);

		oFReader.onload = function(oFREvent) {
			imgPreview.src = oFREvent.target.result;
		}
	}
	// ---thumbnail show image---
	function previewThumb1() {
		const image = document.querySelector('#thumb1');
		const imgPreview = document.querySelector('.thumb1-preview');

		imgPreview.style.display = 'block';

		const oFReader = new FileReader();
		oFReader.readAsDataURL(image.files[0]);

		oFReader.onload = function(oFREvent) {
			imgPreview.src = oFREvent.target.result;
		}
	}
	function previewThumb2() {
		const image = document.querySelector('#thumb2');
		const imgPreview = document.querySelector('.thumb2-preview');

		imgPreview.style.display = 'block';

		const oFReader = new FileReader();
		oFReader.readAsDataURL(image.files[0]);

		oFReader.onload = function(oFREvent) {
			imgPreview.src = oFREvent.target.result;
		}
	}
	function previewThumb3() {
		const image = document.querySelector('#thumb3');
		const imgPreview = document.querySelector('.thumb3-preview');

		imgPreview.style.display = 'block';

		const oFReader = new FileReader();
		oFReader.readAsDataURL(image.files[0]);

		oFReader.onload = function(oFREvent) {
			imgPreview.src = oFREvent.target.result;
		}
	}
	function previewThumb4() {
		const image = document.querySelector('#thumb4');
		const imgPreview = document.querySelector('.thumb4-preview');

		imgPreview.style.display = 'block';

		const oFReader = new FileReader();
		oFReader.readAsDataURL(image.files[0]);

		oFReader.onload = function(oFREvent) {
			imgPreview.src = oFREvent.target.result;
		}
	}
</script>
@endsection