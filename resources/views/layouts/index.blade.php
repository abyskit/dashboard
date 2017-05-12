@extends('abyskit::dashboard')

@section('content')
    <p>Current locale is: {{session('locale.slug')}}</p>
    <p>Current app locale is: {{config('app.locale')}}</p>
@endsection