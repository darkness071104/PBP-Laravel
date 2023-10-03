@extends('books.layout')
@section('content')

<div class="card mt-4">
    <div class="card-header">Add Books Data</div>
    <div class="card-body">
        <form action="{{ route('books.store') }}" method="POST" autocomplete="on">
            @csrf
            <div class="form-group">
                <label for="isbn">ISBN:</label>
                <input type="text" class="form-control @error('isbn') is-invalid @enderror" id="isbn" maxlength="13" name="isbn" value="{{ old('isbn') }}">
                @error('isbn')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="categoryid">Category:</label>
                <select name="categoryid" id="categoryid" class="form-control @error('categoryid') is-invalid @enderror" required>
                    <option value="">--Select a category--</option>
                    <option value="1" @if(old('categoryid') == 1) selected @endif>Computer Science</option>
                    <option value="2" @if(old('categoryid') == 2) selected @endif>Teknologi</option>
                    <option value="3" @if(old('categoryid') == 3) selected @endif>Sastra</option>
                    <option value="4" @if(old('categoryid') == 4) selected @endif>Sport</option>
                </select>
                @error('categoryid')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" value="{{ old('author') }}">
                @error('author')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}">
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
