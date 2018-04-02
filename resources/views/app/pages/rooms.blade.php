@extends("app.admin_app")

@section("content")

<div class="content">
  <h2 class="content-heading">Trading en vivo</h2>


  @if (count($rooms)> 0)


  @foreach($rooms as $room)

      <div class="col-md-6 col-lg-4 col-xl-3 animated fadeIn">
        <div class="options-container fx-item-zoom-in fx-overlay-slide-down">
            <img class="img-fluid options-item" src="http://www.mlmhonesto.com/wp-content/uploads/artis-global-club.jpg" alt="">
            <div class="options-overlay bg-black-op-75">
                <div class="options-overlay-content">
                    <h4 class="h4 text-white mb-5">{{$room->name}}</h4>
                    <a class="btn btn-tca btn-sm btn-rounded btn-noborder min-width-75 img-lightbox" href="/app/rooms/{{$room->id}}">
                        <i class="fa fa-search-plus"></i> Ver
                          </a>
                      </div>
                  </div>
              </div>
      </div>

    @endforeach

  @else


      <div class="row">
          <div class="col-12 col-md-12 col-xl-12 offset-md-5">

                   <a class="block block-link-shadow text-center" href="javascript:void(0)">
                       <div class="block-content">
                       <p class="mt-5">
                           <i class="fa fa-video-camera fa-4x"></i>
                       </p>
                       <p class="font-w600">No hay transmisiones en vivo en este momento</p>
                   </div>
               </a>
           </div>
      </div>

  @endif
</div>


@endsection
