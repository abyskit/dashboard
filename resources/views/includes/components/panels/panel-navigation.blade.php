<ul class="panel-navigation">
    <li class="panel-navigation__item"><p class="panel-navigation__title">{{$panel_title}}</p></li>
    @foreach($panel_navigation as $nav_item)
        <li class="panel-navigation__item
                {{(strpos(Request::url(), $nav_item['url']) !== false) ? " panel-navigation__item--active" : ""}}
                {{(!empty($nav_item["count"])) ? " panel-navigation__item--has-count" : ""}}"
            data-count="{{(!empty($nav_item["count"])) ? $nav_item["count"] : ""}}">
            <a href="{{$nav_item['url']}}" class="panel-navigation__link">
                <i class="panel-navigation__icon fa {{$nav_item['icon']}}"></i>
                <span class="panel-navigation__text">{{$nav_item['title']}}</span>
            </a>
        </li>
    @endforeach
</ul>