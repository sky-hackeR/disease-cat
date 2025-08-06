@extends('layouts.app')

@section('content')

    <section class="page-header">
        <div class="page-header__bg"
            style="background-image: url('{{ $banner && $banner->service_banner ? $banner->service_banner : asset('frontAssets/images/backgrounds/page-header-bg-1-1.jpg') }}');">
        </div>

        <div class="container">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>/</li>
                <li><span>{{ $service->title }}</span></li>
            </ul>
            <h2>{{ $service->title }}</h2>
        </div>
    </section>


    <section class="service-details">
        <div class="container">
            <div class="row">

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="service-sidebar">
                        <div class="service-sidebar__links">
                            <ul>
                                <li><a href="{{ url('/services') }}">All Services</a></li>
                                @foreach($allServices as $sideService)
                                    <li>
                                        <a href="{{ route('viewService', $sideService->slug) }}"
                                            class="{{ $sideService->slug === $service->slug ? 'active' : '' }}">
                                            {{ $sideService->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="service-sidebar__call">
                            <div class="service-sidebar__call-bg" 
                                style="background-image: url('{{ asset('frontAssets/images/services/service-widget-bg-1.jpg') }}');">
                            </div>
                            <h3>{{ $service->catchphrase ?? 'We sell best agriculture products' }}</h3>
                        </div>
                    </div>
                </div>

                <!-- Service Content -->
                <div class="col-lg-8">
                    <img src="{{ $service->image }}" alt="{{ $service->title }}">
                    <h2>{{ $service->title }}</h2>
                    
                    {{-- Display description with line breaks --}}
                    <p>{!! ($service->description) !!}</p>
                </div>

            </div>
        </div>
    </section>


@endsection
