@extends('layouts.site')


    <!-- Page Content -->
    <!-- Banner Starts Here -->
    @section('banner')

    <div class="banner header-text">
        <div class="owl-banner owl-carousel">
            <div class="banner-item-01">
                <div class="text-content">
                    <h4>Best Offer</h4>
                    <h2>New Arrivals On Sale</h2>
          </div>
        </div>
        <div class="banner-item-02">
            <div class="text-content">
                <h4>Flash Deals</h4>
                <h2>Get your best products</h2>
            </div>
        </div>
        <div class="banner-item-03">
            <div class="text-content">
                <h4>Last Minute</h4>
                <h2>Grab last minute deals</h2>
            </div>
        </div>
      </div>
    </div>
    @endsection
    <!-- Banner Ends Here -->

    @section('content')
    <div class="latest-products">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="section-heading">
                <h2>Latest Books</h2>
                <a href="{{route('books')}}">view all books <i class="fa fa-angle-right"></i></a>
              </div>
            </div>
            @foreach ($books as $book)
            {{-- @dd($book) --}}
            {{-- @dd($book->category->name) --}}
            <div class="col-md-4">
              <div class="product-item">
                <a href="#"><img src="{{asset('storage/'.$book->image)}}" alt=""></a>
                <div class="down-content">
                  <a href="{{route('book.show', $book->id)}}"><h4>{{$book->name}}</h4></a>
                  <p>{{substr($book->description,0,100)}}</p>
                  <p>Author: {{$book->author}}</p>
                  <p>Category: {{$book->category->name}}</p>
                  <a href="{{"/books/" . $book->id}}" class="btn btn-outline-primary">Read More</a>
                  <a href="{{route('book.borrow', $book->id)}}" class="btn btn-outline-success">Borrow</a>
                </div>
              </div>
            </div>
            @endforeach

          </div>
        </div>
      </div>

      <div class="best-features">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="section-heading">
                <h2>About E Library</h2>
              </div>
            </div>
            <div class="col-md-6">
              <div class="left-content">
                <h4>Looking for the best books?</h4>
                <p>E Library is a platform for students to borrow books from the library. This platform is designed to help students to borrow books from the library. This platform is designed to help students to borrow books from the library.</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="right-image">
                <img src="{{asset('assets/images/feature-image.jpg')}}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>





    @endsection