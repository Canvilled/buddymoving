<div class="video-listing__block">
  <div class="container">
    @query([
      'post_type' => 'video'
    ])
    @hasposts
      @posts
        <x-video-item poster="{{ get_the_post_thumbnail_url(get_the_ID(),'full') }}" video="{!! wp_get_attachment_url(carbon_get_the_post_meta('video')) !!}" />
      @endposts
    @endhasposts
  </div>
</div>
