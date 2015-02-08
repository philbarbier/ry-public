
            <div class="submissions_container">
                <?php foreach ($submissions as $submission) { ?>
                    <div class="submission_container" data-id="<?php echo $submission->id; ?>">
                        <div class="submission_thumbnail">
                            <img src="<?php echo $submission->files[0]->fullpath; ?>" alt="<?php echo $submission->title; ?>" border="0" />
                        </div>
                        <div class="submission_overlay">
                            &quot;<?php echo $submission->title; ?>&quot;<br />
                            <?php echo $submission->firstname . ' ' . $submission->lastname . ' - ' . $submission->school; ?>
                        </div>
                        <div class="submission_vote_container">
                            <img src="/images/white_star_vote.png" alt="Votes" border="0" />
                            <span><?php echo $submission->votes ?></span>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="pagination_container">
            </div>
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
                        <div class="modal_submission_text">
                        </div>
                    </div>
                    <div class="modal_vote_button ryhidden">
                    </div>
                </div>
            </div>
