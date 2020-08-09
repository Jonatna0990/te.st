<?php include(ROOT.'/views/layouts/header.php');?>
    <div class=".col-9 p-2">
        <h2 class="blog-post-title">Запросы SQL</h2>


        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">2</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">3</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <h4 class="blog-post-title">Список email'лов, встречающихся более чем у одного пользователя</h4>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Email</th>
                        <th scope="col">Количество раз</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?
                    if(isset($users) && is_array($users))

                        foreach ($users as $item) {
                        ?>
                        <tr>
                            <td><?=$item['email']?></td>
                            <td><?=$item['count']?></td>
                        </tr>
                        <?
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <h4 class="blog-post-title">Cписок логинов пользователей, которые не сделали ни одного заказа</h4>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Логин</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?
                    if(isset($users_no_orders) && is_array($users_no_orders))
                        foreach ($users_no_orders as $item) {
                            ?>
                            <tr>
                                <td><?=$item['login']?></td>
                            </tr>
                            <?
                        }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <h4 class="blog-post-title">Cписок логинов пользователей которые сделали более двух заказов</h4>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Логин</th>
                        <th scope="col">Количество заказов</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?
                    if(isset($users_with_orders) && is_array($users_with_orders))
                        foreach ($users_with_orders as $item) {
                        ?>
                        <tr>
                            <td><?=$item['login']?></td>
                            <td><?=$item['count']?></td>
                        </tr>
                        <?
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<? include(ROOT.'/views/layouts/footer.php'); ?>