<div class="sidebar-widget wow fadeInUp">
    <h3 class="section-title">shop by</h3>
    <div class="widget-header">
    <h4 class="widget-title">Category</h4>
    </div>
    <div class="sidebar-widget-body">
        <div class="accordion">
            @foreach($categories as $category)
            <div class="accordion-group">
                <div class="accordion-heading"> <a href="#collapse{{$category->id}}" data-toggle="collapse" class="accordion-toggle collapsed"> @if(session()->get('language') == 'myanmar') {{$category->category_name_mm}} @else {{$category->category_name_en}} @endif </a> </div>
                <!-- /.accordion-heading -->
                <div class="accordion-body collapse" id="collapse{{$category->id}}" style="height: 0px;">
                    <div class="accordion-inner">
                    @php
                    $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name_en','ASC')->get();
                    @endphp
                    @foreach($subcategories as $subcategory)
                        <ul>
                        <li>
                        <a href="{{url('subcategory/'.$subcategory->subcategory_slug_en).'/'.$subcategory->id}}">
                        @if(session()->get('language') == 'myanmar') {{$subcategory->subcategory_name_mm}} @else {{$subcategory->subcategory_name_en}} @endif  
                        </a>
                        </li>
                        </ul>
                    @endforeach
                    </div>
                    <!-- /.accordion-inner --> 
                </div>
                <!-- /.accordion-body --> 
            </div>
            <!-- /.accordion-group -->
            @endforeach
        </div>
        <!-- /.accordion --> 
    </div>
    <!-- /.sidebar-widget-body --> 
</div>
<!-- /.sidebar-widget --> 