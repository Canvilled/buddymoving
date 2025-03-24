<div class="video-listing__block">
  <div class="container-content">
    @query([
      'post_type' => 'video'
    ])
    @hasposts
      @posts
        <x-video-item poster="{{ get_the_post_thumbnail_url(get_the_ID(),'full') }}" video="{{carbon_get_the_post_meta('video')}}" />
      @endposts
    @endhasposts
  </div>
</div>
