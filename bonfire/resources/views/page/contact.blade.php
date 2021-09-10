@extends('redirect')

@section('content')

<div class="inner-header" style="transform: translateY(150px);">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Contact</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="trangchu">Home</a> / <span>Contact</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container" style="transform: translateY(150px); margin-bottom: 150px;">
    <div id="content">
         <div class="col">
            <div class="contact">
                <ul class="info">
                    <li style="padding: 15px 0;">
                        <span><i class="fas fa-map-marked"></i></span>
                        <span>14 L.E Goulburn St, Sydney 2000NSW</span><br>
                    </li>
                    <li style="padding: 15px 0;">
                        <span><i class="fas fa-phone-alt"></i></span>
                        <span><a href="tel:08819906868">(088) 1990 6886</a></span>
                    </li>
                    <li style="padding: 15px 0;">
                        <span><i class="fa fa-envelope"></i></span>
                        <span><a href="support@arrowhitech.com">Subcribe</a></span>
                    </li>
                </ul>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.3146397546843!2d105.78179631493245!3d21.02009288600308!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab4c50a6bcf7%3A0x6a91f7f04869ae43!2sArrowHiTech%20Jsc!5e0!3m2!1svi!2s!4v1631202133437!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
        <span class="span">
            Copyright © 2016 Bonfire
        </span>
    </div>
</div>
@endsection