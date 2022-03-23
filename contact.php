<?php require_once "./user/components/header.php"; ?>
<div class="image-aboutus-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="lg-text font-weight-bold ">Contact</h1>
                <p class="image-aboutus-para">Contact section about CinemaTic</p>
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row col-md-4 mx-auto">

        <form method="POST" action="">
            <div class="mb-3">
                <label for="inputName" class="form-label">Name</label>
                <input name="name" type="text" class="form-control" id="inputName">
            </div>
            <div class="mb-3">
                <label for="inputEmail" class="form-label">Email address</label>
                <input name="email" type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" name="subject" class="form-control" id="subject">
            </div>
            <div class="mb-3">
                <label for="subject" class="form-label">Message</label>
                <textarea name="message" class="form-control" style="height: 8rem;" placeholder="Leave a message here"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>

    </div>
</div>

</div>


<?php require_once "./user/components/footer.php"; ?>