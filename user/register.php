<?php
    include 'header.php';
?>

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>


    <!-- Start Content Page -->
    <div class="container-fluid bg-light py-5">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1">Register</h1>
            <!-- <p>
                Proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                Lorem ipsum dolor sit amet.
            </p> -->
        </div>
    </div>

   

    <!-- Start Contact -->
    <div class="container py-5">
        <div class="row py-5">
            <form class="col-md-9 m-auto" method="post" role="form">
                <div class="row">
                    <div class="form-group col-md-12 mb-3">
                        <label for="inputname">Name</label>
                        <input type="text" class="form-control mt-1" id="name" name="name" placeholder="Name">
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <label for="inputemail">Email</label>
                        <input type="email" class="form-control mt-1" id="email" name="email" placeholder="Email">
                    </div>
                    <!-- 
                    <div class="mb-3">
                        <label for="inputsubject">Subject</label>
                        <input type="text" class="form-control mt-1" id="subject" name="subject" placeholder="Enter your Subject">
                    </div>
                    <div class="mb-3">
                        <label for="inputmessage">Message</label>
                        <textarea class="form-control mt-1" id="message" name="message" placeholder="Enter your message">
                    </div> 
                    -->

                    <div class="form-group col-md-12 mb-3">
                        <label for="Password">Password</label>
                        <input type="Password" class="form-control mt-1" id="Password" name="password" placeholder="Password">
                    </div>

                    <div class="form-group col-md-12 mb-3">
                        <label for="cpass">Confirm Password</label>
                        <input type="password" class="form-control mt-1" id="cpass" name="cpass" placeholder="Confirm password">
                    </div>
                </div>
             
                <div class="row">
                    <div class="col text-end mt-2">
                        <button type="submit" name="register" class="btn btn-success btn-lg px-3">  Register </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Contact -->

<?php
    include 'footer.php';
?>