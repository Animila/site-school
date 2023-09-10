function filterTable() {
    // Получаем текст из поля ввода поиска
    const searchText = document.querySelector('input[type="text"]').value.toLowerCase();

    // Получаем все строки таблицы (кроме заголовка)
    const rows = document.querySelectorAll('table tr.table-body');

    // Перебираем все строки и скрываем те, которые не соответствуют поисковому запросу
    rows.forEach(row => {
        const cells = row.getElementsByTagName('td');
        let rowMatchesSearch = false;

        // Перебираем ячейки в строке и проверяем наличие текста поиска
        for (let i = 0; i < cells.length; i++) {
            const cellText = cells[i].textContent.toLowerCase();
            if (cellText.includes(searchText)) {
                rowMatchesSearch = true;
                break;
            }
        }

        // Показываем или скрываем строку в зависимости от результата поиска
        if (rowMatchesSearch) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

// Добавляем обработчик события на изменение текста в поле поиска
document.querySelector('#searchInput').addEventListener('input', filterTable);
