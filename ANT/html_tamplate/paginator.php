<div class="navbar text-center">
    <div class="navbar-form navbar-fixed-bottom">
        <ul class="pagination">
            <li><a href="#">&laquo;</a></li>
            <?php
            $pagin=new Paginator();
            $pagin->CountBase();
for ($i = 1; $i <= $pagin->paginate; $i++) {
            echo "<li><a href=" . 'index.php' . "?page=" . $i . ">" . $i . "<span class='sr-only'>(current)</span></a></li>";
            }
?>
            <li><a href="#">&raquo;</a></li>
        </ul>
    </div>
</div>



