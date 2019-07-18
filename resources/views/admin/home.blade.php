@extends('layouts.app')

@section('content')
<section class="show-all-posts">
  <div class="container pt-5">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Dashboard</div>

                  <div class="card-body">
                      @if (session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                      @endif

                      Sei loggato!
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
@endsection
