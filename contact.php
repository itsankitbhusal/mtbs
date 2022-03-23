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

        <?php if (hasError()) : ?>
            <div id="error" class="ml-4 alert alert-danger">
                <?php echo getError(); ?>
            </div>
        <?php endif; ?>
        <?php if (hasSuccess()) : ?>
            <div id="success" class="ml-4 alert alert-success">
                <?php echo getSuccess(); ?>
            </div>
        <?php endif; ?>
        <form method="POST" action="./contact.inc.php">
            <div class="mb-3">
                <label for="inputName" class="form-label">Name</label>
                <input required name="name" type="text" class="form-control" id="inputName">
            </div>
            <div class="mb-3">
                <label for="inputEmail" class="form-label">Email address</label>
                <input required name="email" type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input required type="text" name="subject" class="form-control" id="subject">
            </div>
            <div class="mb-3">
                <label for="subject" class="form-label">Message</label>
                <textarea required name="message" class="form-control" style="height: 8rem;" placeholder="Leave a message here"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>

    </div>
</div>

</div>


<?php require_once "./user/components/footer.php"; ?>