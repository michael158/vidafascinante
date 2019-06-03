<script type="text/javascript" src="{{ url('assets/admin/plugins/jquery-validate/jquery.validate.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/admin/plugins/jquery-validate/messages_pt_BR.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $('.datepicker').datetimepicker({
            format: 'dd/mm/yyyy hh:ii',
            startDate: new Date(),
            autoclose: true,
            language: 'pt-BR'
        });


        $.validator.setDefaults({
            ignore: ''
        });
        $('#form-posts').validate();
        //--------------------------------------------------------------------------------------------------------------
        // PLUGINS INIT
        //--------------------------------------------------------------------------------------------------------------
        $('#tags').select2();

        tinymce.init({
            selector: 'textarea',
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern imagetools"
            ],
            toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            toolbar2: "print preview | media | forecolor backcolor | emoticons | fontsizeselect | fullscreen",
            fontsize_formats:'6pt 8pt 10pt 12pt 14pt 18pt 24pt 36pt',
            templates: [
                { title: 'Test template 1', content: 'Test 1' },
                { title: 'Test template 2', content: 'Test 2' }
            ],
            language: 'pt_BR'
        });

        //--------------------------------------------------------------------------------------------------------------
        // IMAGE PREVIEW
        //--------------------------------------------------------------------------------------------------------------
        $('#input-image').on('change', function (e) {

            var file = e.target.files[0];

            var reader = new FileReader();
            reader.readAsDataURL(file);

            reader.onloadend = function (e) {
                $('#img-preview').closest('.form-body').removeClass('hide');
                $('#img-preview').attr('src', e.target.result);
            }

        });


        // Desativar o envio do formulario ao apertar enter
        $(document).keypress(function (e) {
            var code = null;
            code = (e.keyCode ? e.keyCode : e.which);
            return code == 13 ? false : true;
        });

    });
</script>