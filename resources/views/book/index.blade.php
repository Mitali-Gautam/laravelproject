@extends('layouts.app')

@section("content")
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Books List </h3>
        @if (session()->has("success"))
            <p class="font-weight-bold text-success">{{session("success")}}</p>
        @endif
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li><a href="{{route('book.create')}}" class="btn btn-primary btn-icon-text"> Add Book <i class="icon-plus"></i></a></li>
          </ol>
        </nav>
      </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <table class="table table-bordered table-hover table-striped table-responsive">
                <thead>
                  <tr>
                    <th> Book Name </th>
                    <th> Category </th>
                    <th> Publisher</th>
                    <th> Author</th>
                    <th>  </th>
                    <th>  </th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                    <tr>
                        <td> {{$book->name}} </td>
                        <td> {{$book->category->name}} </td>
                        <td> {{$book->publisher->name}} </td>
                        <td> {{$book->author->name}} </td>
                        <td><a href="{{route('book.edit',$book->id)}}" class="btn btn-dark btn-icon-text btn-sm"> Edit <i class="icon-doc btn-icon-append icon-sm"></i></a></td>
                        <td><a href="{{route('book.delete',$book->id)}}" class="btn btn-danger btn-icon-text btn-sm"> Delete <i class="icon-trash icon-sm"></i></a></td>
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
