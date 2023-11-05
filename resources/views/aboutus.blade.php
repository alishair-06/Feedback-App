@extends('pages.frontend2')

@section('title', 'Services Page')
@section('content')

    <!-- component 1 ........................................  -->
    <section class="ftco-section">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-6 d-flex ftco-animate">
                    {{-- <div class="img img-about align-self-stretch shadow" style="background-image: url(images/bg_3.jpg); width: 100%;"></div> --}}
                    <iframe class="shadow"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14529.909765167675!2d54.4350744!3d24.4342154!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5e43ee00489815%3A0xd0e42ae70c3056ce!2sKF%20hair%20studio!5e0!3m2!1sen!2s!4v1681926939580!5m2!1sen!2s"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-md-6 pl-md-5 ftco-animate">
                    <h2 class="mb-4">About K Mackup Studio</h2>
                    <p>Welcome to KF Spa and Beauty Salon, We are committed to using only the highest quality products and techniques to ensure that you receive the best possible results.</p>
                    <p>Our team of experienced and dedicated professionals are passionate about making you look and feel your best. We take pride in offering personalized treatments to meet your unique needs and preferences.</p>
                    <p>Whether you're looking for a relaxing massage, a rejuvenating facial, or a bold new hairstyle, we've got you covered. We offer a wide range of services to help you achieve your beauty goals.</p>
                    <h2 class="mb-4">Contact US</h2>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="card pl-2 rounded-0 border-0" style=""">
                                {{-- <h5 style="font-weight: 600 ; color:white"> Contact US</h5> --}}
                                <h6 style="font-weight: 500 ; padding:0px; color:#fa5bdd"><b><i class="fa-solid fa-phone"
                                            style="font-size: 16px ; color:black"></i>&nbsp; +2 392 3929 210</b></h6>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="card pl-2 rounded-0 border-0" style=""">
                                {{-- <h5 style="font-weight: 600 ; color:white"> Contact US</h5> --}}
                                <h6 style="font-weight: 500 ; padding:0px; color:#fa5bdd"><b><i class="fa-sharp fa-solid fa-envelope"
                                            style="font-size: 16px ; color:black"></i>&nbsp; info@yourdomain.com</b></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop


@push('script')
    <script>
        $(document).ready(function() {
            var url = 'https://wati-integration-service.clare.ai/ShopifyWidget/shopifyWidget.js?10400';
            var s = document.createElement('script');
            s.type = 'text/javascript';
            s.async = true;
            s.src = url;
            var options = {
                "enabled": true,
                "chatButtonSetting": {
                    "backgroundColor": "#fa5bdd",
                    "ctaText": "",
                    "borderRadius": "25",
                    "marginLeft": "0",
                    "marginBottom": "50",
                    "marginRight": "50",
                    "position": "right"
                },
                "brandSetting": {
                    "brandName": "K solutions",
                    "brandSubTitle": "Typically replies within a day",
                    "brandImg": "images/partner-1.jpg",
                    "welcomeText": "Hi there!\nHow can I help you?",
                    "messageText": "Hello, I have a question about ",
                    "backgroundColor": "#fa5bdd",
                    "ctaText": "Start Chat",
                    "borderRadius": "30",
                    "autoShow": false,
                    "phoneNumber": "+971 50 370 7186"
                }
            };
            s.onload = function() {
                CreateWhatsappChatWidget(options);
            };
            var x = document.getElementsByTagName('script')[0];
            x.parentNode.insertBefore(s, x);



        });
    </script>
@endpush
