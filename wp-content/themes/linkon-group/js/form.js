$('.popup__form').submit(function (e) {
  var form = this;
  e.preventDefault();
  var name = $(this).find('.form-name').val().replace(/(<([^>]+)>)/gi, '');
  var phone = $(this).find('.form-phone').val().replace(/(<([^>]+)>)/gi, '');
  var myEmail = $(this).find('.form-myEmail').val().replace(/(<([^>]+)>)/gi, '');

  var objTable = {
    name,
    phone,
    myEmail
  };

  $.ajax({
    url: '/wp-content/themes/linkon-group/mail.php',
    type: 'POST',
    data: objTable,
    success: function (response) {
      form.reset();
      $(function() {
        $(this).find('.popup-thanks').addClass('active');
      });
      setTimeout(() => {
        $(function() {
          $(this).find('.popup-thanks').removeClass('active');
        });
        $(function() {
          $('.popup').removeClass('active');
        });
      }, 5000);
    },
    error: function (error) {
      alert('Sorry, there was an error !');
    },
  });
});
