@extends('layouts.admin')
@section('content')
    <div class="container mt-5 d-flex flex-column justify-content-center align-items-center">
        <div class="col-4">
            <div class="text-center">
                <h1>{{ $type->workflow }}</h1>
                <ul>
                    @foreach ($type->projects as $project)
                        <li>{{ $project->name_project }}</li>
                    @endforeach
                </ul>
                <button class="btn btn-primary mt-3"><a href="{{ route('admin.types.index') }}"
                        class="text-white">Indietro</a></button>
            </div>
        </div>
    </div>
@endsection
