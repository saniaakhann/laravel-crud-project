@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="mb-4">
        <h1 class="fw-bold mb-1">Edit Course</h1>
        <p class="text-muted mb-0">
            Update the details of your course.
        </p>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4 p-md-5">

            <form action="{{ route('courses.update', $course->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="form-label fw-semibold">Course Title</label>
                    <input
                        type="text"
                        name="title"
                        class="form-control form-control-lg"
                        value="{{ $course->title }}"
                        placeholder="e.g. Laravel Basics"
                        required
                    >
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Description</label>
                    <textarea
                        name="description"
                        class="form-control"
                        rows="5"
                        placeholder="Enter a short description of the course..."
                    >{{ $course->description }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Price</label>

                    <div class="input-group input-group-lg">
                        <span class="input-group-text">$</span>
                        <input
                            type="number"
                            name="price"
                            class="form-control"
                            value="{{ $course->price }}"
                            step="0.01"
                            placeholder="499"
                            required
                        >
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary px-4 py-2 rounded-3">
                        ✓ Update Course
                    </button>

                    <a
                        href="{{ route('courses.index') }}"
                        class="btn btn-light border px-4 py-2 rounded-3"
                    >
                        Cancel
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection