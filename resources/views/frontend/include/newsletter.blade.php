<div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
    <h3 class="section-title">Newsletters</h3>
    <div class="sidebar-widget-body outer-top-xs">
        <p>Subscribe for Our Newsletter!</p>
        <form method="post" action="{{route('newsletter.store')}}">
            @csrf
            <div class="form-group">
                <label class="sr-only" for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                @error('email')
                    <span class="text-danger">{{$message}}</span>   
                @enderror
            </div>
            <button class="btn btn-primary">Subscribe</button>
        </form>
    </div>
    <!-- /.sidebar-widget-body --> 
</div>
<!-- /.sidebar-widget --> 