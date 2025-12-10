<section id="services" class="how-it-works section light-background">
    <div class="container">
        <h2 class="inner-title">{{ $section['title'] ?? 'How Digital BLD Works?' }}</h2>
        <p>{!! $homepageData['howToBldWorks'] ? $homepageData['howToBldWorks']->content : '' !!}</p>
        @if(isset($homepageData['howToBldWorks']) && $homepageData['howToBldWorks']!="")
        <div class="row gy-4">

            @if(isset($homepageData['howToBldWorks']->children) && count($homepageData['howToBldWorks']->children))
            @foreach($homepageData['howToBldWorks']->children as $howToWorks)
            <div class="col-lg-3 col-md-6">
                <div class="works-item">
                    <div class="number-circle large">1</div>
                    <a href="#">
                        <h3>{{ $howToWorks->title }}</h3>
                    </a>
                    <p>{!! $howToWorks->content !!}</p>
                </div>
            </div>
            @endforeach
            @endif
        </div>
        @endif
    </div>
</section>