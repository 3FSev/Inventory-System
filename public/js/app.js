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

    const passInput = $('.js-pass');
    const showHidePass = $('#show-hide-pass');

    showHidePass.on('click', () => {
        if(passInput.attr('type') == "password"){
            passInput.attr('type', 'text');
            showHidePass.attr('src', 'assets/hidePass.svg');
        } else {
            passInput.attr('type', 'password');
            showHidePass.attr('src', 'assets/showPass.svg');
        }
    });

    console.log(passInput);

})(jQuery);