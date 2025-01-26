<div class="row">
    <div class="col-md-3">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <?php

                    if ($user['photo']) {
                        echo '<img class="profile-user-img img-fluid img-circle" src="../dist/uploads/student-docs/' . $user['photo'] . '" alt="User profile picture">';
                    } else {
                        echo '<img class="profile-user-img img-fluid img-circle" src="../dist/img/AdminLTELogo.png" alt="User profile picture">';
                    }
                    ?>
                </div>
                <h3 class="profile-username text-center"><?php echo $user['name']; ?></h3>
                <p class="text-muted text-center"><?php echo $user['address']; ?></p>
                <hr>
                <p>
                    <strong><i class="fa-fw fas fa-chalkboard mr-1"></i>Class</strong>
                    <span class="text-muted float-right">
                        <?php
                        $class = get_post(['id' => $user['class']]);
                        $section = get_post(['id' => $user['section']]);
                        echo $class->title;
                        ?>
                        (<?php echo $section->title; ?>)
                    </span>
                </p>
                <hr>
                <p>
                    <strong><i class="fa-fw fas fa-calendar-alt mr-1"></i> DOB</strong>
                    <span class="text-muted float-right">
                        <?php echo $user['dob']; ?>
                    </span>
                </p>
                <hr>
                <p>
                    <strong><i class="fa-fw fas fa-phone-square mr-1"></i> Mobile</strong>
                    <span class="text-muted float-right">
                        <?php echo $user['mobile']; ?>
                    </span>
                </p>
            </div>

        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">About Me</h3>
            </div>

            <div class="card-body">

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                <p class="text-muted"><?php echo $user['address'] ?>, <?php echo $user['state'] ?>, <?php echo $user['country'] ?> (<?php echo $user['zip'] ?>)</p>

            </div>

        </div>
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Activity</a></li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="timeline">

                        <div class="timeline timeline-inverse">

                            <div class="time-label">
                                <span class="bg-danger">
                                    10 Feb. 2014
                                </span>
                            </div>


                            <div>
                                <i class="fas fa-envelope bg-primary"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="far fa-clock"></i> 12:05</span>
                                    <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>
                                    <div class="timeline-body">
                                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                        quora plaxo ideeli hulu weebly balihoo...
                                    </div>
                                    <div class="timeline-footer">
                                        <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                    </div>
                                </div>
                            </div>


                            <div>
                                <i class="fas fa-user bg-info"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>
                                    <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                                    </h3>
                                </div>
                            </div>


                            <div>
                                <i class="fas fa-comments bg-warning"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>
                                    <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>
                                    <div class="timeline-body">
                                        Take me to your leader!
                                        Switzerland is small and neutral!
                                        We are more like Germany, ambitious and misunderstood!
                                    </div>
                                    <div class="timeline-footer">
                                        <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                    </div>
                                </div>
                            </div>


                            <div class="time-label">
                                <span class="bg-success">
                                    3 Jan. 2014
                                </span>
                            </div>


                            <div>
                                <i class="fas fa-camera bg-purple"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="far fa-clock"></i> 2 days ago</span>
                                    <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>
                                    <div class="timeline-body">
                                        <img src="https://placehold.it/150x100" alt="...">
                                        <img src="https://placehold.it/150x100" alt="...">
                                        <img src="https://placehold.it/150x100" alt="...">
                                        <img src="https://placehold.it/150x100" alt="...">
                                    </div>
                                </div>
                            </div>

                            <div>
                                <i class="far fa-clock bg-gray"></i>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>