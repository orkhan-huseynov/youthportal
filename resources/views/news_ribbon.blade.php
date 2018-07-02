<div class="row">
    <div class="col-sm-12 col-md-12 news_category_container hover_class">
        <p class="line_width ribbon_text"><span class="news_category_span">@if ($lang == 'ru') Новостная лента @else Xəbər lenti @endif </span></p>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12 comments_container_margin">
        @foreach ($news as $news_item)
            @if ($news_item->getTable() == 'photogalleries')
                <div class="life_style_comments_container">
                    <a href="{{url($lang.'/photogallery_details/'.$news_item->id)}}" class="life_style_comments_container_text">
                        <p class="life_style_comments_container_text title_style">@if ($lang == 'az') {{ $news_item->name_az }} @else {{ $news_item->name_ru }} @endif</p>
                    </a>
                    <p class="popular_news_time">{{$news_item->activity_start->format('d.m.Y H:i')}} // @if ($lang == 'az') Foto @else Фото @endif</p>
                    <div class="line_p_margin_3"><p class="line_p_2"></p></div>
                </div>
            @else
                <div class="life_style_comments_container">
                    <a href="{{url($lang.'/news_details/'.$news_item->id)}}" class="life_style_comments_container_text">
                        <p class="life_style_comments_container_text title_style @if ($news_item->important) title_style_important @endif @if ($news_item->very_important) title_style_very_important @endif">{{$news_item->name}}</p>
                    </a>
                    <p class="popular_news_time">{{$news_item->activity_start->format('d.m.Y H:i')}} // @if($lang == 'az') {{ ($news_item->section != null)? $news_item->section->name_az : '' }} @else {{ ($news_item->section != null)? $news_item->section->name_ru : '' }} @endif</p>
                    <div class="line_p_margin_3"><p class="line_p_2"></p></div>
                </div>
            @endif
        @endforeach
    </div>
</div>