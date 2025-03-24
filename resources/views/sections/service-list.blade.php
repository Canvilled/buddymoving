<div class="section">
    <div class="container-content">
        <div class="flex flex-col gap-6">
            @if($fields['heading'])
                <x-typo :tag="$fields['heading_tag']" class="text-heading-title font-heading" :alignment="$fields['heading_alignment'] ?? 'text-center'">
                    {!! $fields['heading'] !!}
                </x-typo>
            @endif
            @if(!empty($fields['service_item']))
               <div class="grid grid-cols-3 max-xl:grid-cols-2 max-md:grid-cols-1 gap-5">
                   @foreach($fields['service_item'] as $item)
                       <x-service-item :title="$item['title']" :description="$item['description']"></x-service-item>
                   @endforeach
               </div>
            @endif
        </div>
    </div>
</div>
