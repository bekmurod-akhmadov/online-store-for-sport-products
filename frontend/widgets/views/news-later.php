<!-- newsleter area start -->
<div class="newsleter-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="newsleter">
                    <h3>Новостная рассылка</h3>
                    <p>Подпишитесь на список рассылки Джеймса, чтобы получать обновления о новых поступлениях, специальных предложениях и другой информации о скидках.</p>
                    <div class="Subscribe">
                        <form action="#">
                            <input type="text" title="Sign up">
                            <button type="submit" title="Subscribe">Подписаться</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="follow">
                    <h3>Соц.Сети</h3>
                    <p>Подпишитесь на список рассылки Джеймса, чтобы получать обновления о новых поступлениях, специальных предложениях и другой информации о скидках.</p>
                    <ul class="follow-link">
                        <?php if (!empty($models)): ?>
                            <?php foreach ($models as $model): ?>
                                <li><a title="<?=$model->name?>" href="<?=$model->link?>"> <i class="<?=$model->icon?>"></i> </a></li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- newsleter area end -->