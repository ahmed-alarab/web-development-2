@yield('content')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    axios.defaults.baseURL = '{{ url('/api') }}';
    axios.defaults.headers.common['Accept'] = 'application/json';
    axios.defaults.withCredentials = true; // Needed for Sanctum
</script>
