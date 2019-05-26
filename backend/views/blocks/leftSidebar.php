<?php
use yii\helpers\Url;
?>
<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/backend/web/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Admin C</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            
            <li>
                <a href="<?= Url::to(['students/index']) ?>">
                    <i class="fa fa-user"></i> 
                    <span>Students</span>
                </a>
            </li>
            <li>
                <a href="<?= Url::to(['teachers/index']) ?>">
                    <i class="fa fa-user"></i> 
                    <span>Teachers</span>
                </a>
            </li>
            <li>
                <a href="<?= Url::to(['subjects/index']) ?>">
                    <i class="fa fa-book"></i> 
                    <span>Subjects</span>
                </a>
            </li>
            <li>
                <a href="<?= Url::to(['subject-teachers/index']) ?>">
                    <i class="fa fa-book"></i> 
                    <span>Subject Teachers</span>
                </a>
            </li>
            <li>
                <a href="<?= Url::to(['groups/index']) ?>">
                    <i class="fa fa-users"></i> 
                    <span>Groups</span>
                </a>
            </li>
            <li>
                <a href="<?= Url::to(['group-subjects/index']) ?>">
                    <i class="fa fa-users"></i> 
                    <span>Group Subjects</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->