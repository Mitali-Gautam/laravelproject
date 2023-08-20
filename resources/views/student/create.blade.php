@extends('layouts.app')

@section("content")
    <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Student Info </h3>
        @if (session()->has("success"))
            <p class="font-weight-bold text-success">{{session("success")}}</p>
        @endif
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('students')}}">Students</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Student</li>
          </ol>
        </nav>
      </div>
      <div class="row">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <form class="form-sample" name="student_info" method="post" action="{{ route('students.store') }}">
                @csrf
                <p class="card-description"> Personal info </p>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" >Student Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Student Name" name="name" value="{{ old('name')}}"/>
                      </div>
                      @error('name')
                        <div class="alert text-danger" role="alert">
                            {{ $message }}
                        </div>
                     @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Gender</label>
                      <div class="col-sm-9">
                        <select name="gender" class="form-control">
                            <option value="">Choose an option</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Class</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" placeholder="Class" name="class" value="{{ old('class') }}"  />
                            </div>
                            @error('class')
                            <div class="alert text-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Address</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" placeholder="Address" name="address" value=""  >{{ old('address')}}</textarea>
                      </div>
                        @error('address')
                        <div class="alert text-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                  </div>

                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Contact Number</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Phone" name="phone" value="{{ old('phone') }}"   />
                      </div>
                        @error('phone')
                        <div class="alert text-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}"  />
                      </div>
                      @error('email')
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
  </div>
  @endsection("content")
