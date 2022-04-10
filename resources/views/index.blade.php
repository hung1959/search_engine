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
    <header style="background-color: rgb(57, 165, 165);">
        <h3 style="text-align: center; margin-top: 20px; font-weight: bold; color: white;">Search Engine</h3>
    </header>
    <div id="search-area">
        <div id="search">
            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg> -->
            <form autocomplete="off">
                <div class="autocomplete" style="width: 700px;">
                    <input id="search-input" type="search" class="deletable" placeholder="Type to search..."/>
                </div>
            </form>
        </div>
    </div>
    <div id="select-menu">
        <div id="select-type">
            <h5 style="font-weight: bold;">Category</h5>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
            <label class="form-check-label" for="flexCheckIndeterminate">
                Indeterminate checkbox
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
            <label class="form-check-label" for="flexCheckIndeterminate">
                Indeterminate checkbox
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
            <label class="form-check-label" for="flexCheckIndeterminate">
                Indeterminate checkbox
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
            <label class="form-check-label" for="flexCheckIndeterminate">
                Indeterminate checkbox
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
            <label class="form-check-label" for="flexCheckIndeterminate">
                Indeterminate checkbox
            </label>
        </div>

        <div id="select-type">
            <h5 style="font-weight: bold;">Category</h5>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="flexCheckIndeterminate">
            <label class="form-check-label" for="flexCheckIndeterminate">
                Indeterminate checkbox
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
            <label class="form-check-label" for="flexCheckIndeterminate">
                Indeterminate checkbox
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
            <label class="form-check-label" for="flexCheckIndeterminate">
                Indeterminate checkbox
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
            <label class="form-check-label" for="flexCheckIndeterminate">
                Indeterminate checkbox
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
            <label class="form-check-label" for="flexCheckIndeterminate">
                Indeterminate checkbox
            </label>
        </div>
    </div>
    <div id="result-block">
        <div id="display-result">
            <center id="message">Something you searched will displayed here.</center>
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
        <a href="#">
            <img src="https://thumbs.dreamstime.com/b/advertising-word-cloud-business-concept-56936998.jpg" alt="Error display!" width="60%">
            <div class="ad-text">
                <p>
                    Lorem ipsum dolor sit amet, consectetur
                </p>
            </div>
        </a>
        <hr>
        <a href="#">
            <img src="https://thumbs.dreamstime.com/b/advertising-word-cloud-business-concept-56936998.jpg" alt="Error display!" width="60%">
            <div class="ad-text">
                <p>
                    Lorem ipsum dolor sit amet, consectetur
                </p>
            </div>
        </a>
        <a href="#">
            <img src="https://thumbs.dreamstime.com/b/advertising-word-cloud-business-concept-56936998.jpg" alt="Error display!" width="60%">
            <div class="ad-text">
                <p>
                    Lorem ipsum dolor sit amet, consectetur
                </p>
            </div>
        </a>
        <hr>
        <input type="hidden" id="searchUrl" value="{{ route('ajax-search') }}" />
        <input type="hidden" id="suggestUrl" value="{{ route('suggest-search') }}" />
        <input type="hidden" name="suggestTitle" id="suggestTitles" value="{{ $result }}" />
    </div>
    <script src="{{ asset('js/ajax.js')}}"></script>
    <script src="{{ asset('js/auto-complete.js')}}"></script>
</body>
<footer style="height: 100px; border-top: 1px solid #eeeeee;">

</footer>
</html>
