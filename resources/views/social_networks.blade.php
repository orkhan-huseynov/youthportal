<div class="row margin_class">
    <div class="col-sm-12 col-md-12 news_category_container hover_class">
        <p class="video_text"><span class="news_category_span">@if (($lang ?? '') == 'az') Bizə qoşulun @else Присоединяйтесь к нам @endif</span></p>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-4 networks_cards_container">
        <div class="networks_card networks_card_first">
            <img class="card_img" src="{{ asset('images/f.png') }}" alt="facebook">
            {{--<div class="card_body">--}}
                {{--<p class="card_text"><span class="networks_numbers">7.000</span><span class="networks_second_span">@if($lang == 'az') izləyici @else подписчиков @endif</span></p>--}}
            {{--</div>--}}
        </div>
    </div>
    <div class="col-sm-12 col-md-4 networks_cards_container">
        <div class="networks_card networks_card_second">
            <img class="card_img" src="{{ asset('images/o-TWITTER-570.jpg') }}" alt="facebook">
            {{--<div class="card_body">--}}
                {{--<p class="card_text"><span class="networks_numbers">3.000</span><span class="networks_second_span">followers</span></p>--}}
            {{--</div>--}}
        </div>
    </div>
    <div class="col-sm-12 col-md-4 networks_cards_container">
        <div class="networks_card networks_card_third">
            <img class="card_img" src="{{ asset('images/how-to-create-rss-feed-joomla-3x.jpg') }}" alt="facebook">
            {{--<div class="card_body">--}}
                {{--<p class="card_text"><span>@if($lang == 'az') Rss vasitəsi ilə izləyin @else Следите через Rss @endif</span></p>--}}
            {{--</div>--}}
        </div>
    </div>
</div>