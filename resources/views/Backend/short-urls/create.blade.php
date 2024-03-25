@extends('layouts.master')
@section('title', 'Add | Urls')
@section('content')


<!-- Breadcrumb -->
<div class="breadcrumb-area mb-3">
    <div class="container">
        <nav aria-label="breadcrumb" class="p-2 bg-white breadcrumb-main rounded">
            <ol class="breadcrumb m-0 justify-content-start">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Short-Urls</li>
                <li class="breadcrumb-item active" aria-current="page">Add Short-Urls</li>
            </ol>
        </nav>
    </div>
</div>
<div class="counter-container py-3">
    <div class="container">
        <div class="row mb-3 justify-content-center">
            <div class="col-lg-7">
                <div class="add-form bg-white p-4 rounded">
                    <h2 class="mb-5 section-title border-bottom pb-1">Add a Short Url</h2>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{$error}}</div>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{url('admin/add-short-url')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="code" class="fs-5 mb-2">Code</label>
                            <input type="text" name="code" id="code" value="{{old('code')}}" class="w-100" placeholder="Enter Code..." required>
                        </div>
                    
                        <div class="d-flex align-items-center gap-2">
                            <div class="mb-3">
                                <label for="link" class="fs-5 mb-2">Link</label>
                                <input type="text" name="link" id="link" value="{{old('link')}}" class="w-100" placeholder="Enter Link..." required>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary mb-1">Add Banner</button>
                        <button class="btn btn-danger mb-1" type="reset" onclick="reset_content()">Reset Content</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection