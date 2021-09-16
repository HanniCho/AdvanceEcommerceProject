@extends('frontend.main_master')
@section('main_content')
@section('title')
Contact Page
@endsection
@php
$setting = App\Models\Setting::first();
@endphp
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{url('/')}}">Home</a></li>
				<li class='active'>Contact</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content">
    <div class="container">
        <div class="contact-page">
            <div class="row">			
                <div class="col-md-12 contact-map outer-bottom-vs">
                    <a href="https://goo.gl/maps/7cuaskAmw9wnVNmXA"></a>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d490.43476495866753!2d95.58928802126148!3d22.55135340852831!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2smm!4v1630992786227!5m2!1sen!2smm" width="600" height="450" style="border:0;" allowfullscreen=""></iframe>
                </div>
                <div class="col-md-9 contact-form">
                    <div class="col-md-12 contact-title">
                        <h4>Contact Form</h4>
                    </div>
                    <form method="post" action="{{route('contact.store')}}" class="register-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputName">Your Name <span>*</span></label>
                                    <input type="text" name="name" class="form-control unicase-form-control text-input" id="exampleInputName" placeholder="">
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                    <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="">
                                    @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputTitle">Title <span>*</span></label>
                                    <input type="text" name="message_title" class="form-control unicase-form-control text-input" id="exampleInputTitle" placeholder="Title">
                                    @error('message_title')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputComments">Your Message <span>*</span></label>
                                    <textarea class="form-control unicase-form-control" name="message" placeholder="Message" id="exampleInputComments"></textarea>
                                    @error('message')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 outer-bottom-small m-t-20">
                                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Send Message</button>
                                </div>
                            </div>                            
                        </div>  
                    </form>                    
                </div>
                <div class="col-md-3 contact-info">
                    <div class="contact-title">
                        <h4>Information</h4>
                    </div>
                    <div class="clearfix address">
                        <span class="contact-i"><i class="fa fa-map-marker"></i></span>
                        <span class="contact-span">{{$setting->address}}</span>
                    </div>
                    <div class="clearfix phone-no">
                        <span class="contact-i"><i class="fa fa-mobile"></i></span>
                        <span class="contact-span">{{$setting->mobile}}<br>{{$setting->phone}}</span>
                    </div>
                    <div class="clearfix email">
                        <span class="contact-i"><i class="fa fa-envelope"></i></span>
                        <span class="contact-span"><a href="#">{{$setting->email}}</a></span>
                    </div>
                </div>			
            </div><!-- /.row -->
        </div><!-- /.contact-page -->
                    
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brands')
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div>
    </div>
</div>
@endsection