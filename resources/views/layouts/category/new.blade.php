@extends('abyskit::dashboard')

@section('content')
    <div class="content-area">
        <div class="content-area__header s-flex s-flex-middle s-flex-justify">
            <div>
                <p class="content-area__title">{{trans('abyskit::actions.add_name', ["name" => trans("abyskit::default.category")])}}</p>
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
                        <p class="pagination-page__text">{{trans('abyskit::actions.add_name', ["name" => trans("abyskit::default.category")])}}</p>
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
                        <form action="{{route('abyskit.category.store')}}" class="form" method="post">
                            {{csrf_field()}}
                            <div class="form__control s-text-right">
                                <button class="button button--success">{{trans('abyskit::actions.add')}}</button>
                            </div>
                            <div class="form__control">
                                <div class="form__control">
                                    <label for="" class="form__label">{{ucfirst(trans('abyskit::validation.attributes.slug'))}}</label>
                                    <input type="text" name="slug" class="form__input" value="{{old("slug")}}">
                                    @if($errors->has('slug'))
                                        <div class="alert alert--danger alert--margin">
                                            <small class="alert__text">{{$errors->first('slug')}}</small>
                                        </div>
                                    @endif
                                </div>
                                <div class="form__control">
                                    <label for="" class="form__label">{{ucfirst(trans('abyskit::default.parent'))}}</label>
                                    <select name="category_parent_id" class="form__select">
                                        <option value="0" selected>{{ucfirst(trans('abyskit::default.parent'))}}</option>
                                        @if(count($list))
                                            @foreach($list as $listItem)
                                                <option value="{{$listItem->id}}" {{(old("category_parent_id") == $listItem->id) ? 'selected': ''}}>{{$listItem->title()}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form__control">
                                    <label for="" class="form__label">{{ucfirst(trans('abyskit::default.status'))}}</label>
                                    <select name="status" class="form__select">
                                        <option value="1" {{(old("active") == 1) ? 'selected': ''}}>{{ucfirst(trans('abyskit::default.active'))}}</option>
                                        <option value="0" {{(old("active") == 0) ? 'selected': ''}}>{{ucfirst(trans('abyskit::default.disabled'))}}</option>
                                    </select>
                                </div>
                                <div class="form__control">
                                    <label for="" class="form__label">{{ucfirst(trans('abyskit::default.for_product'))}}</label>
                                    <select name="product" class="form__select">
                                        <option value="1" {{(old("product") == 1) ? 'selected': ''}}>{{ucfirst(trans('abyskit::default.yes'))}}</option>
                                        <option value="0" {{(old("product") == 0) ? 'selected': ''}}>{{ucfirst(trans('abyskit::default.no'))}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form__control s-text-right">
                                <button class="button button--success">{{trans('abyskit::actions.add')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
