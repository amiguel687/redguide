$(() => {
    var getWeatherData = function (city) {
        $.ajax({
            url: 'https://api.openweathermap.org/data/2.5/weather?q=' + city + '&units=metric' + '&APPID=' + window.openwApiKey,
            type: 'GET',
            contentType: 'application/json; charset=utf-8',
            dataType: 'jsonp',
            success: function (response) {
                //console.log(response);
                $('.city-name').html(response.name);
                $('.city-degrees').html(response.main.temp + '<sup>°C</sup>');
                $('.city-condition').html(response.weather[0].main);
            }

        });
    }

    var getVenuesData = function (city, category, date, venue_type) {
        $.ajax({
            url: ' https://api.foursquare.com/v2/venues/search?near=' + city + '&limit=10&categoryId=' + category + '&client_id=' + window.fCID + '&client_secret=' + window.fCSecret + '&v=' + date,
            type: 'GET',
            contentType: 'application/json; charset=utf-8',
            dataType: 'jsonp',
            success: function (response) {
                $('.panel-venue').removeClass('hide');
                if (response.length != 0) {
                    var html = '<h4 class="text-center">Top ' + venue_type + ' Venues</h4>';
                    html += '<hr>';
                    html += '<table class="table venue-table">';
                    html += '<thead>';
                    html += '<th>#</th>';
                    html += '<th>Name</th>';
                    html += '<th>&nbsp;</th>';
                    html += '</thead>';
                    html += '<tbody class="venue-table-data"></tbody>';
                    html += '</table>';
                    $('.panel-venue').html(html);
                    //console.log(response);
                    $.each(response.response.venues, function (key, value) {
                        //console.log(value);
                        var html='<tr>';
                        html+='<td>'+(key+1)+'</td>';
                        html+='<td>'+value.name+'</td>';
                        html+='<td><i class="fa fa-globe btn-get-directions" data-location="'+value.location.lat+','+value.location.lng+'" title="Get Directions"></i></td>';
                        html+='</tr>';
                        $('.venue-table-data').append(html);
                    })
                }
                else {
                    var html = '<div class="no-venue-found text-center">';
                    html += '<i class="fa fa-exclamation-circle"></i>';
                    html += '<p class="text-center">No venues found.<br> Please check again another time. Thank you!</p>';
                    html += '</div>';
                    $('.panel-venue').html(html);
                }
            }

        });
    }

    $(document)
        .off('change', '.city-selector')
        .on('change', '.city-selector', function () {
            $('.panel-venue').addClass('hide');
            if ($(this).val() != "") {
                //console.log(moment().format('YYYYMMDD'));
                getWeatherData($('.city-selector option:selected').text());
                $('.btn-venue-category').attr('disabled', false);
                $('.panel-weather').removeClass('hide');
            }
            else {
                $('.btn-venue-category').attr('disabled', true);
                $('.panel-weather').addClass('hide');
            }
        })
        .off('click', '.btn-venue-category')
        .on('click', '.btn-venue-category', function () {
            getVenuesData($('.city-selector option:selected').text(), $(this).data('category'), moment().format('YYYYMMDD'), $(this).text());
        })
        .off('click', '.btn-get-directions')
        .on('click', '.btn-get-directions', function () {
            window.open('http://maps.google.com/?q='+$(this).data('location'),'_blank');
        })
})