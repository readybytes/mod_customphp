<?php
// no direct access
defined('_JEXEC') or die;

//$params->def('greeting', 1);

$user = JFactory::getUser();
$type	= (!$user->get('guest')) ? 'logout' : 'login';
//$items 	= 	JFactory::getApplication()->getPathway()->getPathWay();
//$item	=	array_pop($items);
$link	= JURI::getInstance()->toString();
//if(isset($item->link)) {
//	$link = $item->link;
//}
$return	= 	base64_encode($link);

//JHtml::_('behavior.keepalive');
?>
<?php if ($type == 'logout') : ?>
<form action="<?php echo JRoute::_('index.php'); ?>" method="post" id="login-form">
	<div class="logout-button">
		<input type="submit" name="Submit" class="button" value="<?php echo JText::_('JLOGOUT'); ?>" />
		<input type="hidden" name="option" value="com_users" />
		<input type="hidden" name="task" value="user.logout" />
		<input type="hidden" name="return" value="<?php echo $return; ?>" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>
<?php else : ?>
	<div class="conatiner-fluid">
		<form action="<?php echo JRoute::_('index.php'); ?>" method="post" id="login-form" class="custom-popup-login">
                    <fieldset class="userdata row-fluid">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-user"></i></span>
                            <input type="text" name="username"  placeholder="Username or Email"/>
                        </div>
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-lock"></i></span>
                            <input type="password" name="password" placeholder="Password"/>
                        </div>
                            <?php if (JPluginHelper::isEnabled('system', 'remember')) : ?>
                        <div class="row-fluid" style="margin-top: 20px;">
                            <div class="span6" style="padding: 10px 0; margin-right: 10px;">
                                <label class="checkbox">
                                    <input id="modlgn-remember" type="checkbox" name="remember" class="inputbox" value="yes"/>
                                    Remember me
                                </label>
                            </div>
                            <div class="span4">
                                <?php endif; ?>
                                <input type="submit" name="Submit" class="btn btn-primary btn-block" value="Login" />
                                <input type="hidden" name="option" value="com_users" />
                                <input type="hidden" name="task" value="user.login" />
                                <input type="hidden" name="return" value="<?php echo $return; ?>" />
                                    <?php echo JHtml::_('form.token'); ?>
                            </div>
                        </div>
                    </fieldset>
</form>
        </div>
        <div style="margin: 40px 35px 0 0" class="text-center" >
            <a style="color: #888;" href="<?php echo JRoute::_('index.php?option=com_users&view=reset'); ?>">Forgot Your Password ?</a>
        </div>

<?php endif; ?>
