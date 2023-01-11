@extends('layout.app')

@section('subtitle')
category
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit Category</h3>
      <div class="card-tools">
        <!-- Buttons, labels, and many other things can be placed here! -->
        <!-- Here is a label for example -->


      </div>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form method="post" action="{{ route('category.update') }}">
            @csrf
            <input type="hidden" name="categoryId" value="{{ $category->categoryId }}" />
            <div class="row">
                <div class="col-6 form-group">
                    <label class="form-label"> Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $category->name }}" />
                 </div>
                 <div class="col-12 form-group">
                    <label class="form-label">Description </label>
                    <textarea type="text" name="description" class="form-control">{{ $category->description }}</textarea>
                 </div>
                 <div class="col-4 form-group">
                   <input type="submit" value="update" class="btn btn-success" />
                 </div>
            </div>
        </form>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">

    </div>
    <!-- /.card-footer -->
  </div>
  <!-- /.card -->

@endsection
