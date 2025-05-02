@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Student Details</h3>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Name:</strong> {{ $student->name }}
            </div>
            <div class="col-md-6">
                <strong>Email:</strong> {{ $student->email }}
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Phone:</strong> {{ $student->phone }}
            </div>
            <div class="col-md-6">
                <strong>Date of Birth:</strong> {{ $student->date_of_birth->format('m/d/Y') }}
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Address:</strong> {{ $student->address }}
            </div>
            <div class="col-md-6">
                <strong>City:</strong> {{ $student->city->name }}
            </div>
        </div>
        
        <div class="mt-4">
            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection