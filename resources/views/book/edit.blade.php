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
            <li class="breadcrumb-item"><a href="{{route('books')}}">Books</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Book</li>
          </ol>
        </nav>
      </div>
      <div class="row">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <form class="form-sample" name="bookinfo" method="post" action="{{ route('book.update',$book->id) }}">
                @csrf,
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" >Book Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Book Name" name="name" value={{$book->name}} required/>
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
                      <label class="col-sm-3 col-form-label">Category</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="category_id">
                            <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    @if ($category->id == $book->category_id)
                                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                    @else
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endif
                                @endforeach
                        </select>
                        @error('category_id')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>
                    </div>
                  </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Author</label>
                        <div class="col-sm-9">
                          <select class="form-control" name="author_id">
                              <option value="">Select Author</option>
                                  @foreach ($authors as $author)
                                    @if ($author->id == $book->author_id)
                                      <option value="{{ $author->id }}" selected>{{ $author->name }}</option>
                                    @else
                                      <option value="{{ $author->id }}">{{ $author->name }}</option>
                                    @endif
                                  @endforeach
                              </select>
                          </select>
                          @error('author_id')
                              <div class="alert alert-danger" role="alert">
                                  {{ $message }}
                              </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Author</label>
                        <div class="col-sm-9">
                            <select class="form-control @error('publisher_id') isinvalid @enderror " name="publisher_id" required>
                                <option value="">Select Publisher</option>
                                @foreach ($publishers as $publisher)
                                    @if ($publisher->id == $book->publisher_id)
                                        <option value="{{ $publisher->id }}" selected>{{ $publisher->name }}</option>
                                    @else
                                        <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('publisher_id')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
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
