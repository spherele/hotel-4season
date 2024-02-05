
    <h5 style="color: black">Ждем вас в гости! <br>
        Оставьте заявку, наши заботливые менеджеры ответят на ваши вопросы и расскажут про
        спецпредложения</h5>
    <form method="post" class="contact__form" action="/mail.php"
          style="background-size:cover;">

        <!-- form message -->
        <div class="row">
            <div class="col-12">
                <div class="alert alert-success contact__msg" role="alert">

                </div>
            </div>
        </div>
        <!-- form elements -->
        <div class="row" style="padding: unset">
            <div class="col-md-6 form-group">
                <input name="name" type="text" placeholder=" Имя *" required>
            </div>
            <div class="col-md-6 form-group">
                <input name="phone" type="text" placeholder=" Номер телефона *" required>
            </div>
            <div class="col-md-12 form-group">
                                <textarea style="height: 50px;" name="message" id="message" cols="30" rows="4"
                                          placeholder=" Сообщение *"
                                          required></textarea>
            </div>
            <div class="col-md-12">
                <button type="submit" class="butn-dark2"><span>Отправить</span></button>
            </div>
        </div>
    </form>


