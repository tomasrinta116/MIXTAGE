<div class="box">
    <div class="box-table">
        <?php
        echo show_alert_message($this->session->flashdata('message'), '<div class="alert alert-auto-close alert-dismissible alert-info"><button type="button" class="close alertclose" >&times;</button>', '</div>');
        $attributes = array('class' => 'form-inline', 'name' => 'flist', 'id' => 'flist');
        echo form_open(current_full_url(), $attributes);
        ?>
            <div class="box-table-header">
            <?php
            ob_start();
            ?>
                <div class="btn-group pull-right" role="group" aria-label="...">
                    <a href="<?php echo element('listall_url', $view); ?>" class="btn btn-default btn-sm">All list</a>
                </div>
            <?php
            $buttons = ob_get_contents();
            ob_end_flush();
            ?>
            </div>
            <div class="row">All : <?php echo element('total_rows', element('data', $view), 0); ?></div>
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Who</th>
                            <th>Whom</th>
                            <th>When</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (element('list', element('data', $view))) {
                        foreach (element('list', element('data', $view)) as $result) {
                    ?>
                        <tr>
                            <td><?php echo number_format(element('num', $result)); ?></td>
                            <td><?php echo element('display_name', $result); ?> <?php if (element('user_userid', element('user', $result))) { ?> ( <a href="?sfield=user_id&amp;skeyword=<?php echo element('user_id', element('user', $result)); ?>"><?php echo element('user_userid', element('user', $result)); ?></a> ) <?php } ?></td>
                            <td><?php echo element('target_display_name', $result); ?> <?php if (element('user_userid', element('target_user', $result))) { ?> ( <a href="?sfield=target_user_id&amp;skeyword=<?php echo element('user_id', element('target_user', $result)); ?>"><?php echo element('user_userid', element('target_user', $result)); ?></a> ) <?php } ?></td>
                            <td><?php echo display_datetime(element('fol_datetime', $result), 'full'); ?></td>
                        </tr>
                    <?php
                        }
                    }
                    if ( ! element('list', element('data', $view))) {
                    ?>
                        <tr>
                            <td colspan="4" class="nopost">There is no data.</td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="box-info">
                <?php echo element('paging', $view); ?>
                <div class="pull-left ml20"><?php echo admin_listnum_selectbox();?></div>
                <?php echo $buttons; ?>
            </div>
        <?php echo form_close(); ?>
    </div>
    <form name="fsearch" id="fsearch" action="<?php echo current_full_url(); ?>" method="get">
        <div class="box-search">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <select class="form-control" name="sfield" >
                        <?php echo element('search_option', $view); ?>
                    </select>
                    <div class="input-group">
                        <input type="text" class="form-control" name="skeyword" value="<?php echo html_escape(element('skeyword', $view)); ?>" placeholder="Search for..." />
                        <span class="input-group-btn">
                            <button class="btn btn-default btn-sm" name="search_submit" type="submit">Search!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
