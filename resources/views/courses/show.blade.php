@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="mb-4">
        <a href="{{ route('courses.index') }}" class="text-decoration-none text-muted">
            ← Back to Courses
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4 p-md-5">

            <div class="d-flex justify-content-between align-items-start mb-4">
                <div>
                    <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2 mb-3">
                        Course
                    </span>

                    <h1 class="fw-bold mb-2">{{ $course->title }}</h1>

                    <p class="text-muted mb-0">
                        Course details and information
                    </p>
                </div>

                <div class="text-end">
                    <small class="text-muted d-block">Price</small>
                    <span class="fs-3 fw-bold text-primary">
                        ${{ $course->price }}
                    </span>
                </div>
            </div>

            <hr>

            <div class="mt-4">
                <h5 class="fw-semibold mb-3">About this course</h5>

                <p class="text-muted lh-lg">
                    {{ $course->description ?: 'No description available for this course.' }}
                </p>
            </div>

            <div class="mt-4 pt-3 border-top">
                <a
                    href="{{ route('courses.edit', $course->id) }}"
                    class="btn btn-primary px-4 py-2 rounded-3"
                >
                    Edit Course
                </a>

                <a
                    href="{{ route('courses.index') }}"
                    class="btn btn-light border px-4 py-2 rounded-3 ms-2"
                >
                    Back to Courses
                </a>
            </div>

        </div>
    </div>

</div>

@endsection