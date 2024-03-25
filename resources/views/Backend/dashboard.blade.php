@extends('layouts.master')
@section('title', 'Admin | Dashboard')
@section('content')
    
<!-- Breadcrumb -->
<div class="breadcrumb-area mb-3">
  <div class="container">
    <nav
      aria-label="breadcrumb"
      class="bg-white p-2 breadcrumb-main rounded"
    >
      <ol class="breadcrumb m-0 justify-content-start">
        <li class="breadcrumb-item active" aria-current="page">
          Dashboard
        </li>
      </ol>
    </nav>
  </div>
</div>

<section class="dashboard-details mb-3">
  <div class="container">
    <h3 class="mb-4" id="user">Welcome, {{auth()->user()->name}}</h3>
    <div class="row">
        <!-- Weather -->
        <div class="col-lg-8 mb-3">
            <div class="weather">
                <div id="weather-data" class="text-end">
                    <div id="weather-details">
                        <p class="mb-0 fs-2 fw-lighter"><span id="time"
                                class="fs-2 fw-semibold me-2"></span> | <span id="temp"
                                class="fs-2 fw-semibold ms-2"></span>
                            <img src="" alt="Loading" id="weatherimg" height="60" width="60">
                        </p>
                        <p id="weather-description" class="text-capitalize mb-1"></p>
                        <p id="weather-location" class="fs-5 fw-medium"></p>
                        <p id="weather-error"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</section>

<script src="{{asset('assets/js/weather.js')}}"></script>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('button[data-bs-target^="#deleteModal"]').on('click', function() {
            const messageId = $(this).data('message-id');
            $('#deleteMessageForm_' + messageId).attr('action', '{{ url("admin/delete-message") }}/' + messageId);
        });

        $('#deleteMessageForm').on('submit', function(e) {
            e.preventDefault();
        });
    });
</script>
@endsection