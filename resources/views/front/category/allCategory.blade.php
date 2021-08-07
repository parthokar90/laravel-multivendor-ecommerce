@extends('front.layout.master')

@section('title') All Category @endsection

@section('content') 
    <!-- start banner area -->
    <section class="inner-page banner" data-img="{{asset('front/assets/images/banner.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>category</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                          <li class="breadcrumb-item"><a href="{{route('home.page')}}">Home</a></li>
                          <li class="breadcrumb-item active" aria-current="page">category</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- end banner area -->

      <!-- start category area -->
      <section class="category-page category">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                          <div class="row">
                                @forelse($category as $item)
                                <div class="col-md-3 col-sm-6">
                                    <div class="single-category">
                                        <img src="{{asset('admin/category/'.$item->image)}}" alt="Category">
                                        <div class="cat-btn">
                                            <a href="{{route('category.product',array('id'=>$item->id,'slug'=>$item->slug))}}">{{$item->category_name}}</a>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <p>No Category Found</p>
                               @endforelse
                            </div>
                       </div>
                  </div>
             </div>
        </div>
    </section>
    <!-- end category area -->
@endsection