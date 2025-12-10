<footer id="footer" class="footer dark-background">

  <div class="container footer-top">
    <div class="row">
      <div class="col-lg-3 col-md-6 mt-3">
        <a href="{{ route('home') }}" class="text-decoration-none">
          <img src="{{ asset('frontend/assets/img/logo.png') }}" alt="Logo" style="width: 120px; height: 120px;margin-left:30px; margin-bottom:15px; display: block;" />
          <span class="sitename text-start w-100"  style="margin-left:35px !important">Digital BLD</span>
        </a>

          <!-- <div class="social-links d-flex mt-3">
            <a href="#"><i class="bi bi-twitter-x"></i></a>
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-linkedin"></i></a>
          </div> -->
      </div>

      <div class="col-lg-3 col-md-3 footer-links">
        <h4>Discover</h4>
        <ul>
          @foreach($footerPages as $fpage)
          <li><a href="{{ getPageUrl($fpage) }}">{{ $fpage->title }}</a></li>
          @endforeach
        </ul>
      </div>

      <div class="col-lg-3 col-md-3 footer-links">
        <h4>Quick Links</h4>
        <ul>
          <li><a href="{{ route('service') }}">Our Service</a></li>
          <li><a href="{{ route('team') }}">Our Team</a></li>
          <li><a href="{{ route('package') }}">Packages</a></li>
          <li><a href="{{ route('faq') }}">FAQ</a></li>
          <!-- <li><a href="{{ route('photo') }}">Photo Gallery</a></li> -->
          <!-- <li><a href="{{ route('video') }}">Video Gallery</a></li> -->
        </ul>
      </div>

      <div class="col-lg-3 col-md-12  footer-links">
        <h4>Contact Us</h4>
        <div class="footer-contact">
          {!! $contactPage ? $contactPage->content : '' !!}
        </div>
      </div>


    </div>

    <img src="{{ asset('frontend/assets/img/ssl_logo.png')}}" alt="ssl commerze" style="width: 100%; height:auto">
  </div>

  <div class="container copyright text-center mt-4">
    <p>&copy; {{ date('Y')}}<span>Copyright</span> <strong class="px-1 sitename">Bangladesh Bar Council</strong> <span>All Rights Reserved</span></p>
    <div class="credits">
      Designed & Developed by <a href="https://legalizedbd.com/" class="text-danger text-decoration-none">Legalized Education Bangladesh Ltd</a>
    </div>
  </div>

</footer>