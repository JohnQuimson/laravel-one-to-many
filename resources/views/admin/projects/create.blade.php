@extends('layouts.admin')

@section('content')
    <div class="main-create">
        <div class="container">

            {{-- Validation --}}
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
            {{-- Validation --}}

            <form action="{{ route('admin.projects.store') }}" method="POST">
                @csrf

                {{-- titolo --}}
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Titolo</label>

                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">

                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                {{-- visibility --}}
                {{-- <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">visibility</label>
                    <input type="text" class="form-control @error('visibility') is-invalid @enderror" name="visibility" value="{{ old('visibility') }}">

                    @error('visibility')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div> --}}

                {{-- visibility --}}
                <div class="mb-3">
                    <label for="visibility" class="form-label">Visibility</label>
                    <select name="visibility" id="visibility" class="form-control @error('visibility') is-invalid @enderror">
                        <option disabled {{ old('visibility') == '' ? 'selected' : '' }}>Select a visibility option</option>
                        <option value="Public" {{ old('visibility') == 'Public' ? 'selected' : '' }}>Public</option>
                        <option value="Pivate" {{ old('visibility') == 'Private' ? 'selected' : '' }}>Private</option>
                    </select>

                    @error('visibility')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- visibility --}}


                {{-- last_updated --}}
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">last_updated</label>
                    <input type="text" class="form-control @error('last_updated') is-invalid @enderror" name="last_updated" value="{{ old('last_updated') }}">

                    @error('last_updated')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                {{-- main_language --}}
                <div class="mb-3">
                    <label class="form-label">main_language</label>
                    <input type="text" name="main_language" class="form-control @error('main_language') is-invalid @enderror" value="{{ old('main_language') }}">

                    @error('main_language')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Select Type --}}
                <div class="mb-3">
                    <label class="form-label">Type</label>
                    <select class="form-select" aria-label="Default select example" name="type_id">
                        <option selected>Select the type</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->title }}</option>
                        @endforeach

                    </select>
                </div>




                <button type="submit" class="btn btn-success">Crea</button>
            </form>
            <div class="pt-5">
                <a href="{{ route('admin.projects.index') }}">
                    < torna alla lista</a>
            </div>
        </div>
    </div>
@endsection
