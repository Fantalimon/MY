<div class="row">
    <div class="navbar text-center ">
        <ul class="navbar-form navbar-fixed-bottom">
            <ul class="pagination">
                <?php


                $page = isset($_GET['page']) ? mb_substr(
                    htmlspecialchars(strip_tags(trim($_GET['page']))), 0, 20, 'UTF-8'
                ) : 1;

                $pageinlist = PAGEINLIST;
                
                
                ?>
            </ul>
    </div>
</div>
