@extends('layouts.header')

@section('content')
<!-- Main Content Div után-->

<div class="responsive-container-block bigContainer">
        <div class="responsive-container-block Container">
          <div class="imgContainer">
            <img class="blueDots" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/aw3.svg">
            <img class="mainImg" src="{{ asset('storage/img/motor_about.webp') }}">
          </div>
          <div class="responsive-container-block textSide">
            <p class="text-blk heading">
              A cég
            </p>
            <p class="text-blk subHeading">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Eget purus lectus viverra in semper nec pretium mus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Eget purus lectus viverra in semper nec pretium mus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Eget purus lectus viverra in semper nec pretium mus.
            </p>
            <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
              <div class="cardImgContainer">
                <img class="cardImg" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/id2.svg">
              </div>
              <div class="cardText">
                <p class="text-blk cardHeading">
                  Teljesítmény
                </p>
                <p class="text-blk cardSubHeading">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                </p>
              </div>
            </div>
            <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
              <div class="cardImgContainer">
                <img class="cardImg" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/id2.svg">
              </div>
              <div class="cardText">
                <p class="text-blk cardHeading">
                  Megbízhatóság
                </p>
                <p class="text-blk cardSubHeading">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                </p>
              </div>
            </div>
            <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
              <div class="cardImgContainer">
                <img class="cardImg" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/id2.svg">
              </div>
              <div class="cardText">
                <p class="text-blk cardHeading">
                  Fejlesztés
                </p>
                <p class="text-blk cardSubHeading">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                </p>
              </div>
            </div>
            <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
              <div class="cardImgContainer">
                <img class="cardImg" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/id2.svg">
              </div>
              <div class="cardText">
                <p class="text-blk cardHeading">
                  Segítőkészség
                </p>
                <p class="text-blk cardSubHeading">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                </p>
              </div>
            </div>
            <a>
              <button class="explore">
                Tudj meg többet rólunk!
              </button>
            </a>
          </div>
          <img class="redDots" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/cw3.svg">
        </div>
      </div>

<!-- END Main Content Div lezárás előtt-->
@endsection

@extends('layouts.footer')