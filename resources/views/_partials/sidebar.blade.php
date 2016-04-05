<div id="sidebar-wrapper" class="collapse sidebar-collapse">
    <div id="search">
        <form>
            <input class="form-control input-sm" type="text" name="search" placeholder="Search..."/>

            <button type="submit" id="search-btn" class="btn"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <!-- #search -->
    <nav id="sidebar">
        <ul id="main-nav" class="open-active">

            <li class="{!! active_class(if_route(['dashboard_path'])) !!}">
                <a href="{!! route('dashboard_path') !!}">
                    <i class="fa fa-dashboard"></i>
                    Dashboard
                </a>
            </li>

            <li class="dropdown {!! active_class(if_route(['appointments.index'])) !!}">
                <a href="javascript:;">
                    <i class="fa fa-table"></i>
                    Appointments
                    <span class="caret"></span>
                </a>

                <ul class="sub-nav">

                    @if( ! $currentUserHasTutorRole){
                    <li>
                        <a href="{!! route('appointments.create') !!}">
                            <i class="fa fa-plus-square"></i>
                            Add
                        </a>
                    </li>
                    @endif

                    @if( $currentUserHasTutorRole){
                    <li>
                        <a href="{!! route('appointments/calendar') !!}">
                            <i class="fa fa-calendar"></i>
                            Calendar
                        </a>
                    </li>
                    @endif
                    <li>
                        <a href="{!! route('appointments.index') !!}">
                            <i class="fa fa-list"></i>
                            List
                        </a>
                    </li>
                </ul>
            </li>

            <li class="dropdown {!! active_class(if_route(['staff.index'])) !!}">
            <li class="dropdown ">
                <a href="javascript:;">
                    <i class="fa fa-group"></i>
                    SASS Staff
                    <span class="caret"></span>
                </a>

                <ul class="sub-nav">
                    <li>
                        <a href="{!! route('staff.index') !!}">
                            <i class="fa fa-dashboard"></i>
                            Personnel
                        </a>
                    </li>
                    @if( ! $currentUserHasTutorRole)
                        <li>
                            <a href="<?php echo BASE_URL; ?>staff/schedules">
                                <i class="fa fa-calendar"></i>
                                Schedules
                            </a>
                        </li>
                    @endif

                    <?php if ( ! $user->isTutor()): ?>
                    <li>
                        <a href="<?php echo BASE_URL; ?>staff/facilitating-courses">
                            <i class="fa fa-table"></i>
                            Facilitating Courses
                        </a>
                    </li>
                    <?php endif; ?>

                    <?php if ($user->isAdmin()): ?>
                    <li>
                        <a href="<?php echo BASE_URL; ?>staff/add">
                            <i class="fa fa-plus-square"></i>
                            Add Personnel
                        </a>
                    </li>
                    <?php endif; ?>

                </ul>
            </li>


            <?php if ( ! $user->isTutor())
            { ?>
            <li class="dropdown <?php if (strcmp($section, "academia") === 0) {
                echo "active";
            } ?>">
                <a href="javascript:">
                    <i class="fa fa-university"></i>
                    Academia
                    <span class="caret"></span>
                </a>

                <ul class="sub-nav">
                    <li>
                        <a href="<?php echo BASE_URL; ?>academia/courses">
                            <i class="fa fa-book"></i>
                            Courses
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo BASE_URL; ?>academia/majors">
                            <i class="fa fa-book"></i>
                            Majors
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo BASE_URL; ?>academia/students">
                            <i class="fa fa-users"></i>
                            Students
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo BASE_URL; ?>academia/instructors">
                            <i class="fa fa-group"></i>
                            Instructors
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo BASE_URL; ?>academia/terms">
                            <i class="fa fa-calendar"></i>
                            Terms
                        </a>
                    </li>
                </ul>
            </li>
            <?php } ?>


            <li class="dropdown <?php if ($section == "account") {
                echo "active";
            } ?>">
                <a href="javascript:;">
                    <i class="fa fa-file-text"></i>
                    Account
                    <span class="caret"></span>
                </a>

                <ul class="sub-nav" style="">
                    <li>
                        <a href="<?php echo BASE_URL; ?>account/profile">
                            <i class="fa fa-user"></i>
                            Profile
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo BASE_URL; ?>account/settings">
                            <i class="fa fa-cogs"></i>
                            Settings
                        </a>
                    </li>
                    <?php if ($user->isTutor())
                    { ?>
                    <li>
                        <a href="<?php echo BASE_URL; ?>account/schedule">
                            <i class="fa fa-calendar"></i>
                            Schedule
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </li>


            <?php if ($user->isAdmin())
            { ?>
            <li class="<?php if ($section == "cloud") echo "active"; ?>">
                <a href="<?php echo BASE_URL; ?>cloud">
                    <i class="fa fa-cloud"></i>
                    Cloud
                </a>
            </li>

            <?php } ?>

            <li class="<?php if ($section == "support") echo "active"; ?>">
                <a href="<?php echo BASE_URL; ?>support">
                    <i class="fa fa-question"></i>
                    Support
                </a>
            </li>

            <?php if ($user->email === 'grkatsas@acg.edu'): ?>

            <li class="<?php if ($section == "appointments-terms") echo "active"; ?>">
                <a href="<?php echo BASE_URL; ?>appointments-terms.php">
                    <i class="fa fa-table"></i>
                    Appointments | Terms
                </a>
            </li>

            <?php endif; ?>

        </ul>

    </nav>
    <!-- #sidebar -->

</div> <!-- /#sidebar-wrapper -->