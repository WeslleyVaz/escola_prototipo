document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.input-action').forEach(button => {
        button.addEventListener('click', () => {
            const input = button.parentElement.querySelector('input');
            const showPassword = input.type === 'password';
            input.type = showPassword ? 'text' : 'password';
            button.setAttribute('aria-label', showPassword ? 'Ocultar senha' : 'Mostrar senha');
            button.querySelector('i').className = showPassword ? 'bi bi-eye-slash' : 'bi bi-eye';
        });
    });
    const form = document.querySelector('[data-occurrence-form]');
    if (form) {
        const fields = [...form.querySelectorAll('input, select, textarea')];
        let draft = [];
        try { draft = JSON.parse(sessionStorage.getItem('school-occurrence-draft') || '[]'); } catch {}
        fields.forEach((field, index) => {
            if (draft[index] !== undefined) field.value = draft[index];
            if (form.dataset.confirmation === 'true') {
                if (field.tagName === 'SELECT') field.disabled = true;
                else field.readOnly = true;
            }
        });
        if (form.dataset.confirmation !== 'true') {
            form.addEventListener('submit', event => {
                event.preventDefault();
                sessionStorage.setItem('school-occurrence-draft', JSON.stringify(fields.map(field => field.value)));
                window.location.href = form.dataset.confirmationUrl;
            });
        }
    }
    document.querySelectorAll('[data-table-search]').forEach(input => {
        input.addEventListener('input', () => {
            const query = input.value.toLocaleLowerCase('pt-BR').trim();
            document.querySelectorAll('.data-table tbody tr').forEach(row => {
                row.hidden = !row.textContent.toLocaleLowerCase('pt-BR').includes(query);
            });
        });
    });
});