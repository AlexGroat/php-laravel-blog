    <!-- render success flash upon user creation -->
    @if (session()->has('success'))
    <!-- sets default popup to true, after 4 seconds set to false -->
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
         class="fixed bottom-3 right-3 bg-blue-500 text-white py-2 px-4 border rounded-20">
        <p>{{ session('success') }}</p>
    </div>
    @endif