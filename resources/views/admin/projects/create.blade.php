@extends('layouts.admin')

@section('content')
    <h1>Create Progetto</h1>
    <div class="row bg-white">
        <div class="col-12">
            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="p-4">
                @csrf
                <div class="mb-3">
                    <label for="name_project" class="form-label">Nome Progetto</label>
                    <input type="text" class="form-control @error('name_project') is-invalid @enderror" id="name_project"
                        name="name_project">
                    @error('name_project')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-1">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>
                <div class="mb-3">
                    <label for="framework" class="form-label">Framework</label>
                    <input type="text" class="form-control @error('framework') is-invalid @enderror" id="framework"
                        name="framework">
                    @error('framework')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="team" class="form-label">Team</label>
                    <input type="text" class="form-control @error('team') is-invalid @enderror" id="team"
                        name="team">
                    @error('team')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="link_git" class="form-label">Link Git</label>
                    <input type="text" class="form-control @error('link_git') is-invalid @enderror" id="link_git"
                        name="link_git">
                    @error('link_git')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="lvl_diff" class="form-label">Difficolta</label>
                    <input type="number" min="1" max="10" class="form-control @error('lvl_diff') is-invalid @enderror" id="lvl_diff"
                        name="lvl_diff">
                    @error('lvl_diff')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="cover_image" class="form-label">Immagine</label>
                    <input type="file" name="cover_image" id="cover_image"
                        class="form-control  @error('cover_image') is-invalid @enderror">
                    @error('cover_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="type_id" class="form-label">Seleziona workflow</label>
                    <select name="type_id" id="type_id" class="form-control @error('type_id') is-invalid @enderror">
                      <option value="">Seleziona workflow</option>
                      @foreach ($types as $type)
                          <option value="{{$type->id}}" {{ $type->id == old('type_id') ? 'selected' : '' }}>{{$type->workflow}}</option>
                      @endforeach
                    </select>
                    @error('type_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="languages" class="form-label">Linguaggi</label>
                    @foreach ($languages as $language)
                    <input type="checkbox" name="languages[]" value="{{$language->id}}">
                    <span class="text-capitalize">{{$language->name}}</span>
                    @endforeach
                    {{-- @error('languages')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror --}}
                  </div>
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-primary">Reset</button>
                <button class="btn btn-primary"><a
                        href="{{ route('admin.projects.index') }}"style="color:white">Indietro</a></button>
            </form>
        </div>
    </div>
@endsection
