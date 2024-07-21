!-- ***** Main Banner Area Start ***** -->
    @php
    $photos = App\Models\Photo::all();
@endphp

<div id="top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="left-content">
                    <div class="inner-content">
                        <h4>KlassyCafe</h4>
                        <h6>THE BEST EXPERIENCE</h6>
                        <div class="main-white-button scroll-to-section">
                            <a href="#reservation">Make A Reservation</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="main-banner header-text">
                    <div class="Modern-Slider">
                        @foreach ($photos as $photo)
                            <div class="item">
                                <div class="img-fill">
                                    <img src="{{ asset($photo->path) }}" alt="Slide Image">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- ***** Main Banner Area End ***** -->
