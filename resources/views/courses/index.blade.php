@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold mb-1">Course Management</h1>
            <p class="text-muted mb-0">Manage your courses in one place.</p>
        </div>

        <a href="{{ route('courses.create') }}"
           class="btn btn-primary px-4 py-2 rounded-3">
            + Add Course
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success border-0 shadow-sm rounded-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <div class="mb-3">
                <h5 class="fw-semibold mb-1">All Courses</h5>
                <small class="text-muted">
                    {{ $courses->count() }} course(s) available
                </small>
            </div>

            <div class="table-responsive">
                <table class="table align-middle mb-0">

                    <thead>
                    <tr class="text-muted small">
                        <th>#</th>
                        <th>COURSE</th>
                        <th>PRICE</th>
                        <th class="text-end">ACTIONS</th>
                    </tr>
                    </thead>

                    <tbody>

                    @forelse ($courses as $course)

                        <tr>

                            <td class="text-muted">
                                {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                            </td>

                            <td>
                                <div class="d-flex align-items-center gap-3">

                                    <div class="bg-primary-subtle text-primary rounded-3 p-2">
                                        🎓
                                    </div>

                                    <div>
                                        <div class="fw-semibold">
                                            {{ $course->title }}
                                        </div>

                                        <small class="text-muted">
                                            Course #{{ $loop->iteration }}
                                        </small>
                                    </div>

                                </div>
                            </td>

                            <td>
                                <span class="fw-semibold">
                                    ${{ number_format($course->price, 2) }}
                                </span>
                            </td>

                            <td class="text-end">

                                <a href="{{ route('courses.show', $course->id) }}"
                                   class="btn btn-sm btn-light border rounded-3">
                                    View
                                </a>

                                <a href="{{ route('courses.edit', $course->id) }}"
                                   class="btn btn-sm btn-light border rounded-3">
                                    Edit
                                </a>

                                <form action="{{ route('courses.destroy', $course->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-outline-danger rounded-3"
                                            onclick="return confirm('Are you sure you want to delete this course?')">
                                        Delete
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="4" class="text-center py-5">

                                <div class="fs-1 mb-2">📚</div>

                                <h5 class="fw-semibold">No courses yet</h5>

                                <p class="text-muted">
                                    Create your first course to get started.
                                </p>

                                <a href="{{ route('courses.create') }}"
                                   class="btn btn-primary rounded-3">
                                    + Add Course
                                </a>

                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>
            </div>

        </div>

    </div>

</div>

@endsection