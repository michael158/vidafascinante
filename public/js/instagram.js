    var instagramToken = '37628983.2aaed5e.912e9d3bbf0f4f45a228adef952ae438';
    var code = "https://api.instagram.com/oauth/authorize/?client_id=87fa4db4f8854e5a957320ce11310409&redirect_uri=http://localhost/blog/public/blog&response_type=code";
    var getSelf = 'https://api.instagram.com/v1/users/self/media/recent/?access_token=' + instagramToken + '&count=7';

    $.ajax({
        url: getSelf,
        type: 'GET',
        dataType: 'jsonp',
        success: function (data) {
            console.log(data);
            processHtml(data.data);

        },
        error: function(){

            console.log('nao foi possivel carregar as imagens!');
        }
    });

    function processHtml(data){
        var sliderBody = $('#instagram-content');

        var i = 0;
        $(data).each(function (key,item) {
            ++i;
            var html =  '<a href="'+ item.link +'" target="_blank">';
            html +=        '<img src="'+ item.images.thumbnail.url + '" alt="...">';
            html +=     '</a>';
            sliderBody.append(html);
        });

    }

/**
 * Created by Michael on 20/04/2016.
 *
 *       <a :href="photo.link" target="_blank" v-for="photo in photos">
 <img :src="photo.images.thumbnail.url" :alt="photo.caption.text" :title="photo.caption.text">
 </a>
 */
