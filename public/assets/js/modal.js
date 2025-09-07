// Plik: public/assets/js/modal.js

document.addEventListener("DOMContentLoaded", function () {
    /**
     * Reusable function to set up a modal.
     * @param {string} modalId - The ID of the modal element.
     * @param {string} selectId - The ID of the select dropdown.
     * @param {string} inputId - The ID of the input field inside the modal.
     */
    const setupModal = (modalId, selectId, inputId) => {
        const modalElement = document.getElementById(modalId);
        if (!modalElement) return; // Skip if modal doesn't exist on the page

        modalElement.addEventListener('show.bs.modal', function (event) {
            const select = document.getElementById(selectId);
            const selectedOption = select.options[select.selectedIndex];

            if (selectedOption && selectedOption.value) {
                document.getElementById(inputId).value = selectedOption.text;
            } else {
                alert("Najpierw wybierz kategorię!");
                event.preventDefault();
            }
        });
    };

    // Konfiguracja dla wszystkich modali
    const modalsConfig = [
        { modal: 'editIncomesCategoryModal', select: 'incomesCategorySelect', input: 'editIncomesCategory' },
        { modal: 'deleteIncomesCategoryModal', select: 'incomesCategorySelect', input: 'deleteIncomesCategory' },
        { modal: 'editExpensesCategoryModal', select: 'expensesCategorySelect', input: 'editExpensesCategory' },
        { modal: 'deleteExpensesCategoryModal', select: 'expensesCategorySelect', input: 'deleteExpensesCategory' },
        { modal: 'editPaymentsCategoryModal', select: 'paymentsCategorySelect', input: 'editPaymentsCategory' },
        { modal: 'deletePaymentsCategoryModal', select: 'paymentsCategorySelect', input: 'deletePaymentsCategory' }
    ];

    // Pętla, która konfiguruje wszystkie modale
    modalsConfig.forEach(config => {
        setupModal(config.modal, config.select, config.input);
    });
});