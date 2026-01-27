<!-- Модальное окно обратной связи -->
    <div class="modal fade" id="callbackModal" tabindex="-1" aria-labelledby="callbackModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="callbackModalLabel">Заказать звонок</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="callbackForm" class="callback-form">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="modalName" name="name" placeholder="Ваше имя" required>
                        </div>
                        <div class="mb-3">
                            <input type="tel" class="form-control" id="modalPhone" name="phone" placeholder="Ваш телефон" required>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" id="modalMessage" name="message" rows="4" placeholder="Сообщение"></textarea>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="modalPrivacyAgree" name="privacyAgree">
                            <label class="form-check-label" for="modalPrivacyAgree">Я согласен с <a href="../privacy.php" target="_blank">политикой конфиденциальности</a></label>
                            <div class="invalid-feedback">Пожалуйста, подтвердите согласие с политикой конфиденциальности</div>
                        </div>
                        <input type="hidden" id="modalLatitude" name="latitude">
                        <input type="hidden" id="modalLongitude" name="longitude">
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-5">Отправить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 