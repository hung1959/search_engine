var url = $('#searchUrl').val();
$('#search-input').on('change',function(){
  var value = $(this).val();
  if(value == ''){
      $('#message-loadmore').hide();
      $('#load-more').show();
      $('#display-result').html('<center>Something you searched will displayed here.</center>');
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
});

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
