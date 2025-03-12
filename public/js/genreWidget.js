document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('.genre-btn');
    const widgets = document.querySelectorAll('.genre-widget');
    const showWidget = (genre) => {
        widgets.forEach(widget => widget.classList.add('hidden'));
        document.getElementById(genre)?.classList.remove('hidden');

        buttons.forEach(button => {
            const isActive = button.dataset.genre === genre;
            button.classList.toggle('bg-green-700', isActive);
            button.classList.toggle('text-white', isActive);
            button.classList.toggle('bg-gray-100', !isActive);
            button.classList.toggle('text-gray', !isActive);
        });
    };
    buttons.forEach(button => {
        button.addEventListener('click', () => showWidget(button.dataset.genre));
    });
    showWidget('rock');
});
