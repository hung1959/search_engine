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
        * {
            box-sizing: border-box;
        }
        .autocomplete {
            position: relative;
            display: inline-block;
        }
        .autocomplete-items {
            position: absolute;
            border: 1px solid #d4d4d4;
            border-bottom: none;
            border-top: none;
            z-index: 99;
            /*position the autocomplete items to be the same width as the container:*/
            top: 100%;
            left: 0;
            right: 0;
            text-align: left;
        }

        .autocomplete-items div {
            padding: 10px;
            cursor: pointer;
            background-color: #fff; 
        }

        /*when hovering an item:*/
        .autocomplete-items div:hover {
            background-color: #e9e9e9; 
        }

        /*when navigating through the items using the arrow keys:*/
        .autocomplete-active {
            background-color: DodgerBlue !important; 
            color: #ffffff; 
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
        span.deleteicon {
            position: relative;
            display: inline-flex;
            align-items: center;
        }
        span.deleteicon span {
            position: absolute;
            display: block;
            right: 3px;
            width: 15px;
            height: 15px;
            border-radius: 50%;
            color: #fff;
            background-color: #ccc;
            font: 13px monospace;
            text-align: center;
            line-height: 1em;
            cursor: pointer;
        }
        span.deleteicon input {
            padding-right: 18px;
            box-sizing: border-box;
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

        function autocomplete(inp, arr) {
      /*the autocomplete function takes two arguments,
      the text field element and an array of possible autocompleted values:*/
      var currentFocus;
      /*execute a function when someone writes in the text field:*/
      inp.addEventListener("input", function(e) {
          var a, b, i, val = this.value;
          /*close any already open lists of autocompleted values*/
          closeAllLists();
          if (!val) { return false;}
          currentFocus = -1;
          /*create a DIV element that will contain the items (values):*/
          a = document.createElement("DIV");
          a.setAttribute("id", this.id + "autocomplete-list");
          a.setAttribute("class", "autocomplete-items");
          /*append the DIV element as a child of the autocomplete container:*/
          this.parentNode.appendChild(a);
          /*for each item in the array...*/
          for (i = 0; i < arr.length; i++) {
            /*check if the item starts with the same letters as the text field value:*/
            if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
              /*create a DIV element for each matching element:*/
              b = document.createElement("DIV");
              /*make the matching letters bold:*/
              b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
              b.innerHTML += arr[i].substr(val.length);
              /*insert a input field that will hold the current array item's value:*/
              b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
              /*execute a function when someone clicks on the item value (DIV element):*/
              b.addEventListener("click", function(e) {
                  /*insert the value for the autocomplete text field:*/
                  inp.value = this.getElementsByTagName("input")[0].value;
                  /*close the list of autocompleted values,
                  (or any other open lists of autocompleted values:*/
                  closeAllLists();
              });
              a.appendChild(b);
            }
          }
      });
      /*execute a function presses a key on the keyboard:*/
      inp.addEventListener("keydown", function(e) {
          var x = document.getElementById(this.id + "autocomplete-list");
          if (x) x = x.getElementsByTagName("div");
          if (e.keyCode == 40) {
            /*If the arrow DOWN key is pressed,
            increase the currentFocus variable:*/
            currentFocus++;
            /*and and make the current item more visible:*/
            addActive(x);
          } else if (e.keyCode == 38) { //up
            /*If the arrow UP key is pressed,
            decrease the currentFocus variable:*/
            currentFocus--;
            /*and and make the current item more visible:*/
            addActive(x);
          } else if (e.keyCode == 13) {
            /*If the ENTER key is pressed, prevent the form from being submitted,*/
            e.preventDefault();
            if (currentFocus > -1) {
              /*and simulate a click on the "active" item:*/
              if (x) x[currentFocus].click();
            }
          }
      });
      function addActive(x) {
        /*a function to classify an item as "active":*/
        if (!x) return false;
        /*start by removing the "active" class on all items:*/
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (x.length - 1);
        /*add class "autocomplete-active":*/
        x[currentFocus].classList.add("autocomplete-active");
      }
      function removeActive(x) {
        /*a function to remove the "active" class from all autocomplete items:*/
        for (var i = 0; i < x.length; i++) {
          x[i].classList.remove("autocomplete-active");
        }
      }
      function closeAllLists(elmnt) {
        /*close all autocomplete lists in the document,
        except the one passed as an argument:*/
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
          if (elmnt != x[i] && elmnt != inp) {
            x[i].parentNode.removeChild(x[i]);
          }
        }
      }
      /*execute a function when someone clicks in the document:*/
      document.addEventListener("click", function (e) {
          closeAllLists(e.target);
      });
    }
    
    /*An array containing all the country names in the world:*/
    var countries = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua & Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia & Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central Arfrican Republic","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cuba","Curacao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kiribati","Kosovo","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauro","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","North Korea","Norway","Oman","Pakistan","Palau","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre & Miquelon","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain","Sri Lanka","St Kitts & Nevis","St Lucia","St Vincent","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad & Tobago","Tunisia","Turkey","Turkmenistan","Turks & Caicos","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States of America","Uruguay","Uzbekistan","Vanuatu","Vatican City","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"];
    
    /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
    autocomplete(document.getElementById("search-input"), countries);

    $(document).ready(function() {
        $('input.deletable').wrap('<span class="deleteicon"></span>').after($('<span>x</span>').click(function() {
            $(this).prev('input').val('').trigger('change').focus();
        }));
    });
    </script>
</body>
<footer></footer>
</html>