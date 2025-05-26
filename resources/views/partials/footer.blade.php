<footer class="text-center py-3 mt-5">
    <small>&copy; {{ date('Y') }} Gift Store. Created With ❤️ by Muhamed.</small>
</footer>
<script>
    const toggle = document.getElementById('productsToggle');
    const arrow = document.getElementById('productsArrow');
    const collapse = document.getElementById('productsMenu');

    if (collapse && arrow) {
        collapse.addEventListener('show.bs.collapse', () => arrow.classList.add('rotate'));
        collapse.addEventListener('hide.bs.collapse', () => arrow.classList.remove('rotate'));
    }
</script>
