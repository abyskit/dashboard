@extends('abyskit::dashboard')

@section('page')
    <form action="{{ route('abyskit.login') }}" method="post" class="panel-login">
        {{ csrf_field() }}
        <div class="panel-login__header">
            <p class="panel-login__title">{{config('abyskit.name')}}</p>
        </div>
        <div class="panel-login__content">
            <div class="panel-login__control">
                <p class="panel-login__text">{{trans('abyskit::actions.sign_in')}}</p>
            </div>
            <div class="panel-login__control">
                <div class="s-flex s-flex-middle s-flex-justify">
                    <label class="panel-login__label">{{trans('abyskit::validation.attributes.email')}}</label>
                </div>
                <input type="email" name="email" class="panel-login__input" value="{{old('email')}}">
                @if($errors->has('email'))
                    <div class="alert alert--danger alert--margin">
                        <small class="alert__text">{{$errors->first('email')}}</small>
                    </div>
                @endif
            </div>
            <div class="panel-login__control">
                <div class="s-flex s-flex-middle s-flex-justify">
                    <label class="panel-login__label">{{trans('abyskit::validation.attributes.password')}}</label>
                    <a href="#" class="panel-login__link">{{trans('abyskit::actions.forgot_password')}}</a>
                </div>
                <input type="password" name="password" class="panel-login__input">
                @if($errors->has('password'))
                    <div class="alert alert--danger alert--margin">
                        <small class="alert__text">{{$errors->first('password')}}</small>
                    </div>
                @endif
            </div>
        </div>
        <div class="panel-login__footer">
            <div class="s-clearfix">
                <button class="button button--primary button--large s-right">{{trans('abyskit::actions.sign_in')}}</button>
            </div>
        </div>
        <p class="panel-login__copyright">{{ucfirst(trans('abyskit::default.copyright'))}}</p>
    </form>
@endsection