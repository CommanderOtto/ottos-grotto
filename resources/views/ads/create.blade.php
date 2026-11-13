
@extends('layouts.app')

@section('title', "Post an Ad | Otto's Grotto")

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card boat-card">
                <div class="card-body p-4 p-md-5">

                    <h2 class="fw-bold mb-2">
                        Post a New Ad
                    </h2>

                    <p class="text-muted mb-4">
                        List your stuff on Otto's Grotto.
                    </p>

                    <form action="{{ route('ads.store') }}"
                          method="POST">

                        @csrf

                        <!-- Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label">
                                Ad Title
                            </label>

                            <input type="text"
                                   id="title"
                                   name="title"
                                   class="form-control @error('title') is-invalid @enderror"
                                   value="{{ old('title') }}"
                                   required>

                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Price -->
                        <div class="mb-3">
                            <label for="price" class="form-label">
                                Price ($)
                            </label>

                            <input type="number"
                                   id="price"
                                   name="price"
                                   step="0.01"
                                   min="0"
                                   class="form-control @error('price') is-invalid @enderror"
                                   value="{{ old('price') }}"
                                   required>

                            @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Location -->
                        <div class="mb-3">
                            <label for="location" class="form-label">
                                Location
                            </label>

                            <input type="text"
                                   id="location"
                                   name="location"
                                   class="form-control @error('location') is-invalid @enderror"
                                   value="{{ old('location') }}"
                                   required>

                            @error('location')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Category -->
                        <div class="mb-3">
                            <label for="category_id" class="form-label">
                                Category
                            </label>

                            <select id="category_id"
                                    name="category_id"
                                    class="form-select @error('category_id') is-invalid @enderror">

                                <option value="">
                                    Select a category
                                </option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @selected(old('category_id') == $category->id)>
                                        {{ $category->name }}
                                    </option>
                                @endforeach

                            </select>

                            @error('category_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- New Category -->
                        <div class="mb-3">
                            <label for="new_category" class="form-label">
                                Or create a new category
                            </label>

                            <input type="text"
                                   id="new_category"
                                   name="new_category"
                                   class="form-control @error('new_category') is-invalid @enderror"
                                   value="{{ old('new_category') }}"
                                   placeholder="e.g. Fishing Boat">

                            <div class="form-text">
                                Leave blank if you selected an existing category.
                            </div>

                            @error('new_category')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="message" class="form-label">
                                Description
                            </label>

                            <textarea id="message"
                                      name="message"
                                      rows="5"
                                      class="form-control @error('message') is-invalid @enderror"
                                      required>{{ old('message') }}</textarea>

                            @error('message')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('home') }}"
                               class="btn btn-outline-secondary">
                                Cancel
                            </a>

                            <button type="submit" class="btn btn-grotto">
                                Publish Ad
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

@endsection
