@extends('layouts.app')

@section('content')

    <div class="app-container">
        <div class="py-4">
            <div class="align-items-center justify-content-between position-relative mb-3">
                <h1>Upload Persyaratan</h1>
                  <div class="mb-3">
                    <label for="formFile" class="form-label">Masukan file</label>
                    <input class="form-control" type="file" id="formFile">
                  </div>
                  <div class="col-12">
                    <button class="btn btn-primary" type="submit">Submit form</button>
                  </div>
        </div>
    </div>

@endsection
