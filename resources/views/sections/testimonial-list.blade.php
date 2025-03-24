<div class="testimonial-list__block">
  <div class="container-content">
    <div class="flex flex-col gap-6">
      @if($fields['heading'])
        <x-typo :tag="$fields['heading_tag']" class="text-heading-title font-heading" :alignment="$fields['heading_alignment'] ?? 'text-center'">
          {!! $fields['heading'] !!}
        </x-typo>
      @endif
      @query([
          'post_type' => 'testimonial'
      ])
      @hasposts
        @posts
          <x-testimonal-item name="{{get_the_title()}}" content="{{get_the_content()}}" location="{{carbon_get_the_post_meta('location')}}" />
        @endposts
      @endhasposts
    </div>
  </div>
</div>
