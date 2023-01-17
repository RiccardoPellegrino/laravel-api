@extends('layouts.admin')

@section('content')
    <h1>Project</h1>
    <a class="btn btn-success" href="{{ route('admin.projects.create') }}">Crea nuovo progetto</a>
    @if (session()->has('message'))
        <div class="alert alert-success mb-3 mt-3">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome Progetto</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Linguaggi</th>
                    <th scope="col">Framework</th>
                    <th scope="col">Team</th>
                    <th scope="col">Link Git</th>
                    <th scope="col">Difficolta</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->id }}</th>
                        <td><a class="text-capitalize" href="{{ route('admin.projects.show', $project->slug) }}"
                                title="View Post">{{ $project->name_project }}</a></td>
                        <td>{{ Str::limit($project->description, 50) }}</td>
                        <td>
                            <ul>
                                @if (count($project->languages))
                                    @foreach ($project->languages as $language)
                        <div>{{ $language->name }}</div>
                @endforeach
                @endif
                </ul>
                </td>
                        <td>{{ $project->framework }}</td>
                        <td>{{ $project->team }}</td>
                        <td>{{ $project->link_git }}</td>
                        <td>{{ $project->lvl_diff }}</td>
                        @foreach ($types as $type)
                            @if ($type->id === $project->type_id)
                                <td>{{ $type->workflow }}</td>
                            @endif
                        @endforeach
                        <td><a class="link-secondary" href="{{ route('admin.projects.edit', $project->slug) }}"
                                title="Edit Post"><i class="fa-solid fa-pen"></i></a></td>
                        <td>
                            <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button btn btn-danger ms-3"
                                    data-item-title="{{ $project->name_project }}"><i
                                        class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('partials.admin.modal-delete')
@endsection
