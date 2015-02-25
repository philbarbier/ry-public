            <div class="submissions_container">
                <?php foreach ($submissions as $submission) { ?>
                    <div class="submission_container" data-id="<?php echo $submission->id; ?>">
                        <div class="submission_overlay">
                            <span>
                            &quot;<?php echo $submission->title; ?>&quot;<br />
                            <?php echo $submission->firstname . ' ' . $submission->lastname . ' - ' . $submission->school; ?>
                            </span>
                        </div>
                        <div class="submission_thumbnail">
                            <img src="<?php echo $submission->files[0]->fullpath; ?>" alt="<?php echo $submission->title; ?>" border="0" />
                        </div>
                        <div class="submission_vote_container">
                            <img src="/images/white_star_vote.png" alt="Votes" border="0" />
                            <span><?php echo $submission->votes ?></span>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="clear"></div>
            <div class="pagination_container">
            <?php
                $cp = $nav['currpage'];
                $t = $nav['totalpages'];
                $l = 2;
                $ps = ($cp - $l) < 1 ? 1 : $cp - $l;

                if ($cp > 1) {
                    echo '<div class="prevpage"><a href="/?p=' . ($cp-1) . '"><img src="/images/pagination_arrow_left.jpg" border="0" alt="Previous"></a></div>';
                }

                for ($i=$ps; $i <= $ps+1; $i++) {
                    //echo '<br />' . $i . ' -- ' . $ps . ' -- ' . $cp . '<br />';
                    if ($i < 1 - $l) break;
                    if ($i < $cp - $l) break;
                    if ($i != $cp) {
                        echo '<div class="pagenumber"><span class="navhelper"><a href="/?p=' . $i . '">' . $i . '</a></span></div>';
                    } else {
                        break;
                    }
                }
                for ($i=$cp; $i <= $t; $i++) {
                    if ($i > $t) break;
                    if ($i > $cp + $l) break;
                    if ($i == $cp) {
                        echo '<div class="pagenumber"><span class="navhelper">' . $i . '</span></div>';
                    } else {
                        echo '<div class="pagenumber"><span class="navhelper"><a href="/?p=' . $i . '">' . $i . '</a></span></div>';
                    }
                }
                if ($cp < $t) {
                    echo '<div class="nextpage"><a href="/?p=' . ($cp+1) . '"><img src="/images/pagination_arrow_right.jpg" border="0" alt="Next"></a></div>';
                }
            ?>
            </div>
            <div class="modal_shadow"></div>
            <div class="modal_container ryhidden">
                <div class="modal_close_button_container">
                    <img src="/images/modal_close_button.png" alt="Close" border="0" />
                </div>
                <div class="modal_background">
                    <div class="modal_image_container">
                        <img alt="Submission" border="0" />
                    </div>
                    <div class="modal_text_container">
                        <div class="modal_submission_title">
                        </div>
                        <div class="modal_submission_artist">
                        </div>
                        <br />
                        <div class="modal_submission_text">
                        </div>
                    </div>
                    <div class="modal_vote_button ryhidden">
                        <img src="/images/modal_vote_button.jpg" alt="Vote" border="0" />
                    </div>
                </div>
            </div>
