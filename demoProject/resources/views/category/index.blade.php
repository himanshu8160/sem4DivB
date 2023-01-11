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

        <button type="button" class="btn btn-success btn-sm">
          <a href="{{ route('category.create') }}"> <i class="fas fa-plus">Add</i></a>
          </button>
      </div>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Sr.no</th>
              <th>Category Name</th>
              <th>Category Description</th>
              <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                <?php $count=1; ?>
                @foreach ($categories as $item)
                    <tr>
                        <td>{{ $count++ }} </td>

                        <td>{{ $item->name}} </td>
                        <td>
                            {{ $item->description }}
                        </td>
                        <td>
                            <a href="{{route('category.edit',['id'=>$item->categoryId])}}"  class="btn btn-success btn-sm"><i class="fas fa-edit"></i> </a>
                            <a href="{{route('category.destroy',['id'=>$item->categoryId])}}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">

    </div>
    <!-- /.card-footer -->
  </div>
  <!-- /.card -->

@endsection
