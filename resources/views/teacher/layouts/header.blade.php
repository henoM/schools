<header id="header" class="header">
    <div class="header-menu">

        <div class="col-sm-11">
            <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
            <div class="header-left">

            </div>
        </div>
        <div class="col-sm-1">
            <a class="m-menu__link " href="<?php echo e(route('logout')); ?>"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                <?php echo e(csrf_field()); ?>

            </form>
        </div>
    </div>
</header>
