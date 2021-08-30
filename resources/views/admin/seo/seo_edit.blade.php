@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">            
            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                    <h3 class="box-title">Edit SEO Setting</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{route('seo.update')}}">
                                @csrf     
                                <input type="hidden" name="id" value="{{$seo->id}}"> 
                           
                                <div class="form-group">
                                    <h5>Meta Title <span class="text-danger"></span></h5>
                                    <div class="controls">
                                        <input type="text"  name="meta_title" value="{{$seo->meta_title}}" class="form-control">
                                        
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <h5>Meta Author <span class="text-danger"></span></h5>
                                    <div class="controls">
                                        <input type="text"  name="meta_author" value="{{$seo->meta_author}}" class="form-control">
                                        
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <h5>Meta Tag <span class="text-danger"></span></h5>
                                    <div class="controls">
                                        <input type="text"  name="meta_tag" value="{{$seo->meta_tag}}" class="form-control">
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <h5>Meta Description <span class="text-danger"></span></h5>
                                    <div class="controls">
                                            <textarea id="editor1" name="description" rows="10" cols="80">
                                            {!!$seo->description!!}
                                        </textarea>                                         
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Google Analytics <span class="text-danger"></span></h5>
                                    <div class="controls">
                                            <textarea id="editor2" name="google_analytics" rows="10" cols="80">
                                            {!!$seo->google_analytics!!}
                                        </textarea>                                         
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Bing Analytics <span class="text-danger"></span></h5>
                                    <div class="controls">
                                            <textarea id="editor3" name="bing_analytics" rows="10" cols="80">
                                            {!!$seo->bing_analytics!!}
                                        </textarea>                                         
                                    </div>
                                </div>
                                
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update SEO">
                                </div>
                            </form>
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
