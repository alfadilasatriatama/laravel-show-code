@extends('dashboard.layouts.main')

@section('container')
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
			<h1 class="h2">Edit Iklan!</h1>
	</div>

<div class="col-lg-8">
	<form method="post" action="/dashboard/posts/{{ $post->slug }}" class="mb-5" enctype="multipart/form-data">
		@method('put')
		@csrf
		<div class="mb-3">
			<label for="title" class="form-label">Judul</label>
			<input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $post->title) }}">
			@error('title')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
			@enderror
		</div>
		<div class="mb-3">
			<label for="slug" class="form-label">Slug(Akan Di Isi Otomatis)</label>
			<input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug', $post->slug) }}">
			@error('slug')
				{{ $message }}
			@enderror
		</div>
		{{-- inpput address --}}
		<div class="mb-3">
			<label for="address" class="form-label">Paste Link Dari Google Maps</label>
			<input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" required value="{{ old('address', $post->address) }}">
			@error('address')
				{{ $message }}
			@enderror
		</div>
		<div class="mb-3">
			<label for="catgeory" class="form-label">Kategori</label>
			<select class="form-select" name="category_id">
				@foreach ($categories as $category)
					@if(old('category_id', $post->category_id) == $category->id)
					<option value="{{ $category->id }}" selected>{{ $category->name }}</option>
					@else <option value="{{ $category->id }}">{{ $category->name }}</option>
					@endif			
				@endforeach
			  </select>
		</div>

		<div class="mb-3">
			<label for="image" class="form-label">Posting Gambar Jumbo</label>
			<input type="hidden" name="oldImage" value="{{ $post->image }}">
			@if ($post->image)
				<img src="{{ asset('storage/'. $post->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block rounded">
			@else
				<img class="img-preview img-fluid mb-3 col-sm-5 rounded">
			@endif
			
			<input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
			@error('image')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
			@enderror
		</div>
		{{-- edit thumb --}}
		<div class="mb-3">
			<label for="thumb1" class="form-label">Posting Thumbnail kiri</label>
			<input type="hidden" name="oldThumb1" value="{{ $post->thumb1 }}">
			@if ($post->thumb1)
				<img src="{{ asset('storage/'. $post->thumb1) }}" class="img-preview img-fluid mb-3 col-sm-2 rounded d-block">
			@else
				<img class="img-preview img-fluid mb-3 col-sm-2 rounded">
			@endif
			
			<input class="form-control @error('thumb1') is-invalid @enderror" type="file" id="thumb1" name="thumb1" onchange="previewthumb1()">
			@error('thumb1')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
			@enderror
		</div>
		<div class="mb-3">
			<label for="thumb2" class="form-label">Posting Thumbnail Tengah-kiri</label>
			<input type="hidden" name="oldThumb2" value="{{ $post->thumb2 }}">
			@if ($post->thumb2)
				<img src="{{ asset('storage/'. $post->thumb2) }}" class="img-preview img-fluid mb-3 col-sm-2 rounded d-block">
			@else
				<img class="img-preview img-fluid mb-3 col-sm-2 rounded">
			@endif
			
			<input class="form-control @error('thumb2') is-invalid @enderror" type="file" id="thumb2" name="thumb2" onchange="previewthumb2()">
			@error('thumb2')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
			@enderror
		</div>
		<div class="mb-3">
			<label for="thumb3" class="form-label">Posting Thumbnail Tengah-Kanan</label>
			<input type="hidden" name="oldThumb3" value="{{ $post->thumb3 }}">
			@if ($post->thumb3)
				<img src="{{ asset('storage/'. $post->thumb3) }}" class="img-preview img-fluid mb-3 col-sm-2 rounded d-block">
			@else
				<img class="img-preview img-fluid mb-3 col-sm-2 rounded">
			@endif
			
			<input class="form-control @error('thumb3') is-invalid @enderror" type="file" id="thumb3" name="thumb3" onchange="previewthumb3()">
			@error('thumb3')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
			@enderror
		</div>
		<div class="mb-3">
			<label for="thumb4" class="form-label">Posting Thumbnail Kanan</label>
			<input type="hidden" name="oldThumb4" value="{{ $post->thumb4 }}">
			@if ($post->thumb4)
				<img src="{{ asset('storage/'. $post->thumb4) }}" class="img-preview img-fluid mb-3 col-sm-2 rounded d-block">
			@else
				<img class="img-preview img-fluid mb-3 col-sm-2 rounded">
			@endif
			
			<input class="form-control @error('thumb4') is-invalid @enderror" type="file" id="thumb4" name="thumb4" onchange="previewthumb4()">
			@error('thumb4')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
			@enderror
		</div>
		

		<div class="mb-3">
			<label for="body" class="form-label">Body</label>
			@error('body')
				<p class="text-danger">{{ $message }}</p>
			@enderror
				<input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
				<trix-editor input="body"></trix-editor>	
		</div>

		<button type="submit" class="btn btn-primary">Update Iklan!</button>
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

	// -----------show preview thumb---------
	function previewThumb1() {
		const image = document.querySelector('#thumb1');
		const imgPreview = document.querySelector('.img-preview');

		imgPreview.style.display = 'block';

		const oFReader = new FileReader();
		oFReader.readAsDataURL(image.files[0]);

		oFReader.onload = function(oFREvent) {
			imgPreview.src = oFREvent.target.result;
		}
	}
	function previewThumb2() {
		const image = document.querySelector('#thumb2');
		const imgPreview = document.querySelector('.img-preview');

		imgPreview.style.display = 'block';

		const oFReader = new FileReader();
		oFReader.readAsDataURL(image.files[0]);

		oFReader.onload = function(oFREvent) {
			imgPreview.src = oFREvent.target.result;
		}
	}
	function previewThumb3() {
		const image = document.querySelector('#thumb3');
		const imgPreview = document.querySelector('.img-preview');

		imgPreview.style.display = 'block';

		const oFReader = new FileReader();
		oFReader.readAsDataURL(image.files[0]);

		oFReader.onload = function(oFREvent) {
			imgPreview.src = oFREvent.target.result;
		}
	}
	function previewThumb4() {
		const image = document.querySelector('#thumb4');
		const imgPreview = document.querySelector('.img-preview');

		imgPreview.style.display = 'block';

		const oFReader = new FileReader();
		oFReader.readAsDataURL(image.files[0]);

		oFReader.onload = function(oFREvent) {
			imgPreview.src = oFREvent.target.result;
		}
	}

</script>
@endsection