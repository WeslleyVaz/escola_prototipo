document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('#form-salvar-inspetora');

    if (!form) {
        return;
    }

    const result = document.querySelector('#resultado-cadastro');
    const submitButton = document.querySelector('#salvar-inspetora');

    form.addEventListener('submit', async (event) => {
        event.preventDefault();
        result.textContent = '';
        submitButton.disabled = true;

        const formData = new FormData(form);
        const payload = Object.fromEntries(formData.entries());
        payload.cpf = payload.cpf.replace(/\D/g, '');

        try {
            const response = await fetch('/api/salvar_inspetora', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(payload),
            });
            const data = await response.json();

            if (!response.ok || data.erro === 's') {
                const validationMessages = Object.values(data.errors ?? {}).flat();
                throw new Error(validationMessages.join(' ') || data.message || 'Não foi possível cadastrar a inspetora.');
            }

            form.reset();
            result.textContent = data.message || 'Inspetora cadastrada com sucesso.';
        } catch (error) {
            result.textContent = error.message || 'Não foi possível conectar ao servidor.';
        } finally {
            submitButton.disabled = false;
        }
    });
});