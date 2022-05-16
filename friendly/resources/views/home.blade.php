@extends('layouts.header')

@section('content')
    <main>
        <section class="rel-section">
            <div class=bng-img>
                <img src="/assets/zoom.webp" alt="">
            </div>
            <div class="ttl">
                <h1>One site, all <br> things words</h1>
                <p>For easy blogging, about technology and other interesting topics</p>
            </div>
        </section>

        <section class="blog-section">
            <p>Blogs</p>
            <h1 class="blog-section-title">Our Newest Blogs</h1>
            <section class="cards-section">
                <div class="card">
                    <div class="card-bng">
                        <img src="/assets/message.webp" alt="">
                    </div>
                    <div class="card-content">
                        <h1>Turning Failures into Wins</h1>
                        <p>Read this article &rarr;</p>
                    </div>
                </div>
            </section>
        </section>
    </main>
@endsection
