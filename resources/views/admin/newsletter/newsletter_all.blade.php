@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">            
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">NewsLetter Lists</h3>
                        <a href="" class="btn btn-rounded btn-danger mb-5 float-right">Delete All</a>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Email</td>
                                        <td>Subscribing Time</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($newsletters as $item)
                                    <tr>
                                        <td>
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_4" name="special_offer" value="1">
                                                <label for="checkbox_4"></label>
                                            </fieldset>
                                        </td>
                                        <td>{{$item->email}}</td>
                                        <td>{{\Carbon\Carbon::parse($item->created_at)->diffforhumans()}}</td>
                                        
                                        <td width="15%">
                                            <a href="{{route('newsletter.delete',$item->id)}}" id="delete" class="btn btn-danger" title="Delete Data"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
            <!-- /.col -->
            
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->	  
</div>
@endsection