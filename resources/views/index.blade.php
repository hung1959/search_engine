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
    <title>Result Display</title>
    <style>
        .lds-dual-ring.hidden {
            display: none;
        }
        .overlay {
            position: fixed;
            top: 40%;
            left: 50%;
            width: 100%;
            height: 100vh;
            background: black;
            border-radius: 20%;
            padding: 5px;
            z-index: 999;
            opacity: 1;
            transition: all 0.5s;
        }
        
        /*Spinner Styles*/
        .lds-dual-ring {
            display: inline-block;
            width: 80px;
            height: 80px;
        }
        .lds-dual-ring:after {
            content: " ";
            display: block;
            width: 64px;
            height: 64px;
            margin: 5% auto;
            border-radius: 50%;
            border: 6px solid #fff;
            border-color: #fff transparent #fff transparent;
            animation: lds-dual-ring 1.2s linear infinite;
        }
        @keyframes lds-dual-ring {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
        #search-area{
            width: 100%;
            height: 30%;
            background-color: #E5E6ED;
        }
        #search{
            position: relative;
            margin-left: 100px;
            margin-bottom: 50px;
        }
        #search-input{
            padding: 12px 20px 12px 40px;
            width: 500px;
            border: none;
            border-radius: 5px;
            box-shadow: 0 0 1px grey;
        }
        svg{
            position: absolute;
            top: 39%;
            left: 1%;
        }
        a{
            text-decoration: none;
            color: black;
        }
        a:hover{
            text-decoration: underline;
            color: black;
        }
        #select-menu{
            width: 20%;
            display: inline-block;
            margin-left: 5%;
            position: fixed;
        }
        #select-type{
            background-color: rgb(57, 165, 165);
            padding: 5px 10px 2px 10px;
            border-radius: 2px;
            color: white;
            width: 90%;
        }
        .form-check{
            margin-top: 10px;
            margin-bottom: 10px;
        }
        #result-block{
            width: 35%;
            position: relative;
            left: 30%;
            display: inline-block;

        }
        .label-link{
            color: rgb(57, 165, 165);
        }
        a .label-link:hover{
            cursor: pointer;
        }
        .for-ad{
            width: 20%;
            display: inline-block;
            margin-left: 100px;
            left: 65%;
            position: fixed;
        }
        .ad-text{
            display: inline;
        }
        header{
            padding: 5px 20px 15px 15px;
        }
    </style>
</head>
<body>
    <header style="background-color: rgb(57, 165, 165);">
        <h3 style="text-align: center; margin-top: 20px; font-weight: bold; color: white;">Search Engine</h3>
    </header>
    <div id="search-area">
        <div id="search">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
            <input id="search-input" type="text" placeholder="Type to search...">
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
        <div class="block">
            <a href="#">
                <label class="label-link">Lorem ipsum dolor sit amet</label>
                <h5 style="color: rgb(57, 165, 165);">Lorem ipsum dolor sit amet, consectetur adipiscing elit</h5>
            </a>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
        </div>
        <div class="block">
            <a href="#">
                <label class="label-link">Lorem ipsum dolor sit amet</label>
                <h5 style="color: rgb(57, 165, 165);">Lorem ipsum dolor sit amet, consectetur adipiscing elit</h5>
            </a>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
        </div>
        <div class="block">
            <a href="#">
                <label class="label-link">Lorem ipsum dolor sit amet</label>
                <h5 style="color: rgb(57, 165, 165);">Lorem ipsum dolor sit amet, consectetur adipiscing elit</h5>
            </a>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
        </div>
        <div class="block">
            <a href="#">
                <label class="label-link">Lorem ipsum dolor sit amet</label>
                <h5 style="color: rgb(57, 165, 165);">Lorem ipsum dolor sit amet, consectetur adipiscing elit</h5>
            </a>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
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
    </div>
    <script type="text/javascript">
        $('#search-input').on('keyup',function(){
            var value = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{ URL::to('search') }}',
                beforeSend: function() {
                    $('#loader').removeClass('hidden')
                },
                data: {
                    'keyword': value
                },
                success:function(data){
                    setTimeout(function(){
                        $('#result-block').html(data);
                    }, 1000);
                },
                complete: function () { // Set our complete callback, adding the .hidden class and hiding the spinner.
                    setTimeout(function(){
                        $('#loader').addClass('hidden');
                    }, 1000);
                }
            });
        })
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>
</body>
<footer></footer>
</html>