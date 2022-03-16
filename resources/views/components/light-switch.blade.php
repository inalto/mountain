<div x-data="" class="flex justify-center">
    <a href="" x-on:click.prevent="document.body.classList.remove('dark');document.body.classList.add('light');localStorage.theme = 'light'" class="text-gray-600 p-2"><i class="fa fa-sun"></i></a>
    <a href="" x-on:click.prevent="document.body.classList.add('dark');document.body.classList.remove('light');localStorage.theme = 'dark'" class="text-gray-600 p-2"><i class="fa fa-moon"></i></a>
    <a href="" x-on:click.prevent="document.body.classList.remove('light');document.body.classList.remove('dark');localStorage.removeItem('theme')" class="text-gray-600 p-2"><i class="fa fa-magic"></i></a>
</div>
@push('scripts')
<script type="text/javascript">
if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
  document.body.classList.add('dark')
} else {
  document.body.classList.remove('dark')
}
</script>
@endpush