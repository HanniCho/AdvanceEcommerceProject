@extends('admin.admin_master')
@section('admin')
<div class="container-full">
	<section class="content">
        <div class="box">
			<div class="box-header with-border">
			  <h3 class="box-title">Search Report </h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			    <div class="row">
				    <div class="col">
                        
                        <div class="row">
                            <div class="col-12">                                    
                                <div class="row"> 
                                    <div class="col-md-4">
                                        <form method="POST" action=""> 
                                            @csrf 
                                            <div class="form-group">
                                                <h5>Search by Date<span class="text-danger"></span></h5>
                                                <div class="controls">
                                                <input type="date" name="order_date" class="form-control">
                                                </div>
                                            </div>
                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Search">
                                            </div>
                                        </from>
                                    </div> <!-- end col md 4 -->

                                    <div class="col-md-4">
                                        <form method="POST" action=""> 
                                            @csrf 
                                            <div class="form-group">
                                                <h5>Search by Month <span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <select name="order_month" class="form-control">
                                                        <option value="" selected="" disabled="">Select Month</option>
                                                        <option value="January">January</option>	
                                                        <option value="February">February</option>	
                                                        <option value="March">March</option>	
                                                        <option value="April">April</option>	
                                                        <option value="May">May</option>	
                                                        <option value="June">June</option>	
                                                        <option value="July">July</option>	
                                                        <option value="August">August</option>	
                                                        <option value="September">September</option>	
                                                        <option value="October">October</option>	
                                                        <option value="November">November</option>	
                                                        <option value="December">December</option>	
                                                    </select>                                    
                                                </div>
                                            </div>
                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Search">
                                            </div>
                                        </form>
                                    </div> <!-- end col md 4 -->

                                    <div class="col-md-4">
                                        <form method="POST" action="{{route('search.by.year')}}"> 
                                            @csrf 
                                            <div class="form-group">
                                                <h5>Search by Year <span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <select name="order_year" class="form-control" >
                                                        <option value="" selected="" disabled="">Select Year</option>
                                                        
                                                        <option value="2018">2018</option>	
                                                        <option value="2019">2019</option>	
                                                        <option value="2020">2020</option>	
                                                        <option value="2021">2021</option>	
                                                    </select>                                    
                                                </div>
                                            </div>
                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Search">
                                            </div>  
                                        </form>                                          
                                    </div> <!-- end col md 4 -->
                                </div>  
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
			</div>
			<!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
	<!-- /.content -->
</div>

@endsection 