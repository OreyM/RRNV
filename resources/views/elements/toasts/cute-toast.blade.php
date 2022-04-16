@if(session('success'))
    <script>
        window.onload = () => {
            cuteToast({
                type: 'success',
                message: '{{ session()->get('success') }}',
                timer: 5000
            })
        }
    </script>
@endif

@if(session('info'))
    <script>
        window.onload = () => {
            cuteToast({
                type: 'info',
                message: '{{ session()->get('info') }}',
                timer: 5000
            })
        }
    </script>
@endif

@if(session('warning'))
    <script>
        window.onload = () => {
            cuteToast({
                type: 'warning',
                message: '{{ session()->get('warning') }}',
                timer: 5000
            })
        }
    </script>
@endif

@if(session('error'))
    <script>
        window.onload = () => {
            cuteToast({
                type: 'error',
                message: '{{ session()->get('error') }}',
                timer: 5000
            })
        }
    </script>
@endif

@if($errors->all())
    <script>
        window.onload = () => {
            cuteToast({
                type: 'error',
                message: '<ul> @foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>',
                timer: 5000
            })
        }
    </script>
@endif
