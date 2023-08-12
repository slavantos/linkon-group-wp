$('#subscribe-form').submit(function (e) {
    var form = this;
    e.preventDefault();
    var email = $('#subscribe-email').val().replace(/(<([^>]+)>)/gi, '');

    var objTable = {
      email,
    };

    $.ajax({
      url: '/wp-content/themes/linkon-group/subscribe.php',
      type: 'POST',
      data: objTable,
      success: function (response) {
        $('#subscribe-form .success').addClass('active');
        setTimeout(function(){$('#subscribe-form .success').removeClass('active')},5000)
        form.reset();
      },
      error: function (error) {
        alert('Sorry, there was an error !');
      },
    });
  });