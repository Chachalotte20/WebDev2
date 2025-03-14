@extends('base')
@section('title', 'Student Lists')

<div class="container mt-4">
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Student Lists</h5>

            <!-- Action buttons (Create + Logout) -->
            <div class="d-flex gap-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createNewStd">
                    Create New Student
                </button>
                <a href="{{ route('std.logout') }}" class="btn btn-danger">
                    Logout
                </a>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Student Name</th>
                        <th class="text-center">Age</th>
                        <th class="text-center">Gender</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $std)
                    <tr>
                        <td class="text-center">{{ $std->id }}</td>
                        <td class="text-center">{{ $std->name }}</td>
                        <td class="text-center">{{ $std->age }}</td>
                        <td class="text-center">{{ $std->gender }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="createNewStd" tabindex="-1" aria-labelledby="createNewStdLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="{{ route('std.create') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createNewStdLabel">Create New Student</h1>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="stdName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="stdName" name="stdName" value="{{ old('stdName') }}" placeholder="Input Name">
                        @error('stdName')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="stdAge" class="form-label">Age</label>
                        <input type="text" class="form-control" id="stdAge" name="stdAge" value="{{ old('stdAge') }}" placeholder="Input Age">
                        @error('stdAge')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="stdGender" class="form-label">Gender</label>
                        <input type="text" class="form-control" id="stdGender" name="stdGender" value="{{ old('stdGender') }}" placeholder="Input Gender">
                        @error('stdGender')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
