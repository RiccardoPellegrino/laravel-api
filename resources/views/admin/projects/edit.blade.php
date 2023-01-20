@extends('layouts.admin')

@section('content')
    <h1>Modifica Progetto:{{ $project->name_project }}</h1>
    <div class="row bg-white">
        <div class="col-12">
            <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST" enctype="multipart/form-data"
                class="p-4">
                @csrf
                @method('PUT')
                <div class="mb-1">
                    <div class="meta-sinistra">
                        <label for="name_project" class="form-label">Nome Progetto</label>
                        <input type="text" class="form-control @error('name_project') is-invalid @enderror"
                            id="name_project" name="name_project" value="{{ old('name_project', $project->name_project) }}">
                        @error('name_project')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description">{{ old('description', $project->description) }}</textarea>
                    </div>
                    <div class="mb-1">
                        <label for="framework" class="form-label">Framework</label>
                        <input type="text" class="form-control @error('framework') is-invalid @enderror" id="framework"
                            name="framework" value="{{ old('framework', $project->framework) }}">
                        @error('framework')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="team" class="form-label">Team</label>
                        <input type="text" class="form-control @error('team') is-invalid @enderror" id="team"
                            name="team" value="{{ old('team"', $project->team) }}">
                        @error('team')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="meta-destra">
                    <div class="mb-1">
                        <label for="link_git" class="form-label">Link Git</label>
                        <input type="text" class="form-control @error('link_git') is-invalid @enderror" id="link_git"
                            name="link_git" value="{{ old('link_git', $project->link_git) }}">
                        @error('link_git')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="lvl_diff" class="form-label">Difficolta</label>
                        <input type="number" min="1" max="10" class="form-control @error('lvl_diff') is-invalid @enderror" id="lvl_diff"
                            name="lvl_diff" value="{{ old('lvl_diff', $project->lvl_diff) }}">
                        @error('lvl_diff')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex mt-4">
                        <div class="media me-4">
                            <img class="shadow" width="150" src="{{ asset('storage/' . $project->cover_image) }}"
                                alt="{{ $project->title }}">
                        </div>
                        <div class="mb-1">
                            <label for="cover_image" class="form-label">Replace post image</label>
                            <input type="file" name="cover_image" id="cover_image"
                                class="form-control  @error('cover_image') is-invalid @enderror">
                            @error('cover_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <label for="type_id" class="form-label">Seleziona workflow</label>
                                <select name="type_id" id="type_id" class="form-control @error('type_id') is-invalid @enderror">
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}"
                                            {{ $type->id == old('type_id') ? 'selected' : '' }}>{{ $type->workflow }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('type_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="languages" class="form-label">Linguaggi</label>
                                @foreach ($languages as $language)
                                    <input type="checkbox" name="languages[]" value="{{ $language->id }}" {{old('languages', $project->languages) ? (old('languages', $project->languages)->contains($language->id)) ? 'checked' : '' : ''}}>
                                    <span class="text-capitalize">{{ $language->name }}</span>
                                @endforeach
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <button type="reset" class="btn btn-primary">Reset</button>
                                <button class="btn btn-primary"><a
                                        href="{{ route('admin.projects.index') }}"style="color:white">Indietro</a></button>
                            </div>
                        </div>
                    </div>

            </form>
        </div>
    </div>
    </div>
@endsection
