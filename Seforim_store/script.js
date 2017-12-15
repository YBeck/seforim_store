/* global $ */
(function () {
    "use strict";
    var mainImg = $('#main-img');
    var firstThumbnail = $('#first-thumbnail');
    var seconThumbnail = $('#second-thumbnail');
    var thirdThumbnail = $('#third-thumbnail');
    var itemClick = $('#item-link');

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
            
            $.getJSON('models/auctionViewModel.php?id=' + id, function (res) {
                // console.log(res);
                $.cookie.json = true; //instead of  JSON.stringify()
                $.cookie('item', res); //store json data in cookie to be used after re-direct
            });
           $(location).attr('href', 'index.php?action=auction');//display auction page
        }    
    });

    if ($.cookie('item')) {
        var item = JSON.parse($.cookie('item'));
        $('#product-title').text(item[0].title);
        mainImg.attr('src', item[0].mainImage);
        firstThumbnail.attr('src', item[0].subImg1);
        seconThumbnail.attr('src', item[0].subImg2);
        thirdThumbnail.attr('src', item[0].subImg3);
        $('#item-condition').text(item[0].productCondition);
        $('#product-description').text(item[0].description);
        $('#seller-name').text(item[0].userName);
        $('#seller-email').text(item[0].email);
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

    
    
   // DATE_ADD(NOW(), INTERVAL 7 DAY)
   // window.location = "//www.aspsnippets.com/";
   // window.location.replace('<URL of the new page>');
   //UPDATE events SET date_starts = DATE_ADD(date_starts,INTERVAL 14 DAY) WHERE event_id = 3;

   //mysql> SELECT TIMEDIFF('2000:01:01 00:00:00',
   //- > '2000:01:01 00:00:00.000001');
}()); 