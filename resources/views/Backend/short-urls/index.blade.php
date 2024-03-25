@extends('layouts.master')
@section('title', 'List | Urls')
@section('content')

<!-- Breadcrumb -->
<div class="breadcrumb-area mb-3">
    <div class="container">
        <nav aria-label="breadcrumb" class="p-2 bg-white breadcrumb-main rounded">
            <ol class="breadcrumb m-0 justify-content-start">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Short-Urls</li>
                <li class="breadcrumb-item active" aria-current="page">Short-Urls List</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Urls List Table -->
<section class="testimonial-list">
    <div class="container">
        <h2 class="mb-5 section-title border-bottom pb-3 text-center">Urls List</h2>
        <div class="row justify-content-center">
            @if (session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            @if (session('status'))
                <div class="alert alert-danger">{{session('status')}}</div>
            @endif
            <div class="col-lg-10 overflow-auto">
                <div class="text-end mb-3">
                    <a href="{{route('add-Urls')}}" class="btn btn-success">+ Add New Short Urls</a>
                </div>
                {{-- @if ($Urls->isEmpty()) --}}
                    <h4 class="text-black text-center">No Url List Not Found....</h4>
                @else
                <table class="w-100 bg-white text-center" id="table-list">
                    <tr class="border-top border-bottom">
                        <th class="py-3 px-1">S.N</th>
                        <th class="py-3 px-1">Code</th>
                        <th class="py-3 px-1">Link</th>
                        <th class="py-3 px-1">Action</th>
                    </tr>
                    {{-- @foreach ($Urls as $url) --}}
                    {{-- <tr>
                        <td class="py-3 px-1">{{$loop->iteration}}</td>
                        <td class="py-3 px-1">{{Str::limit($url->title,40)}}</td>
                            <td class="py-3 px-1">
                                <a href="{{ url('admin/edit-short-url/'.$url->id) }}" class="btn btn-success mb-1">Edit</a>
                                <button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#deleteModal_{{ $url->id }}">
                                    Delete
                                </button>
                            </td>
                        </td>
                    </tr> --}}
                    {{-- modal starts --}}
                    {{-- <div class="modal fade" id="deleteModal_{{ $url->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Url</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this Short Url?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                                    <form id="deleteUrlForm" action="{{ url('admin/delete-short-url/'.$url->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach --}}
                </table>
                {{-- {{ $urls->links() }} --}}
                {{-- @endif   --}}
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('button[data-bs-target^="#deleteModal"]').on('click', function() {
            const urlId = $(this).data('url-id');
            $('#deleteUrlForm_' + urlId).attr('action', '{{ url("admin/delete-url") }}/' + urlId);
        });

        $('#deleteUrlForm').on('submit', function(e) {
            e.preventDefault();
        });
    });
</script>
@endsection