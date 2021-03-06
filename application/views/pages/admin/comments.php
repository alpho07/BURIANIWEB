<!DOCTYPE>
<html>

    <title><?php echo $title; ?></title>

    <?php $this->load->view('partials/header'); ?>
    <style type="text/css">
        #exTab1 .tab-content {

            padding : 5px 15px;
        }

        td{
            vertical-align: middle !important;
            text-align: center !important;
            padding: 0px !important;
        }

        table-hover td{
            text-align: left;
        }

    </style>
    <body>
    <header >


            <nav class="navbar navbar-ct-white navbar-fixed-top" role="navigation">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand navbar-brand-logo" href="<?php echo base_url(); ?>" style="position:absolute;">
                        <div class="">
                            <img src="<?php echo base_url(); ?>/img/logo3.png" alt="Logo" width="250px">
                        </div>

                    </a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                            <li>
                    <a href="<?php echo base_url(); ?>" >
                                <i class="fa fa-home"></i>
                                <p>Home</p>
                            </a>
                   </li>
                        <li>
                            <a href="#<?php echo $this->session->userdata('username'); ?>">
                                <i class="fa fa-user"></i>
                                <p>Hello <?php echo $this->session->userdata('username'); ?></p>
                            </a>
                        </li>

                        <?php if ($this->session->userdata('user_id') == TRUE && $this->session->userdata('type') > 0) { ?>
                           <li>
                            <a href="<?php echo base_url(); ?>admin/admindashboard" >
                                <i class="fa fa-dashboard"></i>
                                <p>Admin Dashboard</p>
                            </a>
                        </li>
                            <?php
                        } else {
                            echo '';
                        };
                        ?>

                        <li class="dropdown" style="margin-right: 5px;">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-paper-plane-o"></i>
                                <p>Post Ad</p>
                            </a>
                              <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url(); ?>home/postobituarya"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                                        Post Obituary</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url(); ?>home/postada"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                                        Post Ad</a></li></ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>home/logout" >
                                <i class="fa fa-power-off"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->

            </nav>
            <!--  end navbar --> 

        </header>
        <!-- Container -->
        <div class="container" style="width:100% !important;">

     


            <!-- Content -->
            <div class="row content">

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="breadcrumbs">
                        <p><a href="<?php echo base_url(); ?>">Home</a> <i class="icons icon-right-dir"></i> <?php echo $ptitle; ?></p>
                    </div>
                </div>

                <!-- Main Content -->
                <section class="main-content col-lg-12 col-md-12 col-sm-12" style="margin-top:60px;">

                    <div class="row">

                        <!-- Heading -->
                        <div class="col-lg-12 col-md-12 col-sm-12">

                            <div class="carousel-heading">
                                <h4>Admin Dashboard &#187 Obituary Comments</h4>
                                <div class="carousel-arrows">
                                    <a href="#"><i class="icons icon-reply"></i></a>
                                </div>
                            </div>

                        </div>
                        <!-- /Heading -->

                    </div>	


                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12">


                            <div id="exTab1">	
                                   <?php $this->load->view('pages/admin/admin_menu'); ?>

                                <div class="tab-content clearfix">
                                    <div class="tab-pane active" id="1a">
                                        <table id="example myTable" class="display1234" cellspacing="0" width="100%">
                                            <thead>
                                                <tr><td colspan="8">
                                                <?php if (($this->session->flashdata('message_success')) == TRUE) { ?>
                                                            <div class="alert alert-success" ><i class="fa fa-check"></i> <?php echo $this->session->flashdata('message_success'); ?></div></td></tr>

                                                        <?php } ?>

                                                <tr><td colspan="8">
                                                        <?php if (($this->session->flashdata('message_reject')) == TRUE) { ?>
                                                            <div class="alert alert-danger" ><i class="fa fa-times"></i> <?php echo $this->session->flashdata('message_reject'); ?></div>

                                                      <?php } ?>
                                                    </td></tr>
                                                <tr>
                                                    <th>No.</th>
                                                    <th style="width:10px !important;"><input type="checkbox" value="" style="display:inline-block"/></th>
                                                    <th>Comment</th>
                                                    <th>Date</th>
                                                    <th>Author</th>                                                    
                                                    <th>Obituary</th>
                                                    <th>Approve</th>
                                                    <th>Reject</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                foreach ($ads as $ad):
                                                    ?>
                                                    <tr >
                                                        <td ><?php echo $i; ?></td>
                                                        <td><input style="display: inline-table !important" type="checkbox" value=""/></td>
                                                        <td ><a href="#comment" data-toggle="popover" title="Deceased: <?php echo $ad->obtitle; ?>" data-placement="right" data-trigger="focus" data-content="<?php echo $ad->body; ?> ">See Comment</a>  </td>
                                                        <td><?php echo $ad->date; ?></td>
                                                        <td><?php echo $ad->author; ?></td>
                                                        <td><a class="btn btn-primary" href="<?php echo base_url() . 'home/loadprofile/' . $ad->obid . '/' . str_replace(" ", "-", $ad->obtitle); ?>" target="_blank"><i class="fa fa-binoculars"></i> View Obituary</a></td>
                                                        <td>  <a href='<?php echo base_url() . 'admin/approvec/' . $ad->id; ?>'<i class="btn btn-success fa fa-check-circle-o" title="Approve"></i></a></td>
                                                        <td>  <a href='<?php echo base_url() . 'admin/rejectc/' . $ad->id; ?>'<i class="btn btn-danger fa fa-times-circle-o" title="Reject"></i></a></td>

                                                    </tr>
                                                    <?php
                                                    $i++;
                                                endforeach;
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>              





                                </div>
                            </div>



                        </div>

                    </div>


                </section>
                <!-- /Main Content -->

            </div>
            <!-- /Content -->

            <script>
                $(document).ready(function () {
                    base_url = "<?php echo base_url(); ?>";
                    loadTitles();
                    function loadTitles() {
                        $('.display1234').dataTable();
                    }
                });
            </script>






            <div id="back-to-top">
                <i class="icon-up-dir"></i>
            </div>

        </div>
<?php $this->load->view('partials/footer'); ?>


    </body>

</html>