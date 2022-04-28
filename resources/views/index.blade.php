<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="_token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <title>Result Display</title>
</head>
<body>
    <header style="background-image: linear-gradient(to bottom right, rgb(57, 165, 165), rgb(68, 186, 254));">
        <h3 style="text-align: center; margin-top: 20px; font-weight: bold; color: white;">Search Engine</h3>
    </header>
    <div id="search-area">
        <center>
            <div id="search">
                <form autocomplete="off">
                    <div class="autocomplete">
                        <input id="search-input" type="search" class="deletable" placeholder="Type to search..."/>
                    </div>
                </form>
            </div>
        </center>
    </div>

    <div id="result-block">
        <div id="select-type">
            <h5 style="font-weight: bold; float: left; text-decoration: underline;">Search result</h5>
            <div class="dropdown" style="text-align: right;">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Sort results
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="#">A - Z</a></li>
                    <li><a class="dropdown-item" href="#">Z - A</a></li>
                </ul>
            </div>
        </div>

        <div id="display-result">
        </div>
        <div class="load-more">
            <center>
                <button id="load-more">Load More</button>
                <p id="message-loadmore">That's all</p>
            </center>
        </div>
    </div>

    <div id="loader" class="lds-dual-ring hidden overlay"></div>
    <div class="for-ad">
    
        <h5 style="font-weight: bold; color: rgb(57, 165, 165);">Relevant</h5><hr>
        <div id="relevant">
            <a href="#">Lorem ipsum dolor sit amet, consectetur</a>
            <hr>
            <a href="#">Lorem ipsum dolor sit amet, consectetur</a>
            <hr>
            <a href="#">Lorem ipsum dolor sit amet, consectetur</a>
            <hr>
            <a href="#">Lorem ipsum dolor sit amet, consectetur</a>
            <hr>
            <a href="#">Lorem ipsum dolor sit amet, consectetur</a>
            <hr>
        </div>
        <input type="hidden" id="searchUrl" value="{{ route('ajax-search') }}" />
        <input type="hidden" id="suggestUrl" value="{{ route('suggest-search') }}" />
        <input type="hidden" name="suggestTitle" id="suggestTitles" value="{{ ($searchHistories) }}" />
        <br>
    </div>

    <div class="other-function">
        <div>
            <h5 style="font-weight: bold; color: rgb(57, 165, 165); text-align: center;">Explore new features</h5><hr>
            <label for="">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</label><br>
            <label for="">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</label><br>
            <br>
            <img src="https://thumbs.dreamstime.com/b/hand-pointing-abstract-digital-text-circuit-background-advertising-media-company-concept-advertising-media-company-100570356.jpg" 
            alt="Error display" width="95%" style="text-align: center;">
            <center><button class="explore-btn">Explore now!</button></center>
        </div>
    </div>

    <script src="{{ asset('js/ajax.js')}}"></script>
    <script src="{{ asset('js/auto-complete.js')}}"></script>
</body>
<footer>
    Copyright © 2022 Search Engine
</footer>
</html>
