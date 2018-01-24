/* global $ */
(function () {
    "use strict";
    //var item;
    var mainImg = $('#main-img');
    var firstThumbnail = $('#first-thumbnail');
    var seconThumbnail = $('#second-thumbnail');
    var thirdThumbnail = $('#third-thumbnail');
    var currentBid = $('#current-bid');
    var curBidAmount; // variable to save current bid amount from the cookie
    var numOfBids = $('#bid-amount');
    var bidForm = $('#bid-form');
    var table = $('#table'); //the link from auctionItems to diplay the item
    var pageIndex = 1; // keeps track of page number
    var amountOfItems; // how many items in the database
    var amountPerPage = 4;
    console.log(amountOfItems);

    // get the amount of items in the database
    $.getJSON('models/amountOfItems.php', function (items) {
        amountOfItems = items;
        var pages = Math.ceil(amountOfItems / amountPerPage); // max amount of pages
        nextPage(pages);
    });

    // load the next page on auction items
    function nextPage(pages) {
        $('#pager').click(function (e) {
            console.log('pages ', pages);
            if (e.target.innerHTML === 'Next page') {
                if (++pageIndex > pages) {
                    pageIndex = 1;
                    //console.log('page index ', pageIndex);
                }
            } else if (e.target.innerHTML === 'Previous page') {
                if (--pageIndex <= 0) {
                    pageIndex = 1;
                    console.log('page index ', pageIndex);
                }
            }
            $.getJSON('models/auctionItemsModel.php', { auctionPage: pageIndex },
                function (content) {
                    var reloadTable = '';
                    content.forEach(function (e) {
                        reloadTable += '<tr><td><button class="btn btn-link" id="' + e.id + '">' +
                            e.productName + '</button></td>' +
                            '<td>' + e.cur_bid + '</td>' +
                            '<td><img src="' + e.mainImage + '"class="thumbnail" ' +
                            'id = "table-img" ></td></tr >';
                        //console.log(e);
                    });
                    table.html(reloadTable);
                    //console.log(content);
                });
        });
    }    

      // submit the sell form with ajax
      $("#sell-form").on("submit", function (event) {
          event.preventDefault();
            $.ajax({
                url: 'models/sellFormModel.php',
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (ret) {
                    if (ret) { //if we got back a error
                        //console.log(typeof ret);
                        var error = JSON.parse(ret);
                        $.each(error.error, function (index, err) {
                            $('#formErrorMsg').append( //append to the modal
                                '<li class="list-group-item-danger text-left">' + err + '</li>'
                            );
                        });
                        $('#formModal').modal('toggle'); //show error message
                    } else {
                        $(location).attr('href', 'index.php?action=auctionItems'); //redirect to auction items page
                    }    
                },
                error: function (jqxhr) {
                    console.log("Error: " + jqxhr.responseText);
                }
            });
      
      });

    table.click(function (e) {
        if (e.target.nodeName === 'BUTTON') { //only if the button is clicked not the div
            //console.log($(e.target)[0].attributes[1].nodeValue);
            var id = $(e.target)[0].attributes[1].nodeValue; //get the button id 
            $.cookie('item', id); //store json data in cookie to be used after re-direct
            $(location).attr('href', 'index.php?action=auction');//display auction page
        }    
    });
    function formatDecimal(num) {
        return '$' + parseFloat(Math.round(num * 100) / 100).toFixed(2);
    }

    //function to parse the cookie to json
    function getCookie(cookie) {
        if($.cookie(cookie)) {
            return $.cookie(cookie);
        }    
    }

    //set the page 
    function getJson(){
        $.getJSON('models/auctionViewModel.php', {
            id: getCookie('item')
        }, function (res) {
           // console.log(res);
            setAuctionPage(res);
        });
    }

    function setAuctionPage(item){
        //var item = getCookie('item');
        curBidAmount = parseFloat(item[0].curBid); 
        $('#product-title').text(item[0].title);
        mainImg.attr('src', item[0].mainImage);
        firstThumbnail.attr('src', item[0].subImg1);
        seconThumbnail.attr('src', item[0].subImg2);
        thirdThumbnail.attr('src', item[0].subImg3);
        $('#item-condition').text(item[0].productCondition);
        $('#product-description').text(item[0].description);
        $('#seller-name').text(item[0].user_name);
        $('#seller-email').text(item[0].email);
        $('#place-amount').text(formatDecimal(curBidAmount + 1));
        numOfBids.text(item[0].bidsAmount);
        currentBid.text(formatDecimal(curBidAmount));
        var now = Math.floor(new Date() / 1000);
        var sec = Math.floor((item[0].end_day) - now);
        $('#timerCircles').attr('data-timer', sec).TimeCircles({
            count_past_zero: false
        }).addListener(function (unit, value, total) {
            if (total <= 0) { 
                $.post('models/emailModel.php', { item: item[0].productId });
            }
        });
       // console.log(item);
    }

    if (getCookie('item')) { 
        getJson();
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

    bidForm.on('submit', function (event) {
        //console.log(bidForm[0][0].value);
        //console.log('current bid', curBidAmount);
        $.post('models/bidModel.php', {
            productId: getCookie('item'),
            amountToBid: curBidAmount +1,
            amount: bidForm.find('input').val()
        }, function (result) {
            if (result) { //if we got back a error
                var error = JSON.parse(result);
                $.each(error.error, function (index, err) {
                    $('#errorMsg').append( //append to the modal
                        '<li class="list-group-item-danger text-left">' + err + '</li>'
                    );
                });
                $('#myModal').modal('toggle'); //show error message
            } else {
                getJson();
            }    
        }).fail(function () {
            console.error('bid failed');
        });
        event.preventDefault();
    });

}()); 