@extends('abyskit::dashboard')

@section('page')
    @include('abyskit::includes.header')

    <div class="section">
        <div class="container">
            <div class="error">
                <h1 class="error__title"><i class="fa fa-warning error__icon"></i> 404. <span class="error__text">{{__('default.page_404.not_found')}}</span></h1>
                <p class="error__text-small">
                    {{__('default.page_404.message.text')}}
                    {!! __('default.page_404.message.to_dashboard', ['link' => "<a href='#' class='error__link'>". strtolower(__('default.dashboard')) ."</a>"] )!!}
                </p>
            </div>
        </div>
    </div>
@endsection