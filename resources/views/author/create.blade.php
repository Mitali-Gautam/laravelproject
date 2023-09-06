@extends('layouts.app')

@section("content")
    <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Author Info </h3>
        @if (session()->has("success"))
            <p class="font-weight-bold text-success">{{session("success")}}</p>
        @endif
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('authors')}}">Authors</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add author</li>
          </ol>
        </nav>
      </div>
      <div class="row">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <form class="form-sample" name="author_info" method="post" action="{{ route('authors.store') }}">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" >Author Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="author Name" name="name" value="{{ old('name')}}"/>
                      </div>
                      @error('name')
                        <div class="alert text-danger" role="alert">
                            {{ $message }}
                        </div>
                     @enderror
                    </div>
                  </div>
                </div>
                <input type="submit" class="btn btn-primary mr-2" name="submit" value="Submit">
                <button class="btn btn-light">Cancel</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
        </div>
      </footer>
      <!-- partial -->
  </div>
  @endsection("content")
