(function ($) {
    "use strict";

    var secondsLeft = $('#minutes').text() * 60;

    function updateTimer() {
        var minutes = Math.floor(secondsLeft / 60);
        var seconds = secondsLeft % 60;

        minutes = minutes>9?minutes:'0'+minutes;
        seconds = seconds>9?seconds:'0'+seconds;

        $('#minutes').text(minutes);
        $('#seconds').text(seconds);

        secondsLeft--;

        if (secondsLeft < 0) {
            clearInterval(timerInterval);
            $('#end-test-button').click();
        }
    }

    // Initial call to updateTimer
    updateTimer();

    // Call updateTimer every second
    var timerInterval = setInterval(updateTimer, 1000);

    $('#end-test-button').click(function (){
        $('#test').submit();
    })

    $('#test').submit(function(event) {
        event.preventDefault();
        // Show a confirmation dialog
        var confirmation = secondsLeft>0?confirm("Testni yakunlamoqchimisiz?"):true;

        // If user confirms, proceed with form submission
        if (confirmation) {
            $(this).unbind('submit').submit(); // Submit the form
        }
    });

    window.history.pushState(null, "", window.location.href);
    window.onpopstate = function() {
        window.history.pushState(null, "", window.location.href);
    };

    $("body").on("contextmenu", function(e) {
        return false;
    });

    $('.mat-radio-label').click(function () {
        let active_tab_link = $('.tab-links.active');
        let current = parseInt(active_tab_link.text());
        let parent = $(this).parent().parent();

        let container = parent.find('.mat-radio-container');
        container.removeClass('mat-radio-checked');
        $(this).find('.mat-radio-container').addClass('mat-radio-checked');

        active_tab_link.addClass('checked');
    });

    $('.tab-links').click(function () {
        let current = $('.test-list:not(.hidden)');
        current.addClass('hidden');
        $('.nav-item.active').removeClass('active');

        let next = $('.test-list-' + parseInt($(this).text()) + '');
        next.removeClass('hidden');
        $(this).addClass('active');
    });

    $('.prev').click(function () {
        let prev = parseInt($('.tab-links.active').text()) - 1;
        let prev_nav = $('.nav-item-' + prev);
        if(prev_nav.length > 0) {
            $('.test-list-' + (prev + 1)).addClass('hidden');
            $('.test-list-' + prev).removeClass('hidden');

            let active_nav = $('.nav-item.active');
            active_nav.removeClass('active');
            prev_nav.addClass('active');
        }
    });

    $('.next').click(function () {
        let next = parseInt($('.tab-links.active').text()) + 1;
        let next_nav = $('.nav-item-' + next);
        if(next_nav.length > 0) {
            $('.test-list-' + (next - 1)).addClass('hidden');
            $('.test-list-' + next).removeClass('hidden');

            let active_nav = $('.nav-item.active');
            active_nav.removeClass('active');
            next_nav.addClass('active');
        }
    })

})(jQuery);
