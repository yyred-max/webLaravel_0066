@extends('master')
@section('title', 'Tambah Data Post')
@section('body')
<div class="card mt-4">
    <div class="card-header">
        <h3 class="text-center">Tambah Data Post</h3>
    </div>
    <div class="card-body">
        {{-- Tambahkan enctype untuk upload file --}}
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Title --}}
            <div class="form-group mb-3">
                <label for="title">Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Category (wajib) --}}
            <div class="form-group mb-3">
                <label for="category_id">Category <span class="text-danger">*</span></label>
                <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                    <option value="">Pilih Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Content --}}
            <div class="form-group mb-3">
                <label for="content">Content <span class="text-danger">*</span></label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="4" required>{{ old('content') }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Excerpt (opsional) --}}
            <div class="form-group mb-3">
                <label for="excerpt">Excerpt (optional)</label>
                <textarea class="form-control" id="excerpt" name="excerpt" rows="2">{{ old('excerpt') }}</textarea>
            </div>

            {{-- Image (upload) --}}
            <div class="form-group mb-3">
                <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                <small class="form-text text-muted">Format: jpg, png, jpeg, gif, svg (max 2MB)</small>
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Author --}}
            <div class="form-group mb-3">
                <label for="author">Author</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ old('author', 'Admin') }}">
            </div>

            {{-- Source (opsional) --}}
            <div class="form-group mb-3">
                <label for="source">Source</label>
                <input type="text" class="form-control" id="source" name="source" value="{{ old('source') }}">
            </div>

            {{-- Published & Featured --}}
            <div class="form-group mb-3">
                <label>Published:</label>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="publishedYes" name="published" value="yes" {{ old('published') == 'yes' ? 'checked' : '' }}>
                    <label class="form-check-label" for="publishedYes">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="publishedNo" name="published" value="no" {{ old('published', 'no') == 'no' ? 'checked' : '' }}>
                    <label class="form-check-label" for="publishedNo">No</label>
                </div>
            </div>

            {{-- Tombol --}}
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </form>
    </div>
</div>
@stop