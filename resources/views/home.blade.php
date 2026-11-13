
@extends('layouts.app')

@section('title', "Home | Otto's Grotto")

@push('styles')
<style>
    .hero {
        padding: 110px 20px;
        text-align: center;
        background: linear-gradient(
            135deg, #f2f8f2, #e0f1e5
        );
    }

    .hero h1 {
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 800;
        letter-spacing: -1.5px;
        color: #123d2b;
    }

    .hero p {
        color: #567064;
        font-size: 1.2rem;
        max-width: 550px;
        margin: 20px auto 30px;
    }

    .hero-badge {
        display: inline-block;
        background: #d5ecdc;
        color: #24764a;
        padding: 8px 18px;
        border-radius: 30px;
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 1px;
        margin-bottom: 25px;
    }

    .feature-card {
        background: #f5faf6;
        border-radius: 16px;
        padding: 35px 20px;
        height: 100%;
        transition: 0.2s;
    }

    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px #123d2b15;
    }

    .feature-icon {
        font-size: 2rem;
        margin-bottom: 15px;
    }

    .feature-card h5 {
        color: #123d2b;
        font-weight: 700;
    }

    .feature-card p {
        color: #648071;
    }
</style>
@endpush

@section('content')

    @if (session('success'))
        <div class="container mt-4">
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <!-- Hero Section -->
    <section class="hero">

        <div class="container">

            <div class="hero-badge">
                🌱 YOUR LITTLE CORNER OF THE WEB
            </div>

            <h1>Welcome to Otto's Grotto</h1>

            <p>
                A place to explore, buy and sell!
            </p>

            <a href="#features" class="btn btn-grotto">
                Get Started &rarr;
            </a>

        </div>

    </section>

    <!-- Features -->
    <section id="features" class="py-5 bg-white">

        <div class="container">

            <div class="row g-4 text-center">

                @foreach ($ads as $ad)
                    <div class="col-md-6">

                        <div class="card boat-card h-100">

                            <div class="card-body p-4">

                                <!-- Category -->
                                <span class="badge bg-success mb-3">
                                    {{ $ad->category?->name ?? 'Uncategorized' }}
                                </span>

                                <!-- Title -->
                                <h3 class="fw-bold">
                                    {{ $ad->title }}
                                </h3>

                                <!-- Price -->
                                <h2 class="boat-price">
                                    ${{ number_format($ad->price, 2) }}
                                </h2>

                                <!-- Location -->
                                <p class="text-muted">
                                    📍 {{ $ad->location }}
                                </p>

                                <hr>

                                <!-- Description -->
                                <p>
                                    {{ $ad->message }}
                                </p>

                            </div>

                    </div>

                </div>

                @endforeach

            </div?>

        </div>

    </section>

@endsection
