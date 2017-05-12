@extends('abyskit::dashboard')

@section('content')
    <div class="content-area">
        <div class="content-area__header s-flex s-flex-middle s-flex-justify">
            <div>
                <p class="content-area__title">{{$item->title()}}</p>
            </div>
            <div>
                <a href="{{route('abyskit.category.create.page')}}" class="button button--primary">{{trans('abyskit::actions.add_name', ["name" => trans("abyskit::default.category")])}}</a>
            </div>
        </div>
        <div class="content-area__bar s-flex s-flex-middle s-flex-justify">
            <div>
                <ul class="pagination-page">
                    <li class="pagination-page__item">
                        <a href="{{route('abyskit.dashboard.page')}}" class="pagination-page__link"><i class="pagination-page__icon fa fa-home"></i></a>
                    </li>
                    <li class="pagination-page__item">
                        <a href="{{route('abyskit.category.list.page')}}" class="pagination-page__link">{{trans('abyskit::default.categories')}}</a>
                    </li>
                    <li class="pagination-page__item">
                        <p class="pagination-page__text">{{$item->title()}}</p>
                    </li>
                </ul>
            </div>
            <div>
            </div>
        </div>
        <div class="content-area__content">
            <div class="panel">
                <div class="panel__content">
                    <div class="panel__row">
                        @if(session()->has('success'))
                            <div class="alert alert--success alert--margin">
                                <small class="alert__text">{{ ucfirst(session()->get('success')) }}</small>
                            </div>
                        @endif
                        <form action="{{route('abyskit.category.update', ['id' => $item->id])}}" class="form s-border-bottom-light" method="post"  enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form__control">
                                <div class="s-flex s-flex-justify">
                                    <div class="s-flex-grow">
                                        <div class="form__control">
                                            <div class="form__control">
                                                <label class="form__label">{{ucfirst(trans('abyskit::validation.attributes.slug'))}}</label>
                                                <input type="text" name="slug" class="form__input" value="{{$item->slug}}">
                                            </div>
                                            @if($errors->has('slug'))
                                                <div class="alert alert--danger alert--margin">
                                                    <small class="alert__text">{{$errors->first('slug')}}</small>
                                                </div>
                                            @endif
                                            <div class="form__control">
                                                <label for="" class="form__label">{{ucfirst(trans('abyskit::default.parent'))}}</label>
                                                <select name="category_parent_id" class="form__select">
                                                    <option value="0" selected>{{ucfirst(trans('abyskit::default.parent'))}}</option>
                                                    @if(count($list))
                                                        @foreach($list as $listItem)
                                                            <option value="{{$listItem->id}}" {{($item->category_parent_id == $listItem->id) ? 'selected': ''}}>{{$listItem->title()}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="form__control">
                                                <label class="form__label">{{ucfirst(trans('abyskit::default.status'))}}</label>
                                                <select name="status" class="form__select">
                                                    <option value="1" {{($item->status == 1) ? 'selected' : ''}}>{{trans('abyskit::default.active')}}</option>
                                                    <option value="0" {{($item->status == 0) ? 'selected' : ''}}>{{trans('abyskit::default.disabled')}}</option>
                                                </select>
                                            </div>
                                            <div class="form__control">
                                                <label for="" class="form__label">{{ucfirst(trans('abyskit::default.for_product'))}}</label>
                                                <select name="product" class="form__select">
                                                    <option value="1" {{($item->product == 1) ? 'selected': ''}}>{{ucfirst(trans('abyskit::default.yes'))}}</option>
                                                    <option value="0" {{($item->product == 0) ? 'selected': ''}}>{{ucfirst(trans('abyskit::default.no'))}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="s-flex-shrink-false">
                                        <div class="thumbnail-input">
                                            <div class="thumbnail-input__image" style="background-image: url({{$item->thumbnail}})"></div>
                                            <div class="thumbnail-input__context">
                                                <label for="thumbnail"></label>
                                                <input type="file" name="thumbnail" id="thumbnail" class="form__file">
                                            </div>
                                        </div>
                                        @if($errors->has('thumbnail'))
                                            <div class="alert alert--danger alert--margin" style="margin-left: 10px;">
                                                <small class="alert__text">{{$errors->first('thumbnail')}}</small>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <br>
                                <div class="form__control s-text-right">
                                    <button class="button button--success">{{trans('abyskit::actions.update')}}</button>
                                </div>
                                <br>
                            </div>
                        </form>
                        <?php $itemInfo = $item->info->get()->keyBy('locale_id'); ?>
                        @if(count($itemInfo))
                            <br>
                            <form class="form s-border-bottom-light" action="{{route('abyskit.category.info.update')}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="info" value="1">

                                @if($errors->has("check_locale_fields"))
                                    <div class="form__control alert alert--danger">
                                        <small class="alert__text">{{$errors->first("check_locale_fields")}}</small>
                                    </div>
                                    <br>
                                @endif
                                <div class="tab form__control">
                                    <div class="form__control">
                                        <label for="">{{ucfirst(trans('abyskit::default.languages'))}}</label>
                                    </div>
                                    <div class="form__control">
                                        @foreach($itemInfo as $key => $value)
                                            <button type="button" class="button{{($loop->first) ? ' button--active' : ''}} tab__button">{{$value->locale->name}}</button>
                                        @endforeach
                                    </div>
                                    @foreach($itemInfo as $key => $value)
                                        <div class="tab__item {{($loop->first) ? 'tab__item--active' : ''}}">
                                            <div class="tab__context  form__control">
                                                <label for="" class="form__label">{{ucfirst(trans("abyskit::validation.attributes.title"))}}</label>
                                                <input type="text" class="form__input" name="info[{{$value->id}}][title]" value="{{$value->title}}">
                                                @if($errors->has("info." . $value->id . ".title"))
                                                    <div class="form__control alert alert--danger alert--margin">
                                                        <small class="alert__text">{{$errors->first("info." . $value->id . ".title")}}</small>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="tab__context  form__control">
                                                <label for="" class="form__label">{{ucfirst(trans("abyskit::validation.attributes.price_measurement"))}}</label>
                                                <input type="text" class="form__input" name="info[{{$value->id}}][price_measurement]" value="{{$value->price_measurement}}">
                                                @if($errors->has("info." . $value->id . ".price_measurement"))
                                                    <div class="form__control alert alert--danger alert--margin">
                                                        <small class="alert__text">{{$errors->first("info." . $value->id . ".price_measurement")}}</small>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="form__control">
                                                <label for="" class="form__label">{{ucfirst(trans("abyskit::validation.attributes.excerpt"))}}</label>
                                                <textarea name="info[{{$value->id}}][excerpt]" class="form__textarea">{{$value->excerpt}}</textarea>
                                                @if($errors->has("info." . $value->id . ".excerpt"))
                                                    <div class="form__control alert alert--danger alert--margin">
                                                        <small class="alert__text">{{$errors->first("info." . $value->id . ".excerpt")}}</small>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <br>
                                <div class="form__control s-text-right">
                                    <button class="button button--success">{{trans('abyskit::actions.update')}}</button>
                                </div>
                                <br>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection