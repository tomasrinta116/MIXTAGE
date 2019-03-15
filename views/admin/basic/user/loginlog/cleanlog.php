<div class="box">
    <div class="box-table">
        <div class="box-table-header">
            <ul class="nav nav-pills">
                <li role="presentation"><a href="<?php echo admin_url($this->pagedir); ?>">목록</a></li>
                <li role="presentation"><a href="<?php echo admin_url($this->pagedir . '/graph'); ?>">로그인 성공 그래프</a></li>
                <li role="presentation"><a href="<?php echo admin_url($this->pagedir . '/graph_fail'); ?>">로그인 실패 그래프</a></li>
                <li role="presentation" class="active"><a href="<?php echo admin_url($this->pagedir . '/cleanlog'); ?>">오래된 로그삭제</a></li>
            </ul>
        </div>

        <?php
        echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>');
        echo show_alert_message(element('alert_message', $view), '<div class="alert alert-auto-close alert-dismissible alert-info"><button type="button" class="close alertclose" >&times;</button>', '</div>');
        ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <tbody>
                    <tr>
                        <td>
                            <?php
                            $attributes = array('class' => 'form-horizontal', 'name' => 'fadminwrite', 'id' => 'fadminwrite');
                            echo form_open(current_full_url(), $attributes);
                            ?>
                                <input type="number" class="form-control" name="day" value="<?php echo set_value('day', 180); ?>" /> 일 이상된 로그인로그를 모두 검색합니다.
                                <button type="submit" class="btn btn-warning btn-sm">검색</button>
                            <?php echo form_close(); ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="box-info">
            <?php
            if (element('msg', $view)) {
                $attributes = array('class' => 'form-horizontal', 'name' => 'fadminwrite2', 'id' => 'fadminwrite2', 'onSubmit' => 'return deletecheck()');
                echo form_open(current_full_url(), $attributes);
            ?>
                <input type="hidden" name="day" value="<?php echo element('day', $view); ?>" />
                <input type="hidden" name="criterion" value="<?php echo element('criterion', $view); ?>" />
                <input type="hidden" name="log_count" value="<?php echo element('log_count', $view); ?>" />
                <?php echo element('msg', $view); ?>
                <div class="box-button btn-group">
                    <button type="submit" class="btn btn-success btn-sm">삭제하기</button>
                </div>
            <?php
                echo form_close();
            }
            ?>
        </div>
    </div>
</div>

<script type="text/javascript">
//<![CDATA[
$(function() {
    $('#fadminwrite').validate({
        rules: {
            day: {required:true, number:true, min:0}
        }
    });
});
//]]>
</script>
