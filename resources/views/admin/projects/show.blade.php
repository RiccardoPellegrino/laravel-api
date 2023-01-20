@extends('layouts.admin')
@section('content')
    <div class="container mt-5 d-flex flex-column justify-content-center align-items-center">
        <div class="col-4">
            <div class="text-center">
                <img src="{{ asset('storage/' . $project->cover_image) }}" alt="">
                <h1>{{ $project->name_project }}</h1>
                <div>{{ $project->lvl_diff }}</div>
                <div>{{ $project->slug }}</a></div>
                <div>Nome: {{ $project->name }}</div>
                <td>
                    <ul>
                        @if (count($project->languages))
                            @foreach ($project->languages as $language)
                                <div>{{ $language->name }}</div>
                            @endforeach
                        @endif
                    </ul>
                </td>
                <div>{{ $project->framework }}</div>
                <div>{{ $project->team }}</div>
                <div>{{ $project->link_git }}</div>
                <div>{{ $project->description }}</div>

                <button class="btn btn-primary mt-3"><a href="{{ route('admin.projects.index') }}"
                        class="text-white">Indietro</a></button>
            </div>
        </div>
    </div>
@endsection
