$('#load-more').hide();
var url = $('#searchUrl').val();
$("#search-input").keydown(function (e) {
    if (e.keyCode == 13) {
        e.preventDefault();
        ajaxRequest();
    }
  });
  
function ajaxRequest() {
  var value = $('#search-input').val();
  if(value == ''){
      $('#message-loadmore').hide();
      $('#load-more').show();
      $('#display-result').html('<center>The search result will display here.</center>');
  } else {
      $.ajax({
          type: 'get',
          url: url,
          beforeSend: function() {
              $('#loader').removeClass('hidden')
          },
          data: {
              'keyword': value
          },
          success:function(data){
              setTimeout(function(){
                $('#load-more').hide();
                  if(data != '') {
                    $('#load-more').show();
                  }  
                  $('#display-result').html(data);  
              }, 1000);
          },
          complete: function () {
              setTimeout(function(){
                  $('#loader').addClass('hidden');
              }, 1000);
          }
      });
  } 
}

$('#message-loadmore').hide();
$('#load-more').on('click', function(){
  var numberItem = $('.block').length;
  var inputValue = $('#search-input').val();
  if(inputValue != ''){
      $.ajax({
          type: 'get',
          url: url,
          beforeSend: function() {
              $('#loader').removeClass('hidden')
          },
          data: {
              'keyword': inputValue,
              'skip': numberItem
          },
          success:function(data){
              if(data == '') {
                  $(this).hide();
                  setTimeout(function(){
                      $('#message-loadmore').show();
                      $('#load-more').hide();
                  }, 1000);
              } else {
                  setTimeout(function(){
                      $('#display-result').append(data);
                      ('#load-more').show();   
                  }, 1000);
              }
          },
          complete: function () {
              setTimeout(function(){
                  $('#loader').addClass('hidden');
              }, 1000);
          }
      });
  }
});

var token = $("meta[name=_token]").attr("content");
$.ajaxSetup({ headers: { 'csrftoken' : token } });
