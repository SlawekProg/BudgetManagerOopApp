document.addEventListener("DOMContentLoaded", function () {
    const editModal = document.getElementById('editIncomesCategoryModal');

    editModal.addEventListener('show.bs.modal', function (event) {
        const select = document.getElementById('incomesCategorySelect');
        const selectedOption = select.options[select.selectedIndex];

        if (selectedOption && selectedOption.value) {
            document.getElementById('editIncomesCategory').value = selectedOption.text;
        } else {
            alert("Najpierw wybierz kategorię!");
            event.preventDefault();
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const deleteModal = document.getElementById('deleteIncomesCategoryModal');

    deleteModal.addEventListener('show.bs.modal', function (event) {
        const select = document.getElementById('incomesCategorySelect');
        const selectedOption = select.options[select.selectedIndex];

        if (selectedOption && selectedOption.value) {
            document.getElementById('deleteIncomesCategory').value = selectedOption.text;
        } else {
            alert("Najpierw wybierz kategorię!");
            event.preventDefault();
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const editModal = document.getElementById('editExpensesCategoryModal');

    editModal.addEventListener('show.bs.modal', function (event) {
        const select = document.getElementById('expensesCategorySelect');
        const selectedOption = select.options[select.selectedIndex];

        if (selectedOption && selectedOption.value) {
            document.getElementById('editExpensesCategory').value = selectedOption.text;
        } else {
            alert("Najpierw wybierz kategorię!");
            event.preventDefault();
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const deleteModal = document.getElementById('deleteExpensesCategoryModal');

    deleteModal.addEventListener('show.bs.modal', function (event) {
        const select = document.getElementById('expensesCategorySelect');
        const selectedOption = select.options[select.selectedIndex];

        if (selectedOption && selectedOption.value) {
            document.getElementById('deleteExpensesCategory').value = selectedOption.text;
        } else {
            alert("Najpierw wybierz kategorię!");
            event.preventDefault();
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const editModal = document.getElementById('editPaymentsCategoryModal');

    editModal.addEventListener('show.bs.modal', function (event) {
        const select = document.getElementById('paymentsCategorySelect');
        const selectedOption = select.options[select.selectedIndex];

        if (selectedOption && selectedOption.value) {
            document.getElementById('editPaymentsCategory').value = selectedOption.text;
        } else {
            alert("Najpierw wybierz kategorię!");
            event.preventDefault();
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const deleteModal = document.getElementById('deletePaymentsCategoryModal');

    deleteModal.addEventListener('show.bs.modal', function (event) {
        const select = document.getElementById('paymentsCategorySelect');
        const selectedOption = select.options[select.selectedIndex];

        if (selectedOption && selectedOption.value) {
            document.getElementById('deletePaymentsCategory').value = selectedOption.text;
        } else {
            alert("Najpierw wybierz kategorię!");
            event.preventDefault();
        }
    });
});
