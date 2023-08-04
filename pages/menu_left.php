<div class="left">
    <div class="left__position">
        <div class="left__block">
            <h5 class="title__profile">Main</h5>
            <ul class="list__profile">
                <li class="item__profile"><a href="#" class="link__profile"><i class="fas fa-chart-line"></i> Bảng Điều Khiển</a></li>
                <li class="item__profile"><a href="/pages/messager/mess.php" class="link__profile"><i class="fas fa-comments"></i> Nhắn Tin </a></li>
                <li class="item__profile"><a href="/pages/bookmark.php" class="link__profile"><i class="fas fa-bookmark"></i> Đánh Dấu Trang</a></li>
            </ul>
        </div>
        <?php if ($_SESSION['user']['candidate']) { ?>
            <div class="left__block">
                <h5 class="title__profile">Candidate</h5>
                <ul class="list__profile">
                    <li class="item__profile"><a href="/pages/candidate/manage_jobalert.php" class="link__profile"><i class="fas fa-bell"></i> Thông Báo Công Việc <span class="notification">1</span></a></li>
                    <li class="item__profile"><a href="#" class="link__profile"><i class="far fa-list-alt"></i> Manage Resumer</a></li>
                    <li class="item__profile"><a href="/pages/candidate/add_resumer.php" class="link__profile"><i class="fas fa-plus-square"></i> Thêm CV</a></li>
                </ul>
            </div>
        <?php } ?>
        <?php if ($_SESSION['user']['employer'] == 1) { ?>
            <div class="left__block">
                <h5 class="title__profile">Employer</h5>
                <ul class="list__profile">
                    <li class="item__profile"><a href="/pages/employer/managae_job.php" class="link__profile"><i class="far fa-list-alt"></i> Danh Sách Công Việc</a></li>
                    <li class="item__profile"><a href="/pages/employer/submit_job.php" class="link__profile"><i class="fas fa-plus-square"></i> Đăng Công Việc </a></li>
                    <li class="item__profile"><a href="/pages/employer/manage_companies.php" class="link__profile"><i class="far fa-list-alt"></i> Danh Sách Công Ty</a></li>
                    <li class="item__profile"><a href="/pages/employer/add_company.php" class="link__profile"><i class="fas fa-plus-square"></i> Thêm Công Ty <span class="notification">1</span></a></li>
                    <li class="item__profile"><a href="/pages/employer/list_candidate_apply.php" class="link__profile"><i class="far fa-list-alt"></i> Danh Sách Người Ứng Tuyển</a></li>
                </ul>
            </div>
        <?php } ?>
        <div class="left__block">
            <h5 class="title__profile">Account</h5>
            <ul class="list__profile">
                <li class="item__profile"><a href="/pages/profile.php" class="link__profile"><i class="fas fa-user-circle"></i> Trang Cá Nhân</a></li>
                <li class="item__profile"><a href="/process_logout.php" class="link__profile"><i class="fas fa-sign-out-alt"></i> Đăng Xuất</a></li>
            </ul>
        </div>
    </div>
</div>