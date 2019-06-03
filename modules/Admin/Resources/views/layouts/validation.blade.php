@if(!empty($errors) && is_array($errors))
    <div class="alert alert-info">
        <button class="close" data-close="alert"></button>
        <h4><strong>{{ count($errors) == 1 ? 'Você esqueceu de alguma coisa =)' : 'Você esqueceu de algumas coisas =)' }}</strong></h4>
        @foreach($errors as $item)
            @foreach($item as $message)
                <span> <li> {{$message}}</li></span>
            @endforeach
        @endforeach
    </div>
@endif