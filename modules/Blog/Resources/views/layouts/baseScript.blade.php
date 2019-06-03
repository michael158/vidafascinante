<script type="text/javascript" src="{{url('js/LAB.min.js')}}"></script>
<script>
    $LAB
            .script('{{url("js/jquery.min.js")}}').wait()
            .script('{{url('js/bootstrap.min.js')}}').wait()
            .script('{{ url("js/custom.js") }}').wait()
</script>
