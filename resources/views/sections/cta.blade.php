<div class="cta__block mt-[50px] bg-[linear-gradient(140deg,#2B3991_52%,_#F5F5F58F_32%)] py-[50px] max-lg:py-4 max-lg:bg-[linear-gradient(180deg,_#2B3991_50%,_#F5F5F58F_30%)]">
    <div class="container">
        <div class="grid grid-cols-2 max-lg:grid-cols-1 gap-12">
          @if($fields['heading'])
            <x-typo :tag="$fields['heading_tag']" class="text-subheading max-sm:font-medium max-lg:text-center max-sm:text-medium text-secondary font-heading" :alignment="$fields['heading_alignment'] ?? 'text-center'">
              {!! $fields['heading'] !!}
            </x-typo>
          @endif
          <div class="cta__btns">
              <div class="flex items-center justify-center gap-12">
                <x-button
                  tag="a"
                  size="medium"
                  variant="primary"
                  class="max-lg:text-secondary"
                  :href="$fields['button_left_url']"
                >
                  <x-icon-phone class="w-5 h-5" />
                  {!! $fields['button_left_text'] !!}
                </x-button>
                <x-button
                  tag="a"
                  size="medium"
                  variant="primary"
                  class="max-lg:hidden"
                  :href="$fields['button_right_url']"
                >
                  {!! $fields['button_right_text'] !!}
                  <x-icon-arrow-right class="w-5 h-5" />
                </x-button>
              </div>
          </div>
        </div>
    </div>
</div>
