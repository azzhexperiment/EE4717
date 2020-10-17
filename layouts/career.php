<!-- Featured items -->
<section class="career">
    <h1>Explore a career</h1>

    <div class="career__listings">

        <?php for ($i = 0; $i < count($career); $i++) { ?>

            <div class="job__opening">
                <h3><?= $career[$i]['title'] ?></h3>
                <p><?= $career[$i]['description'] ?></p>
                <p>Opennings: <?= $career[$i]['openings'] ?></p>

                <button disabled>
                    <a class="job--apply" href="mailto:career@cleoandazzh.com?subject=Application for <?= $career[$i]['title'] ?>&cc=hr@cleoandazzh.com">Drop an email</a>
                </button>
            </div>

        <?php } ?>
    </div>
</section>
