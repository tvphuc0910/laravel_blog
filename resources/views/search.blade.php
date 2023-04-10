@extends('layout')

@section('header')
    <div class="section section-header-blog">
        <div class="parallax filter filter-color-blue">
            <div class="image"
                 style="background-image:url('{{asset('img/header-6.jpeg')}}')">
            </div>
            <div class="container">
                <div class="content">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 align-self-center">
                        <h1>Search for something</h1>
                        <br>
                        <br>
                        <form method="get" action="{{ route('search.result') }}" class="form-group">
                            <input type="text" name="query" value="{{ isset($searchterm) ? $searchterm : ''  }}" class="form-control form-control-plain"  placeholder="Search events or blog posts..." aria-label="Search">
                        </form>
                    </div>
                    <div class="col-md-3"></div>
                </div>

            </div>
        </div>

    </div>

@endsection

@section('content')
    <div class="section section-blog-horizontal">
            <div class="container">
                        <br>
                        @if(isset($searchResults))
                            @if ($searchResults-> isEmpty())
                                <h2>Sorry, no results found for the term <b>"{{ $searchterm }}"</b>.</h2>
                            @else
                                <h2>There are {{ $searchResults->count() }} results for <b>"{{ $searchterm }}"</b></h2>
                                <hr />
                                @foreach($searchResults->groupByType() as $type => $modelSearchResults)
                                    @foreach($modelSearchResults as $searchResult)
                                        <div class="card card-plain card-blog">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <a href="{{route('blog.show', $searchResult->url)}}" class="header">
                                                        <img src="{{asset('storage/'. $searchResult->photo)}}">
                                                    </a>
                                                </div>
                                                <div class="col-sm-5 col-md-offset-1">
                                                    <div class="content">
                                                        <a href="{{route('category.show', $searchResult->searchable->category->slug)}}"  class="btn btn-simple btn-info">
                                                            {{ $searchResult->searchable->category->name }}
                                                        </a>
                                                        <a href="{{route('blog.show', $searchResult->url)}}" class="card-title">
                                                            <h2>{{$searchResult->title}}</h2>
                                                        </a>

                                                        <p class="text-gray">{{$searchResult->description}}</p>


                                                        <a href="{{route('blog.show', $searchResult->url)}}" class="btn btn-danger btn-fill">Read More</a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach
                            @endif
                        @endif
            </div>

        </div>
    </div>




@endsection

