@extends('abyskit::dashboard')

@section('content')
    <div class="content-area">
        <div class="content-area__header s-flex s-flex-middle s-flex-justify">
            <div>
                <p class="content-area__title">{{trans('abyskit::default.categories')}}</p>
            </div>
            <div>
                <a href="{{route('abyskit.category.create.page')}}" class="button button--primary">{{trans('abyskit::actions.add_name', ["name" => __("abyskit::default.category")])}}</a>
            </div>
        </div>
        <div class="content-area__bar s-flex s-flex-middle s-flex-justify">
            <div>
                <ul class="pagination-page">
                    <li class="pagination-page__item">
                        <a href="{{route('abyskit.dashboard.page')}}" class="pagination-page__link"><i class="pagination-page__icon fa fa-home"></i></a>
                    </li>
                    <li class="pagination-page__item">
                        <p class="pagination-page__text">{{trans('abyskit::default.categories')}}</p>
                    </li>
                </ul>
            </div>
            <div>
                <form action="" class="form form--inline" method="get">
                    <div class="form__control">
                        <input type="text" name="search" value="{{Request::input('search')}}" class="form__input">
                    </div>
                    <div class="form__control">
                        <button class="button button--success">{{trans('abyskit::actions.search')}}</button>
                    </div>
                    @if(Request::input('search'))
                        <div class="form__control">
                            <a href="{{route('abyskit.category.list.page')}}" class="button"><i class="button__icon fa fa-remove"></i></a>
                        </div>
                    @endif
                </form>
            </div>
        </div>
        <div class="content-area__content">
            <div class="panel">
                <div class="panel__content">
                    <div class="panel__row s-flex s-flex-middle s-flex-justify">
                        <div>
                            <form action="" method="get" class="form form--inline" id="filter-action">
                                <input type="hidden" name="search" value="{{Request::input('search')}}">
                                <div class="form__control">
                                    <select name="status" class="form__select">
                                        <option value="" selected>{{ucfirst(trans('abyskit::default.status'))}}</option>
                                        <option value="1" {{(Request::input('status') == '1') ? 'selected': ''}}>{{ucfirst(trans('abyskit::default.active'))}}</option>
                                        <option value="0" {{(Request::input('status') == '0') ? 'selected': ''}}>{{ucfirst(trans('abyskit::default.disabled'))}}</option>
                                    </select>
                                </div>
                                <div class="form__control">
                                    <select name="parent" class="form__select">
                                        <option value="" selected>{{ucfirst(trans('abyskit::default.parent'))}}</option>
                                        @foreach($parentList as $item)
                                            <option value="{{$item->id}}" {{(Request::input('parent') == $item->id) ? 'selected': ''}}>{{ucfirst($item->title())}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div>
                            <button class="button button--primary" data-submit-form="filter-action">{{trans('abyskit::actions.filter')}}</button>
                            <a href="{{route('abyskit.category.list.page')}}{{(Request::input('search')) ? '?search=' . Request::input('search') : ''}}" class="button button--primary">{{trans('abyskit::actions.clear_filter')}}</a>
                        </div>
                    </div>
                    @if(!$list)
                        <div class="panel__row">Нет созданных категории</div>
                    @else
                        @if(session()->has('success'))
                            <div class="alert alert--success alert--margin">
                                <small class="alert__text">{{ ucfirst(session()->get('success')) }}</small>
                            </div>
                        @endif
                        @if($errors->first("error"))
                            <div class="panel__row">
                                <div class="alert alert--danger alert--margin">
                                    <small class="alert__text">{{$errors->first("error")}}</small>
                                </div>
                            </div>
                        @endif
                        <div class="panel__row">
                            <table class="table">
                                <thead class="table__head">
                                <tr class="table__row">
                                    <th class="table__column-head">#</th>
                                    <th class="table__column-head">{{trans('abyskit::validation.attributes.title')}}</th>
                                    <th class="table__column-head">{{trans('abyskit::validation.attributes.slug')}}</th>
                                    <th class="table__column-head">{{trans('abyskit::validation.attributes.created_at')}}</th>
                                    <th class="table__column-head">{{trans('abyskit::default.status')}}</th>
                                    <th class="table__column-head"></th>
                                </tr>
                                </thead>
                                <tbody class="table__body">
                                @foreach($list as $key => $item)
                                    <tr class="table__row">
                                        <td class="table__column">{{$key + 1}}</td>
                                        <td class="table__column">{{$item->title}}</td>
                                        <td class="table__column">{{$item->slug}}</td>
                                        <td class="table__column">{{$item->created_at}}</td>
                                        <td class="table__column">
                                            @if($item->active)
                                                <span class="circle circle--extra-small circle--success"></span>
                                            @else
                                                <span class="circle circle--extra-small circle--danger"></span>
                                            @endif
                                        </td>
                                        <td class="table__column">
                                            <a href="{{route('abyskit.category.edit.page', ['id' => $item->id])}}" class="button button--icon button--primary">
                                                <i class="button__icon fa fa-pencil"></i>
                                            </a>
                                            <div class="s-display-inline-block s-width-auto">
                                                <form action="{{route('abyskit.category.destroy', ['id' => $item->id])}}"
                                                      method="post"
                                                      class="form"
                                                      data-submit-confirm
                                                      data-confirm-text="{{trans('abyskit::actions.confirm_delete', ['item' => $item->title])}}">
                                                    {{csrf_field()}}
                                                    <button class="button button--icon button--danger">
                                                        <i class="button__icon fa fa-remove"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="panel__row s-text-right">
                            {{
                                $list->appends([
                                    'status' => Request::input('status'),
                                    'search' => Request::input('search')
                                ])->links()
                            }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection