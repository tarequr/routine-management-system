<section class="slider_item">
    <div id="slider1" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner" role="listbox">
        <ol class="carousel-indicators">
          <li class="active" data-target="#slider1" data-slide-to="0"></li>
          <li data-target="#slider1" data-slide-to="1"></li>
          <li data-target="#slider1" data-slide-to="2"></li>
          <li data-target="#slider1" data-slide-to="3"></li>
          <li data-target="#slider1" data-slide-to="4"></li>
        </ol>
        <?php $count = 0; ?>
        @foreach($sliders as $slider)
        <div class="carousel-item @if($count == 0){ active } @endif">
          <img src="{{asset('public/upload/slider_images/'.$slider->image)}}" class="d-block img-fluid" style="width: 100%; height: 500px" alt="First Slide">

          <div class="carousel-caption">
            <h3 class="text-light">{{$slider->shortTitle}}</h3>
            <p class="text-light">{{$slider->longTitle}}</p>
          </div>
        </div>
        <?php $count++; ?>
        @endforeach
      </div>

        <a href="#slider1" class="carousel-control-prev" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a href="#slider1" class="carousel-control-next" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
    </div>
  </section>