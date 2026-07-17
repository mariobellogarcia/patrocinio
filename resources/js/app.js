const registrationForm = document.querySelector('#registration-form');

const reviewButton = document.querySelector(
    '#review-registration-button'
);

const reviewModal = document.querySelector(
    '#registration-review-modal'
);

const reviewSummary = document.querySelector(
    '#registration-review-summary'
);

const continueEditingButton = document.querySelector(
    '#continue-editing-button'
);

const confirmButton = document.querySelector(
    '#confirm-registration-button'
);

if (
    registrationForm &&
    reviewButton &&
    reviewModal &&
    reviewSummary &&
    continueEditingButton &&
    confirmButton
) {
    const birthDateInput = document.querySelector(
        '#player_birth_date'
    );

    const dniInputs = document.querySelectorAll(
        '#player_dni, #guardian_dni'
    );

    const phoneInputs = document.querySelectorAll(
        '#player_contact_phone, #guardian_phone, #guardian_secondary_phone'
    );

    /*
     * Convierte automáticamente 12092015 en 12/09/2015.
     */
    birthDateInput?.addEventListener('input', (event) => {
        const input = event.currentTarget;

        let value = input.value.replace(/\D/g, '').slice(0, 8);

        if (value.length >= 5) {
            value = `${value.slice(0, 2)}/${value.slice(2, 4)}/${value.slice(4)}`;
        } else if (value.length >= 3) {
            value = `${value.slice(0, 2)}/${value.slice(2)}`;
        }

        input.value = value;
    });

    /*
     * Convierte la letra del DNI automáticamente a mayúscula.
     */
    dniInputs.forEach((input) => {
        input.addEventListener('input', () => {
            input.value = input.value
                .replace(/[^0-9A-Za-z]/g, '')
                .toUpperCase()
                .slice(0, 9);
        });
    });

    /*
     * Permite únicamente números en los teléfonos.
     */
    phoneInputs.forEach((input) => {
        input.addEventListener('input', () => {
            input.value = input.value
                .replace(/\D/g, '')
                .slice(0, 9);
        });
    });

    /*
     * Primer clic:
     * valida el HTML y abre el resumen.
     */
    reviewButton.addEventListener('click', () => {
        clearClientErrors();

        if (!registrationForm.reportValidity()) {
            markInvalidFields();

            return;
        }

        if (!isBirthDateBeforeToday()) {
            showClientError(
                birthDateInput,
                'La fecha de nacimiento debe ser anterior al día de hoy.'
            );

            birthDateInput.focus();

            return;
        }

        buildReviewSummary();
        openModal();
    });

    /*
     * Permite regresar al formulario sin perder datos.
     */
    continueEditingButton.addEventListener('click', () => {
        closeModal();
    });

    /*
     * Cierra el modal al pulsar fuera de su contenido.
     */
    reviewModal.addEventListener('click', (event) => {
        if (event.target === reviewModal) {
            closeModal();
        }
    });

    /*
     * Cierra el modal con Escape.
     */
    document.addEventListener('keydown', (event) => {
        if (
            event.key === 'Escape' &&
            !reviewModal.classList.contains('hidden')
        ) {
            closeModal();
        }
    });

    /*
     * Segundo clic:
     * bloquea el botón y envía el formulario a Laravel.
     */
    confirmButton.addEventListener('click', () => {
        if (!registrationForm.reportValidity()) {
            closeModal();

            return;
        }

        confirmButton.disabled = true;
        confirmButton.textContent = 'Registrando…';
        confirmButton.classList.add('cursor-not-allowed', 'opacity-60');

        registrationForm.requestSubmit();
    });

    function buildReviewSummary() {
        const data = new FormData(registrationForm);

        const categorySelect = document.querySelector(
            '#player_category_id'
        );

        const relationshipSelect = document.querySelector(
            '#guardian_relationship'
        );

        const rows = [
            {
                label: 'Jugador',
                value: joinNames(
                    data.get('player[first_name]'),
                    data.get('player[last_name]'),
                    data.get('player[second_last_name]')
                ),
            },
            {
                label: 'Fecha de nacimiento',
                value: data.get('player[birth_date]'),
            },
            {
                label: 'Sexo',
                value: getSelectedText('#player_gender'),
            },
            {
                label: 'DNI del menor',
                value:
                    data.get('player[dni]') === '0'
                        ? 'No dispone de DNI'
                        : data.get('player[dni]'),
            },
            {
                label: 'Teléfono de contacto',
                value: data.get('player[contact_phone]'),
            },
            {
                label: 'Correo de contacto',
                value: data.get('player[contact_email]'),
            },
            {
                label: 'Responsable',
                value: joinNames(
                    data.get('guardian[first_name]'),
                    data.get('guardian[last_name]'),
                    data.get('guardian[second_last_name]')
                ),
            },
            {
                label: 'Relación con el menor',
                value:
                    relationshipSelect?.options[
                        relationshipSelect.selectedIndex
                    ]?.text ?? '',
            },
            {
                label: 'DNI del responsable',
                value: data.get('guardian[dni]'),
            },
            {
                label: 'Teléfono principal',
                value: data.get('guardian[phone]'),
            },
            {
                label: 'Segundo teléfono',
                value:
                    data.get('guardian[secondary_phone]') ||
                    'No indicado',
            },
            {
                label: 'Correo del responsable',
                value: data.get('guardian[email]'),
            },
            {
                label: 'Dirección',
                value: `${data.get('guardian[address]')}, ${data.get('guardian[postal_code]')} ${data.get('guardian[city]')}`,
            },
            {
                label: 'Categoría',
                value:
                    categorySelect?.options[
                        categorySelect.selectedIndex
                    ]?.text ?? '',
            },
            {
                label: 'Reglamento interno',
                value: data.has(
                    'guardian[school_rules_accepted]'
                )
                    ? 'Aceptado'
                    : 'No aceptado',
            },
            {
                label: 'Protección de datos',
                value: data.has(
                    'guardian[privacy_accepted]'
                )
                    ? 'Aceptada'
                    : 'No aceptada',
            },
            {
                label: 'Autorización de imagen',
                value: data.has('guardian[image_consent]')
                    ? 'Autorizada'
                    : 'No autorizada',
            },
        ];

        reviewSummary.replaceChildren();

        rows.forEach(({ label, value }) => {
            const row = document.createElement('div');

            row.className =
                'grid gap-1 border-b border-gray-200 pb-3 last:border-0 sm:grid-cols-3';

            const labelElement = document.createElement('strong');

            labelElement.className = 'text-gray-800';
            labelElement.textContent = label;

            const valueElement = document.createElement('span');

            valueElement.className =
                'break-words text-gray-700 sm:col-span-2';

            valueElement.textContent =
                String(value ?? '').trim() || 'No indicado';

            row.append(labelElement, valueElement);
            reviewSummary.append(row);
        });
    }

    function isBirthDateBeforeToday() {
        if (!birthDateInput) {
            return false;
        }

        const match = birthDateInput.value.match(
            /^(\d{2})\/(\d{2})\/(\d{4})$/
        );

        if (!match) {
            return false;
        }

        const [, day, month, year] = match;

        const birthDate = new Date(
            Number(year),
            Number(month) - 1,
            Number(day)
        );

        /*
         * Detecta fechas inexistentes como 31/02/2015.
         */
        const isRealDate =
            birthDate.getFullYear() === Number(year) &&
            birthDate.getMonth() === Number(month) - 1 &&
            birthDate.getDate() === Number(day);

        if (!isRealDate) {
            showClientError(
                birthDateInput,
                'La fecha introducida no existe.'
            );

            return false;
        }

        const today = new Date();

        today.setHours(0, 0, 0, 0);
        birthDate.setHours(0, 0, 0, 0);

        return birthDate < today;
    }

    function showClientError(input, message) {
        if (!input) {
            return;
        }

        input.classList.remove('border-gray-300');
        input.classList.add('border-red-500');

        const error = document.createElement('p');

        error.dataset.clientError = 'true';
        error.className = 'mt-2 text-sm font-medium text-red-600';
        error.textContent = message;

        input.insertAdjacentElement('afterend', error);
    }

    function clearClientErrors() {
        document
            .querySelectorAll('[data-client-error="true"]')
            .forEach((element) => element.remove());

        registrationForm
            .querySelectorAll('.border-red-500')
            .forEach((field) => {
                field.classList.remove('border-red-500');
                field.classList.add('border-gray-300');
            });
    }

    function markInvalidFields() {
        const invalidFields = registrationForm.querySelectorAll(
            ':invalid'
        );

        invalidFields.forEach((field) => {
            field.classList.remove('border-gray-300');
            field.classList.add('border-red-500');
        });

        invalidFields[0]?.focus();
    }

    function openModal() {
        reviewModal.classList.remove('hidden');
        reviewModal.classList.add('flex');

        document.body.classList.add('overflow-hidden');

        confirmButton.disabled = false;
        confirmButton.textContent = 'Confirmar y registrar';
        confirmButton.classList.remove(
            'cursor-not-allowed',
            'opacity-60'
        );

        confirmButton.focus();
    }

    function closeModal() {
        reviewModal.classList.add('hidden');
        reviewModal.classList.remove('flex');

        document.body.classList.remove('overflow-hidden');

        reviewButton.focus();
    }

    function joinNames(...values) {
        return values
            .map((value) => String(value ?? '').trim())
            .filter(Boolean)
            .join(' ');
    }

    function getSelectedText(selector) {
        const select = document.querySelector(selector);

        return (
            select?.options[select.selectedIndex]?.text ?? ''
        );
    }
}