(function ($) {
    "use strict"; // Start of use strict

    // Toggle the side navigation
    $("#sidebarToggle, #sidebarToggleTop").on('click', function (e) {
        $("body").toggleClass("sidebar-toggled");
        $(".sidebar").toggleClass("toggled");
        if ($(".sidebar").hasClass("toggled")) {
            $('.sidebar .collapse').collapse('hide');
        };
    });

    // Close any open menu accordions when window is resized below 768px
    $(window).resize(function () {
        if ($(window).width() < 768) {
            $('.sidebar .collapse').collapse('hide');
        };
    });

    // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
    $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function (e) {
        if ($(window).width() > 768) {
            var e0 = e.originalEvent,
                delta = e0.wheelDelta || -e0.detail;
            this.scrollTop += (delta < 0 ? 1 : -1) * 30;
            e.preventDefault();
        }
    });

    // Scroll to top button appear
    $(document).on('scroll', function () {
        var scrollDistance = $(this).scrollTop();
        if (scrollDistance > 100) {
            $('.scroll-to-top').fadeIn();
        } else {
            $('.scroll-to-top').fadeOut();
        }
    });

    // Smooth scrolling using jQuery easing
    $(document).on('click', 'a.scroll-to-top', function (e) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top)
        }, 1000, 'easeInOutExpo');
        e.preventDefault();
    });

    $(document).ready(function() {
      // Add new row to table
      $('.btn-add-item').click(function() {
          var row = $('.item-row').clone();
          row.removeClass('item-row');
          row.find('.remove-row').click(function() {
              $(this).closest('tr').remove();
          });
          $('#items-table tbody').append(row);
      });
    });

    $(document).ready(function(){
        $('.datepicker').datepicker({
            dateFormat: 'yy-mm-dd',
            autoclose: true,
            todayHighlight: true
        })
    });

    $(document).ready(function() {
        $('#user').on('change', function() {
            var id = $(this).val();

            $.ajax({
                url: '/get-items/' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var items_dropdown = $('select[name="item[]"]');

                    console.log('User selected:', items_dropdown);

                    // Remove existing options
                    items_dropdown.empty();

                    // Add new options based on the fetched items
                    $.each(data, function(index, item) {
                        items_dropdown.append($('<option>', {
                            value: item.id,
                            text: item.name
                        }));
                    });

                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log('Error fetching items:', errorThrown);
                }
            });
        });
    });

})(jQuery); // End of use strict