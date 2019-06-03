<div class="modal fade" id="modal-delete" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                Deseja realmente excluir esse registro?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn default" data-dismiss="modal">Não</button>
                <button type="button" class="btn red btn-confirm">Sim</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
    $(document).on('click','.btn-delete', function (){
       var url = $(this).attr('data-href');
        $('.btn-confirm'). attr('data-href', url);
    });


    $(document).on('click', '.btn-confirm', function () {
        var url = $(this).attr('data-href');
        window.location.href = url;
    })
</script>