@extends('layouts.app')

@section("content")
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Basic Tables </h3>
        @if (session()->has("success"))
            <p class="font-weight-bold text-success">{{session("success")}}</p>
        @endif
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li><a href="{{route('students.create')}}" class="btn btn-primary btn-icon-text"> Add Student <i class="icon-plus"></i></a></li>
          </ol>
        </nav>
      </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Students List</h4>
              </p>
              <table class="table table-bordered table-hover table-striped table-responsive">
                <thead>
                  <tr>
                    <th> # </th>
                    <th> Student Name </th>
                    <th> Gender </th>
                    <th> Email </th>
                    <th> Phone </th>
                    <th> Class </th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <td> {{$student->id}} </td>
                        <td> {{$student->name}} </td>
                        <td> {{ucfirst($student->gender)}} </td>
                        <td> {{$student->email}} </td>
                        <td> {{$student->phone}} </td>
                        <td> {{$student->class}} </td>
                        <td><a href="{{route('students.edit',$student->id)}}" class="btn btn-dark btn-icon-text"> Edit <i class="icon-doc btn-icon-append"></i></a></td>
                        <td><a href="{{route('students.delete',$student->id)}}" class="btn btn-danger btn-icon-text"> Delete <i class="icon-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
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
