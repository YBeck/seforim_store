/* global $ */
(function () {
    "use strict";
    var mainImg = $('#main-img');
    var firstThumbnail = $('#first-thumbnail');
    var seconThumbnail = $('#second-thumbnail');
    var thirdThumbnail = $('#third-thumbnail');
    var itemClick = $('#item-link'); //the link from auctionItems to diplay the item
    // to set the countdown clock
    var days = $('#days');
   
    var hours = $('#hour');
    console.log(hours);
    var minutes = $('#min');
    var seconds = $('#sec');

      // submit the sell form with ajax
      $("#sell-form").on("submit", function (event) {
          event.preventDefault();
          $.post('models/sellFormModel.php', $(this).serialize(), function () {
              //console.log(ret);
          }).fail(function (jqxhr) {
              console.log("Error: " + jqxhr.responseText);
          });
      });

    itemClick.click(function (e) {
        if (e.target.nodeName === 'BUTTON') { //only if the button is clicked not the div
            //console.log($(e.target)[0].attributes[1].nodeValue);
            var id = $(e.target)[0].attributes[1].nodeValue; //get the button id
            
            $.get('models/auctionViewModel.php?id=' + id, function (res) {
                // console.log(res);
               // $.cookie.json = true; //instead of  JSON.stringify()
                $.cookie('item', res); //store json data in cookie to be used after re-direct
            });
           $(location).attr('href', 'index.php?action=auction');//display auction page
        }    
    });

    // function to pad a element
    function padLeft(paddee, padder, length) {
        var result = paddee.toString();
        while (result.length < length) {
            result = padder + result;
        }
        return result;
    }

    //function to set the countdown clock to always display 2 digits
    function ensureTwoDigits(number) {
        return padLeft(number, '0', 2);
    }

    //function to display the days left
    function setDays(day) {
        if (day > 1) {
            return day + ' days ';
        } else if (day === 1) {
            return day + ' day ';
        }
        return 'Today ';
    }

    function setTimer(endtime) {
        var endDay = endtime;
        //console.log('endDay ', endDay);
        var now = Math.floor(new Date() / 1000);
        //console.log('current time ', now);
        var sec = Math.floor(endDay - now);
        // console.log('seconds ', sec);
        var min = Math.floor(sec / 60);
        //console.log('minutes ', min);
        var hour = Math.floor(min / 60);
        //console.log('hour ', hour);
        var day = Math.floor(hour / 24);
        //console.log('day ', day);
        if (sec > 59) {
            sec = sec % 60;
        }

        if (min > 59) {
            min = min % 60;
        }

        if (hour > 23) {
            hour = hour % 24;
        }
        //console.log('day: ', day, 'hour ', hour, 'min: ', min, 'sec ', sec);
        days.text(setDays(day));
        hours.text(ensureTwoDigits(hour) + 'h ');
        minutes.text(ensureTwoDigits(min) + 'm ');
        seconds.text(ensureTwoDigits(sec) + 's');

    }

    if ($.cookie('item')) {
        var item = JSON.parse($.cookie('item'));         
        $('#product-title').text(item[0].title);
        mainImg.attr('src', item[0].mainImage);
        firstThumbnail.attr('src', item[0].subImg1);
        seconThumbnail.attr('src', item[0].subImg2);
        thirdThumbnail.attr('src', item[0].subImg3);
        $('#item-condition').text(item[0].productCondition);
        $('#product-description').text(item[0].description);
        $('#seller-name').text(item[0].user_name);
        $('#seller-email').text(item[0].email);
        setInterval(function () {
            setTimer(item[0].end_day);
        }, 1000);
        //console.log(item);
    }

    // the thumb image that is moused over will become the main image
    // and the main image will become that thumb image
    firstThumbnail.on('mouseenter', function () {
        var mainImgSrc = mainImg.attr('src');
        var firstThumbnailSrc = firstThumbnail.attr('src');
        firstThumbnail.attr('src', mainImgSrc);
        mainImg.attr('src', firstThumbnailSrc);
    });
    seconThumbnail.on('mouseenter', function () {
        var mainImgSrc = mainImg.attr('src');
        var firstThumbnailSrc = seconThumbnail.attr('src');
        seconThumbnail.attr('src', mainImgSrc);
        mainImg.attr('src', firstThumbnailSrc);
    });
    thirdThumbnail.on('mouseenter', function () {
        var mainImgSrc = mainImg.attr('src');
        var firstThumbnailSrc = thirdThumbnail.attr('src');
        thirdThumbnail.attr('src', mainImgSrc);
        mainImg.attr('src', firstThumbnailSrc);
    });

}()); 