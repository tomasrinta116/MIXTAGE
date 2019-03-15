<?php $this->layoutlib->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<div class="mypage">
    <ul class="nav nav-tabs">
        <li><a href="<?php echo site_url('mypage'); ?>" title="마이페이지">마이페이지</a></li>
        <li class="active"><a href="<?php echo site_url('usermodify'); ?>" title="정보수정">정보수정</a></li>
        <li><a href="<?php echo site_url('usermodify/userleave'); ?>" title="탈퇴하기">탈퇴하기</a></li>
    </ul>
    <div class="page-header">
        <h4>회원 비밀번호 변경</h4>
    </div>
    <div class="form-horizontal mt20">
        <?php
        echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>');
        echo show_alert_message(element('message', $view), '<div class="alert alert-auto-close alert-dismissible alert-info"><button type="button" class="close alertclose" >&times;</button>', '</div>');
        echo show_alert_message($this->session->flashdata('message'), '<div class="alert alert-auto-close alert-dismissible alert-info"><button type="button" class="close alertclose" >&times;</button>', '</div>');
        echo show_alert_message(element('info', $view), '<div class="alert alert-info">', '</div>');
        $attributes = array('class' => 'form-horizontal', 'name' => 'fchangepassword', 'id' => 'fchangepassword');
        echo form_open(current_url(), $attributes);
        ?>
            <div class="form-group">
                <label for="user_userid" class="col-sm-3 control-label">아이디</label>
                <div class="col-sm-9">
                    <p class="form-control-static"><strong><?php echo $this->userlib->item('user_userid'); ?></strong></p>
                </div>
            </div>
            <div class="form-group">
                <label for="cur_password" class="col-sm-3 control-label">현재비밀번호</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control px150" id="cur_password" name="cur_password" />
                </div>
            </div>
            <div class="form-group">
                <label for="new_password" class="col-sm-3 control-label">새로운비밀번호</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control px150" id="new_password" name="new_password" />
                </div>
            </div>
            <div class="form-group">
                <label for="new_password_re" class="col-sm-3 control-label">재입력</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control px150" id="new_password_re" name="new_password_re" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-9 col-lg-offset-3">
                    <button type="submit" class="btn btn-success btn-sm">수정하기</button>
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>

<script type="text/javascript">
//<![CDATA[
$(function() {
    $('#fchangepassword').validate({
        rules: {
            cur_password : { required:true },
            new_password : { required:true, minlength:<?php echo element('password_length', $view); ?> },
            new_password_re : { required:true, minlength:<?php echo element('password_length', $view); ?>, equalTo: '#new_password' }
        }
    });
});
//]]>
</script>
