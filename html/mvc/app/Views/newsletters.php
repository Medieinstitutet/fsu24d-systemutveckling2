<html>
    <head></head>
    <body>
        Lista på Newsletters
        <?php
            foreach($newsletters as $newsletter) {
                ?>
                    <div>
                        <a href="newsletters/<?= $newsletter['id'] ?>">
                            <?= $newsletter['title'] ?>
                        </a>
                    </div>
                <?php
            }
        ?>
    </body>
</html>