<!-- DESCRICAO [INICIO] -->
<div id="owner">
    <div class="image">
        <img src="{{ env('APP_ENV') == 'production' ? url('uploads/users/' . $user->image) : env('APP_URL') . '/uploads/users/' . $user->image  }}">
    </div>
    <div class="body">
        <div class="description">
            <h3>{{ $user->name }}</h3>
            <p>
                {!! $user->description !!}
            </p>

        </div>
        {{--<div class="social text-center">--}}
        {{--<a href="{{ !empty($user->facebook) ? $user->facebook : '# ' }}" {{ !empty($user->facebook) ? 'target="_blank"' : null }}><i class="fa fa-facebook fa-2x"></i></a>--}}
        {{--<a href="{{ !empty($user->twitter) ? $user->twitter : '# ' }}" {{ !empty($user->twitter) ? 'target="_blank"' : null }}><i class="fa fa-twitter fa-2x"></i></a>--}}
        {{--<a href="{{ !empty($user->youtube) ? $user->youtube : '# ' }}" {{ !empty($user->youtube) ? 'target="_blank"' : null }}><i class="fa fa-youtube-play fa-2x"></i></a>--}}
        {{--<a href="{{ !empty($user->instagram) ? $user->instagram : '# ' }}" {{ !empty($user->instagram) ? 'target="_blank"' : null }}><i class="fa fa-instagram fa-2x"></i></a>--}}
        {{--<a href="{{ !empty($user->google_plus) ? $user->google_plus : '# ' }}" {{ !empty($user->google_plus) ? 'target="_blank"' : null }}><i class="fa fa-google-plus fa-2x"></i></a>--}}
        {{--<a href="#"><i class="fa fa-snapchat-square fa-2x"></i></a>--}}
        {{--</div>--}}
    </div>
</div>

<style>
    #owner img {
        border-radius: 50%;
        width: 250px;
    }

    #owner .description {
        font-family: "Albori Normal";
        font-size: 14px;
    }

    #owner .description h3 {
        font-family: "Great Vibes";
        font-size: 32px;
    }

</style>
