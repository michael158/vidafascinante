<script type="text/javascript" src="{{ url('assets/admin/plugins/jquery-validate/jquery.validate.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/admin/plugins/jquery-validate/messages_pt_BR.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#form-users').validate();

        $('#input-image').on('change', function (e){

            var file = e.target.files[0];

            var reader = new FileReader();
            reader.readAsDataURL(file);

            reader.onloadend = function(e) {
                $('#img-preview').closest('.form-body').removeClass('hide');
                $('#img-preview').attr('src' , e.target.result);
            }
        });




    });
</script>