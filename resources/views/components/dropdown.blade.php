@props(['trigger'])
<!-- x-data available thru alpine js plugin in the post-header.blade  -->
<!--  click away from dropwdown and it will close -->
<div x-data="{show: false}" @click.away="show = false">
   
   <div @click="show = ! show"> 
    {{ $trigger }}
   </div>

    <!-- DROPDOWN LINKS -->
    <div x-show="show" class="py-2 absolute bg-gray-100 rounded-xl w-full z-50 overflow-auto max-h-52" style="display: none;">
        {{ $slot }}
    </div>
</div>