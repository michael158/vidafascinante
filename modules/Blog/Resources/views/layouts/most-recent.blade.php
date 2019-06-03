<section id="recent-posts">
    <div class="row">
        @foreach($mostRecent as $post)
            <div class="col-md-4">
                <a href="{{ url($post->slug) }}">
                    <div class="thumbnail"
                         style="height:340px;background: url({{ env('APP_ENV') == 'production' ?  url('/uploads/posts/cover/' . $post->image ) : env('APP_URL') . '/uploads/posts/cover/' . $post->image }}); background-size: cover;">
                        <div class="caption">
                            <div class="text">
                                <p class="categorie">{{ $post->categorie->name }}</p>
                                <p>{{ $post->title }}</p>
                            </div>
                        </div>

                    </div>
                </a>
            </div>
        @endforeach
    </div>
</section>
