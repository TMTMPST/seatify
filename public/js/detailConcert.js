document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('.toggle-btn');
    const sections = document.querySelectorAll('.toggle-section');
    const showSection = (sectionId) => {
        sections.forEach(section => section.classList.toggle('hidden', section.id !== sectionId));

        buttons.forEach(btn => {
            const isActive = btn.dataset.section === sectionId;
            btn.classList.toggle('bg-blue-800', isActive);
            btn.classList.toggle('text-white', isActive);
            btn.classList.toggle('bg-gray-100', !isActive);
            btn.classList.toggle('text-gray-500', !isActive);
        });
    };
    showSection('biodata');
    buttons.forEach(button => 
        button.addEventListener('click', () => showSection(button.dataset.section))
    );
});