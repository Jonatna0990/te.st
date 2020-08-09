<?php include(ROOT.'/views/layouts/header.php');?>

<?

$title = "Личный кабинет";

?>
<div class="container">
    <div class="row">
        <div class="col-md-11 order-md-11">
            <h4 class="mb-3"><?=$title?>
            </h4>
            <form  method="post" class="needs-validation" validate
                   action="#">
                <div class="mb-3">
                    <label for="password">Пароль</label>
                    <div class="input-group mb-3">
                        <input name="password" type="password" class="form-control pwd" value="<? if(isset($user) && !User::isGuest())  echo $user->password?>"  placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary reveal" type="button"><i class="fa fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="invalid-feedback">
                        Введите Пароль
                    </div>

                </div>


                <div class="mb-3">
                    <label for="name">ФИО</label>
                    <label for="name"></label>
                    <input name="name" type="text" class="form-control" id="description"
                           value="<? if(isset($user) && !User::isGuest())  echo $user->name?>"
                           placeholder="Иванов Иван Иванович!" required>
                    <div class="invalid-feedback">
                        Введите ФИО
                    </div>
                </div>
                <hr class="mb-4">
                <input name="submit" class="btn btn-primary btn-lg btn-block" value="Сохранить" type="submit"/>
            </form>
        </div>
    </div>
</div>
<? include(ROOT.'/views/layouts/footer.php'); ?>
