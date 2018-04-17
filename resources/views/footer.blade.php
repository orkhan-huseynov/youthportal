<footer>
    <div class="container-fluid">
        <div class="row footer_inner">
            <div class="col-sm-12 col-md-6 hover_class footer_category">
                <p class="footer_p footer_a"><span class="news_category_span">@if($lang == 'az') Naviqasiya @else Навигация @endif</span></p>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <ul class="footer_ul">
                                @php $i = 1; @endphp
                                @foreach($sections as $section)
                                    @if ($i == 6)
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <ul class="footer_ul">
                                    @endif
                                    <li><a href="{{url($lang.'/section/'.$section->id)}}"><i class="fa fa-chevron-right" aria-hidden="true"></i><span>  @if($lang == 'ru') {{' '.$section->name_ru}} @else {{' '.$section->name_az}} @endif</span></a></li>
                                    @php $i++; @endphp
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm-12 col-md-6 hover_class footer_category">
                <p class="footer_p footer_a"><span class="news_category_span">@if($lang == 'az') Haqqımızda @else О нас @endif</span></p>
                <p class="footer_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
        </div>
    </div>
</footer>