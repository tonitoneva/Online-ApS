$(document).ready(function () {
    // AJAX за добавяне на продукт в количката
    $('.catalog-item form').on('submit', function (e) {
        e.preventDefault(); // Предотвратява презареждането на страницата

        let formData = $(this).serialize(); // Сериализиране на данните от формата

        $.ajax({
            url: 'process_order.php', // Файл за обработка на поръчката
            type: 'POST',
            data: formData,
            success: function (response) {
                alert('Product added to cart successfully!');
            },
            error: function () {
                alert('Error adding product to cart.');
            }
        });
    });

    // Валидация на контактната форма
    $('form[action="contact.php"]').on('submit', function (e) {
        let isValid = true;

        // Проверка дали всички полета са попълнени
        $(this).find('input, textarea').each(function () {
            if ($(this).val().trim() === '') {
                isValid = false;
                $(this).css('border', '1px solid red');
            } else {
                $(this).css('border', '1px solid #ddd');
            }
        });

        if (!isValid) {
            e.preventDefault(); // Спира изпращането на формата
            alert('Please fill in all fields.');
        }
    });

    // Динамично зареждане на каталога (по желание)
    $('#load-more').click(function() {
        var lastId = $(this).data('last-id'); // Вземаме последния ID от бутона

        // Изпращаме последния ID към PHP обработчика
        $.ajax({
            type: 'POST',
            url: 'ajax_handler.php', // Тук трябва да е пътят към вашия AJAX обработчик
            data: { last_id: lastId },
            success: function(response) {
                // Добавяме новите части в каталога
                if (response) {
                    $('.catalog').append(response);

                    // Обновяваме последния ID в бутона
                    var newLastId = lastId + 5; // Преместваме ID напред с 5
                    $('#load-more').data('last-id', newLastId);
                } else {
                    // Ако няма нови части, скриваме бутона
                    $('#load-more').hide();
                }
            },
            error: function() {
                alert("There was an error loading more parts.");
            }
        });
    });
});