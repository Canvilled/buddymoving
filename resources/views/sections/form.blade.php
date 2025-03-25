<div class="form__block bg-primary py-12 mt-[50px]">
  <div class="container-content-big">
      <div class="grid grid-cols-12 gap-[60px] max-lg:gap-5">
          <div class="col-span-4 flex flex-col gap-4 max-lg:col-span-12">
            @if($fields['heading'])
              <x-typo :tag="$fields['heading_tag']" class="text-big-heading max-lg:text-big-heading-mb text-secondary font-heading" :alignment="$fields['heading_alignment'] ?? 'text-center'">
                {!! $fields['heading'] !!}
              </x-typo>
            @endif
              @if($fields['subtitle'])
                <x-typo :tag="$fields['subtitle_tag']" class="text-base font-normal text-white font-heading" :alignment="$fields['subtitle_alignment'] ?? 'text-center'">
                  {!! $fields['subtitle'] !!}
                </x-typo>
              @endif
          </div>
          <div class="col-span-8 max-lg:col-span-12">
             <div class="form__block-content">
                {!! do_shortcode($fields['form_shortcode']) !!}
             </div>
          </div>
      </div>
  </div>
</div>
