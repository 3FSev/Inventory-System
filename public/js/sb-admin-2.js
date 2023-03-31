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
            $('.sidebar .collapse');
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

    // Multiple inpit table
    $(document).ready(function () {
        // Add new row to table
        $('.btn-add-item').click(function () {
            var row = $('.item-row').clone();
            row.removeClass('item-row');
            row.find('.remove-row').click(function () {
                $(this).closest('tr').remove();
            });
            $('#items-table tbody').append(row);
        });
    });

    // Datepicker
    $(document).ready(function () {
        $('.datepicker').datepicker({
            dateFormat: 'yy-mm-dd',
            autoclose: true,
            todayHighlight: true
        })
    });

    // Fetch assigned items to user
    $(document).ready(function () {
        $('.user-mrt').on('change', function () {
            var id = $(this).val();

            $.ajax({
                url: '/get-items/' + id,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    var items_dropdown = $('select[name="item[]"]');

                    console.log('User selected:', items_dropdown);

                    // Remove existing options
                    items_dropdown.empty();

                    // Add new options based on the fetched items
                    $.each(data, function (index, item) {
                        items_dropdown.append($('<option>', {
                            value: item.id,
                            text: item.name
                        }));
                    });

                },
                error: function (xhr, textStatus, errorThrown) {
                    console.log('Error fetching items:', errorThrown);
                }
            });
        });
    });

    $(document).ready(function () {
        $('.usable-input').on('input', function () {
            var quantity = $(this).attr('max');
            var usable = $(this).val();
            var nonUsable = quantity - usable;
            console.log(nonUsable);
            $(this).closest('tr').find('.non-usable-input').val(nonUsable);
        });
    });

    $(window).on('load', function () {
        $('.usable-input').each(function () {
            var quantity = $(this).attr('max');
            var usable = $(this).val();
            var nonUsable = quantity - usable;
            $(this).closest('tr').find('.non-usable-input').val(nonUsable);
        });
    });

})(jQuery); // End of use strict

const navLinks = document.querySelectorAll('.with-sub');
navLinks.forEach(link => {
  link.addEventListener('click', (e) => {
    e.preventDefault();
    const dropdown = link.nextElementSibling;
    const isActive = dropdown.classList.contains('active');
    closeDropdowns();
    if (!isActive) {
      dropdown.classList.add('active');
    }
  });
});

function closeDropdowns() {
  const dropdowns = document.querySelectorAll('.list.active');
  dropdowns.forEach(dropdown => {
    dropdown.classList.remove('active');
  });
}

// Close dropdowns when clicking outside of them
document.addEventListener('click', (e) => {
  if (!e.target.closest('.nav-item')) {
    closeDropdowns();
  }
});