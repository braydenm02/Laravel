<footer id="footer-license" class="text-center mt-auto p-3">
    © 2025-present Brayden Miranda, Ana Cedillo.
    @if (!str_contains(strtolower(request()->path()), 'license'))
        <a href="{{ url('license') }}">The information contained herein is subject to change without notice.</a>
    @else
        The information contained herein is subject to change without notice.
    @endif
</footer>