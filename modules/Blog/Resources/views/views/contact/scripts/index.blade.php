<script src="{{ url('assets/admin/js/jquery.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ url('assets/admin/plugins/jquery-validate/jquery.validate.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/admin/plugins/jquery-validate/messages_pt_BR.min.js') }}"></script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
<script>
        $('form').validate();

        var onloadCallback = function() {
            grecaptcha.render('recaptcha', {
                'sitekey' : '6LeAUBQUAAAAAJ5hlS0-9oqpDKkcnX8PSBqgnGtz',
                'callback' : correctCaptcha
            });

        };

        var correctCaptcha = function (response) {
            var html = '<button type="submit" class="btn btn-primary m-b-15" id="btn-contact">Enviar</button>';
            $('#recaptcha').remove();
            $('#form-contact').append(html);
        };

        jQuery.extend(jQuery.validator.messages, {
            required: "Esse campo é obrigatório.",
            email: "Por favor insira um endereço de email válido.",
        });

        var form = $('#form-contact');

        form.validate();
</script>