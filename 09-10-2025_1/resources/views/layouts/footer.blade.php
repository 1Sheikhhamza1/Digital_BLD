<footer id="footer" class="footer dark-background">

  <div class="container footer-top">

    <div class="row gy-4">
      <div class="col-lg-4 col-md-6 footer-about">
        <a href="{{ route('home') }}" class="text-decoration-none">
          <img src="{{ asset('frontend/assets/img/logo.png') }}" alt="Logo" style="width: 80px; height: 80px; margin-left:20%; display: block;" />
          <span class="sitename mt-2 text-start w-100">Bangladesh Legal Decisions</span>
        </a>
      </div>
      <div class="col-lg-4 col-md-12"></div>
      <div class="col-lg-4 col-md-12 d-flex">
        <h4 class="mt-2">Follow Us</h4>
        <div class="social-links d-flex ms-5">
          <a href="#"><i class="bi bi-twitter-x"></i></a>
          <a href="#"><i class="bi bi-facebook"></i></a>
          <a href="#"><i class="bi bi-instagram"></i></a>
          <a href="#"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>
    </div>


    <div class="row gy-4">
      <div class="col-lg-3 col-md-6 footer-about">
        <div class="footer-contact pt-3">{{ $homePageContent ? strip_tags(limit_description($homePageContent->content, 200)) : '' }}</div>
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
        <h4>Our Services</h4>
        <ul>
          <li><a href="{{ route('service') }}">Quick Links</a></li>
          <li><a href="{{ route('team') }}">Our Team</a></li>
          <li><a href="{{ route('package') }}">Packages</a></li>
          <li><a href="{{ route('blog') }}">Blog</a></li>
          <li><a href="{{ route('photo') }}">Photo Gallery</a></li>
          <li><a href="{{ route('video') }}">Video Gallery</a></li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-12 footer-newsletter">
        <h4>Contact Us</h4>
        <div class="footer-contact">
          {!! $contactPage ? $contactPage->content : '' !!}
        </div>
      </div>


    </div>
  </div>

  <div class="container copyright text-center mt-4">
    <p>&copy; {{ date('Y')}}<span>Copyright</span> <strong class="px-1 sitename">Bangladesh Legal Decisions</strong> <span>All Rights Reserved</span></p>
    <div class="credits">
      Designed & Developed by <a href="https://legalizedbd.com/" class="text-danger text-decoration-none">Legalized Education Bangladesh Ltd</a>
    </div>
  </div>

</footer>