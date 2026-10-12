import './bootstrap';

const loginForm = document.querySelector('[data-login-form]');

if (loginForm instanceof HTMLFormElement) {
    const emailInput = loginForm.elements.namedItem('email');
    const passwordInput = loginForm.elements.namedItem('password');

    const validateField = (field) => {
        if (!(field instanceof HTMLInputElement)) {
            return true;
        }

        const error = loginForm.querySelector(`[data-error-for="${field.name}"]`);
        let message = '';
        field.setCustomValidity('');

        if (field.value.trim() === '') {
            message = 'Bagian ini wajib diisi.';
        } else if (field.type === 'email' && !field.validity.valid) {
            message = 'Masukkan alamat email yang valid.';
        }

        field.setCustomValidity(message);

        if (error instanceof HTMLElement) {
            error.textContent = message;
        }

        field.setAttribute('aria-invalid', String(message !== ''));
        return message === '';
    };

    [emailInput, passwordInput].forEach((field) => {
        if (field instanceof HTMLInputElement) {
            field.addEventListener('input', () => validateField(field));
        }
    });

    loginForm.addEventListener('submit', (event) => {
        const fieldsAreValid = [emailInput, passwordInput]
            .map(validateField)
            .every(Boolean);

        if (!fieldsAreValid) {
            event.preventDefault();
            loginForm.querySelector('[aria-invalid="true"]')?.focus();
        }
    });
}
