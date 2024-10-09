@extends('frontend.layouts.master')
@section('title', 'Protfolio')
@section('content')
    @include('frontend.layouts.sections.profile')
    @include('frontend.layouts.sections.about')
    @include('frontend.layouts.sections.services')
    @include('frontend.layouts.sections.skills')
    @include('frontend.layouts.sections.portfolio')
    @include('frontend.layouts.sections.experience')
    {{-- @include('frontend.layouts.sections.testimonials') --}}
    @include('frontend.layouts.sections.contact')
@endsection
