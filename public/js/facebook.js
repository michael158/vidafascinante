window.fbAsyncInit = function () {
    FB.init({
        appId: '603117079842547',
        xfbml: true,
        version: 'v2.6'
    });


    FB.Event.subscribe('edge.create',
        function (response) {
            console.log(response);
        });

};

(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.6";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));