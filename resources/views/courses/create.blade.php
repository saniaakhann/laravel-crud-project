@extends('layouts.app')

@section('content')
    <div class="container py-5">

        {{-- Page Header --}}
        <div class="mb-4">
            <h1 class="fw-bold mb-1">Add New Course</h1>
            <p class="text-muted mb-0">
                Create a new course and add it to your collection.
            </p>
        </div>

        {{-- Form Card --}}
        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body p-4 p-md-5">

                <form action="{{ route('courses.store') }}" method="POST">
                    @csrf

                    {{-- Title --}}
                    <div class="mb-4">
                        <label for="title" class="form-label fw-semibold">
                            Course Title
                        </label>

                        <input
                            type="text"
                            name="title"
                            id="title"
                            class="form-control form-control-lg rounded-3"
                            placeholder="e.g. Laravel Basics"
                            value="{{ old('title') }}"
                            required
                        >
                    </div>

                    {{-- Description --}}
                    <div class="mb-4">
                        <label for="description" class="form-label fw-semibold">
                            Description
                        </label>

                        <textarea
                            name="description"
                            id="description"
                            rows="5"
                            class="form-control rounded-3"
                            placeholder="Enter a short description of the course..."
                            required
                        >{{ old('description') }}</textarea>
                    </div>

                    {{-- Price --}}
                    <div class="mb-4">
                        <label for="price" class="form-label fw-semibold">
                            Price
                        </label>

                        <div class="input-group input-group-lg">
                            <span class="input-group-text">$</span>

                            <input
                                type="number"
                                name="price"
                                id="price"
                                class="form-control rounded-end-3"
                                placeholder="499"
                                step="0.01"
                                min="0"
                                value="{{ old('price') }}"
                                required
                            >
                        </div>
                    </div>

                    {{-- Buttons --}}
                    <div class="d-flex gap-2 pt-2">

                        <button type="submit"
                                class="btn btn-primary px-4 py-2 rounded-3">
                            + Create Course
                        </button>

                        <a href="{{ route('courses.index') }}"
                           class="btn btn-light border px-4 py-2 rounded-3">
                            Cancel
                        </a>

                    </div>

                </form>

            </div>
        </div>

    </div>
@endsection