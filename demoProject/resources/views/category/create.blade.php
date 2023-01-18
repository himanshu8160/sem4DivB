@extends('layout.app')

@section('subtitle')
category
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Category</h3>
      <div class="card-tools">
        <!-- Buttons, labels, and many other things can be placed here! -->
        <!-- Here is a label for example -->


      </div>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form method="post" action="{{ route('category.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-12 form-group">
                <label class="form-label"> Image</label>
                <input type="file" name="imagePath" class="form-control" value="{{ old('imagePath') }}" />
             </div>
                <div class="col-6 form-group">
                    <label class="form-label"> Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" />
                 </div>
                 <div class="col-12 form-group">
                    <label class="form-label">Description </label>
                    <textarea type="text" name="description" class="form-control">
                        {{ old('description') }}
                    </textarea>
                 </div>
                 <div class="col-4 form-group">
                   <input type="submit" value="create" class="btn btn-success" />
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
