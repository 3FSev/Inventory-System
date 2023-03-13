(function ($) {
    const parent = $('.js-input');

    $(window).on('pageshow', () => {
        parent.each(function() {
            const input = $(this);

            input.on('focus', () => {
                focusState(input);
            });

            input.on('blur', () => {
                blurState(input);
            });

            focusState(input);
            blurState(input);
        });
    });

    function focusState(input){
        const parentEl = input.parent();
        parentEl.addClass('focus');
    }

    function blurState(input){
        const parentEl = input.parent();
        if(!input.val()){
            parentEl.removeClass('focus');
        }
    }

    const passwordInput = $('.js-pass');
  const passwordConfirmInput = $('.js-pass-2');
  const showHidePassword = $('#show-hide-pass');
  const showHideConfirmPassword = $('#show-hide-confirm-pass-2');

  // Show/hide password functionality
  showHidePassword.on('click', () => {
    if (passwordInput.attr('type') == 'password') {
      passwordInput.attr('type', 'text');
      showHidePassword.attr('src', 'assets/hidePass.svg');
    } else {
      passwordInput.attr('type', 'password');
      showHidePassword.attr('src', 'assets/showPass.svg');
    }
  });

  // Show/hide confirm password functionality
  showHideConfirmPassword.on('click', () => {
    if (passwordConfirmInput.attr('type') == 'password') {
      passwordConfirmInput.attr('type', 'text');
      showHideConfirmPassword.attr('src', 'assets/hidePass.svg');
    } else {
      passwordConfirmInput.attr('type', 'password');
      showHideConfirmPassword.attr('src', 'assets/showPass.svg');
    }
  });

  // Set initial state of password fields
  passwordInput.on('focus', () => {
    passwordInput.parent().addClass('focus');
  });

  passwordInput.on('blur', () => {
    if (!passwordInput.val()) {
      passwordInput.parent().removeClass('focus');
    }
  });

  passwordConfirmInput.on('focus', () => {
    passwordConfirmInput.parent().addClass('focus');
  });

  passwordConfirmInput.on('blur', () => {
    if (!passwordConfirmInput.val()) {
      passwordConfirmInput.parent().removeClass('focus');
    }
  });

})(jQuery);