BX.ready(function () {
    eventsWebformWindow();
});

function eventsWebformWindow() {

    clickToSubmitButton();
    validatePhone('form_text_2');
}

function clickToSubmitButton() {
    BX.bind(BX('modal__form'), 'submit', function () {


        var data = new FormData(event.target);

        data.append('formId', formID);

       console.log(data)


        let emptyRequiredFields = validateRequired(); // проверка на заполненность обязательных полей

        if (emptyRequiredFields.length === 0) { // если поля заполнены - отправляю форму

            sendAjaxRequest(data);

            event.target.reset(); // очищаю форму
        }

        event.preventDefault(); // убираю перезагрузку страницы

    });

}



function validateRequired() {

    let resArray = [];

    BX('modal__form').querySelectorAll("[data-required]").forEach((name, idx, arr) => {
            if (name.value.trim() == '') {
                name.style.border = '1px solid #ab8a62';
                resArray.push(name.name); // массив незаполненных обязательных полей для проверки

            } else {
                name.style.border = '';
            }
    });

    setTimeout(function () {
        BX('modal__form').querySelectorAll("[data-required]").forEach((name, idx, arr) => {
                name.style.border = '';
        });

    }, 3000);


    return resArray;

}

function sendAjaxRequest(data) {
    let loader = document.querySelector('body');
    loader.style.opacity = '0.4';// включаю прелоадер


    var request = BX.ajax.runComponentAction(
        'all4it:webform.window',
        'webformSet',
        {
            mode: 'ajax',
            data: data,
        }
    );

    request.then(function (response) {
        console.log(response)



        if (response.data.success === false) {

            // // уведомление об ошибке
            BX.UI.Notification.Center.notify({
                content: BX.message('requiredFieldsEmptyNotify')
            });

            // выделяю обязательные поля
            markerRequiredFields(true);


        } else {
            // снимаю выделение
            markerRequiredFields(false);

            // // уведомление об успешной отправке формы
            BX.UI.Notification.Center.notify({
                content: BX.message('successNotify')
            });



        }

        loader.style.opacity = '1'; // скрываю прелоадер


    });

    request.catch(
        function (response) {
            console.log(response);
            loader.style.opacity = '1'; // скрываю прелоадер
        });

}

// Функция для валидации номера телефона и форматирования
function validatePhone(id) {
    var phoneInput = document.getElementById(id);
    phoneInput.addEventListener('input', function() {
        var phoneNumber = phoneInput.value;
        var cleaned = phoneNumber.replace(/\D/g, '');
        var match = cleaned.match(/^(\d{0,1})(\d{0,3})(\d{0,3})(\d{0,2})(\d{0,2})$/);
        var formattedPhoneNumber = '';
        if (match) {
            formattedPhoneNumber = '+7-' + match[2];
            if (match[3]) {
                formattedPhoneNumber += '-' + match[3];
            }
            if (match[4]) {
                formattedPhoneNumber += '-' + match[4];
            }
            if (match[5]) {
                formattedPhoneNumber += '-' + match[5];
            }
        }
        phoneInput.value = formattedPhoneNumber;
    });
    phoneInput.addEventListener('keydown', function(event) {
        if (event.key === 'Backspace') {
            // Разрешить удаление символов
            return;
        }
        // Запретить ввод символов, отличных от цифр
        if (!/\d/.test(event.key)) {
            event.preventDefault();
        }
    });
    phoneInput.addEventListener('keyup', function(event) {
        var phoneNumber = phoneInput.value;
        var cleaned = phoneNumber.replace(/\D/g, '');
        var match = cleaned.match(/^(\d{0,1})(\d{0,3})(\d{0,3})(\d{0,2})(\d{0,2})$/);
        var formattedPhoneNumber = '';
        if (match) {
            formattedPhoneNumber = '+7-' + match[2];
            if (match[3]) {
                formattedPhoneNumber += '-' + match[3];
            }
            if (match[4]) {
                formattedPhoneNumber += '-' + match[4];
            }
            if (match[5]) {
                formattedPhoneNumber += '-' + match[5];
            }
        }
        phoneInput.value = formattedPhoneNumber;
    });

}

function markerRequiredFields(flag) {
    if (flag === true) {
        document.getElementById('modal__form').querySelectorAll("[data-required]").forEach((name, idx, arr) => {
            name.style.border = '1px solid #ab8a62'
        });
    } else {
        document.getElementById('modal__form').querySelectorAll("[data-required]").forEach((name, idx, arr) => {
            name.style.border = ''
        });
    }

}