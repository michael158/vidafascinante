<!-- MAIS LIDOS [INICIO] -->
<div id="most-read">
    <div class="title">
        <h3>Os Mais Lidos</h3>
    </div>

    <div class="body">
        <div class="thumbnail-post" style="padding: 0">
            <div class="panel-body" style="padding: 5px">
                @foreach($mostRead as $post)
                    <a href="{{ url($post->slug) }}">
                        <div class="thumbnail"
                             style="height:200px;background: url({{ env('APP_ENV') == 'production' ? url('/uploads/posts/cover/' . $post->image ) : env('APP_URL') . '/uploads/posts/cover/' . $post->image }}); background-size: cover;margin-bottom: 4px;">
                            <div class="caption">
                                <div class="text">
                                    <p class="categorie">{{ $post->categorie->name }}</p>
                                    <p>{{ $post->title }}</p>
                                </div>
                            </div>

                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>


<style>
    #most-read .body{
        padding: 0;
    }
</style>