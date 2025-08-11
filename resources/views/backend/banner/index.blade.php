@extends('backend.template.index')
@section('content')

<div class="container">
 <div class="card mt-4">
    <div class="card-header">
    <h3 class="card-title">Banner</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
    <table class="table">
        <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Task</th>
            <th>Progress</th>
            <th style="width: 40px">Label</th>
        </tr>
        </thead>
        <tbody>
        <tr class="align-middle">
            <td>1.</td>
            <td>Update software</td>
            <td></td>
            <td><span class="badge text-bg-danger">55%</span></td>
        </tr>
        </tbody>
    </table>
    </div>
    <!-- /.card-body -->
</div>

</div>

@endsection