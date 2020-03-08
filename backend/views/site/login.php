<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::$app->params['system_name'] . ' | Login';

?>

<div class="brand visible-xs">
  <h3 class="brand-text font-size-40"><?php echo Yii::$app->params['system_name']; ?></h3>
</div>
<h3 class="font-size-24">Log In</h3>
<?php if (Yii::$app->session->hasFlash('login_error')) : ?>
  <div class="alert alert-alt alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    <p class="alert-link"><i class="icon fa-bomb"></i> Invalid Username/Password.</p>
  </div>
<?php endif; ?>

<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
  <div class="form-group">
    <label class="sr-only" for="inputEmail">Username</label>
    <?= $form->field($model, 'username')->textInput(['placeholder' => 'Your Username', 'autocomplete' => 'off']) ?>
  </div>
  <div class="form-group">
    <label class="sr-only" for="inputPassword">Password</label>
    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Your Password']) ?>
  </div>

  <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
<?php ActiveForm::end(); ?>            